<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\City;
use App\Models\Booking;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\AirportParking;
use App\Models\ParkingPricing;
use App\Models\DiscountVoucher;
use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class frontendController extends Controller
{

    // home

    public function index(){
        $city =City::all();

        return view('frontend.home.index',compact('city'));
    }


    // search parking

    public function searchParking(Request $request){

        // dd($request->all());

        $data = $request->all();

        $dropoffDate = Carbon::parse($request->dropoff_date);
        $pickupDate = Carbon::parse($request->pickup_date);

        $numberOfDays = $dropoffDate->diffInDays($pickupDate);

        $airport = AirportParking::with('city')->where('city_id',$request->city_id)->where('days', $numberOfDays)->get();

        $city = City::where('id',$request->city_id)->first();

        //  dd($airport);
        return view('frontend.home.booking-detail', compact('data','airport','city'));

    }
    // BookingParkingForm

    public function BookingParkingForm(Request $request){

        // dd($request->all());

        $data = $request->all();

        $dropoffDate = Carbon::parse($request->dropoff_date);
        $pickupDate = Carbon::parse($request->pickup_date);

        $numberOfDays = $dropoffDate->diffInDays($pickupDate);

        $airport = AirportParking::where('id',$request->airport_id)->first();

        $city = City::where('id',$request->city_id)->first();

        //  dd($airport);
        return view('frontend.home.booking-form-page', compact('data','airport','city'));

    }


    // booking detail page


    public function bookingDetailPage($id)
    {
        $booking = Booking::with('airport')->find($id);

        $dropoffDate = Carbon::parse($booking->dropoff_date);
        $pickupDate = Carbon::parse($booking->pickup_date);

        $numberOfDays = $dropoffDate->diffInDays($pickupDate);

        $pricing = ParkingPricing::where('airport_parking_id',$booking->airport_id)->first();


        if($numberOfDays = '1'){
            $price = $pricing->oneDay;
        }else if($numberOfDays <= '7'){
            $price = $pricing->weekly;

        }
        else if($numberOfDays <= '30'){
            $price = $pricing->monthly;

        }

        if ($booking->airport->voucher != '') {
            $discount = DiscountVoucher::where('promo_code', $booking->airport->voucher)->first();

            if ($discount) {

                if (Carbon::parse($discount->valid_until)->gt(now())) {
                    $price = $price - ($price * ($discount->discount / 100));
                }
            }
        }


        $booking->total_payment = $price;

        $booking->update();

        return view('frontend.home.booking-detail', compact('booking', 'numberOfDays','price'));
    }




    public function saveBookingDetail(Request $request)
    {
        $airport = AirportParking::find($request->airport_id);

        // Save booking details in the database
        $booking_id = Booking::insertGetId([
            'airport_id' => $request->airport_id,
            'dropoff_date' => $request->dropoff_date,
            'dropoff_time' => $request->dropoff_time,
            'pickup_date' => $request->pickup_date,
            'pickup_time' => $request->pickup_time,
            'fullName' => $request->fullName,
            'email' => $request->email,
            'mobileNumber' => $request->mobileNumber,
            'registration' => $request->registration,
            'passengers' => $request->passengers,
            'make' => $request->make,
            'model' => $request->model,
            'colour' => $request->colour,
            'terminalOut' => $request->terminalOut,
            'outboundFlightNumber' => $request->outboundFlightNumber,
            'terminalIn' => $request->terminalIn,
            'inboundFlightNumber' => $request->inboundFlightNumber,
            'total_payment' => $airport->price,
            'created_at' => now(),
        ]);

        $booking = Booking::find($booking_id);

        if (!$booking) {
            return redirect()->back()->withErrors('Booking not found.');
        }

        // Set Stripe secret key
        Stripe::setApiKey(config('services.stripe.secret'));

        // Create a Stripe Checkout Session
        try {
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Airport Parking Booking',
                            'description' => "Booking for {$booking->airport->name}",
                        ],
                        'unit_amount' => $booking->total_payment * 100, // Stripe expects amount in cents
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('payment.success', ['bookingId' => $booking_id]),
                'cancel_url' => route('payment.cancel', ['bookingId' => $booking_id]),
            ]);

            // Redirect the user to the Stripe checkout page
            return redirect($session->url);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Could not create Stripe session: ' . $e->getMessage());
        }
    }





    //  ================= contact us

    public function contactPage(){
        return view('frontend.home.contactus');
    }


    public function contactSave(request $request){
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'service' => $request->service,
            'message' => $request->message,
            'created_at' => now()
        ]);
        return redirect()->back();
    }





}
