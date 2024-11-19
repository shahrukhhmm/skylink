<?php

namespace App\Http\Controllers\Frontend;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Booking;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Models\BookingDetail;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function showPaymentForm($id)
    {
        $booking = Booking::find($id);
        return view('frontend.home.payment', compact('booking'));
    }


    public function createCheckoutSession($bookingId)
    {
        // Fetch the booking details
        $booking = Booking::find($bookingId);

        if (!$booking) {
            return redirect()->back()->withErrors('Booking not found.');
        }

        // Save booking ID to session for tracking
        session(['booking_id' => $bookingId]);

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Booking Payment',
                    ],
                    'unit_amount' => $booking->total_payment * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'cancel_url' => route('payment.cancel'),
            'success_url' => route('payment.success'),
        ]);

        return redirect($session->url);
    }



    public function paymentSuccess($bookingId)
    {
        $booking = Booking::find($bookingId);

        if ($booking) {
            $booking->booking_payment = 'paid';
            $booking->save();
        }

        return view('frontend.home.success', compact('booking'));
    }

    public function paymentCancel($bookingId)
    {
        return view('frontend.home.cancel', ['bookingId' => $bookingId]);
    }

}
