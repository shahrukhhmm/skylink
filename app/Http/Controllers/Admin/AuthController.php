<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\User;
use App\Models\Branch;
use App\Models\Booking;
use App\Models\SaleItem;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\AirportParking;
use App\Models\ParkingPricing;
use App\Models\UserAttandance;
use App\Models\DiscountVoucher;
use App\Models\InventoryCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function registerPage()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'status' => 'pending',
        ]);

        // Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function loginPage()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->status === 'active') {
                return redirect()->route('dashboard');
            }

            Auth::logout();
            return back()->withErrors(['email' => 'Your account is not active.']);
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }


    // dashboard

    public function dashboard()
    {
        $user = Auth::user();

        if($user->role_id == 2){
            return redirect('/user-attendance');
        }

        $user = User::count();
        $airport_parking = AirportParking::count();
        $parking_pricing = ParkingPricing::count();
        $discount_voucher = DiscountVoucher::count();
        $booking = Booking::count();
        $city = City::count();

        $bookingData = Booking::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total'))
        ->groupBy('date')
        ->orderBy('date')
        ->get();


        $bookingStatusData = Booking::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
        ->get();

        $airportParkingData = AirportParking::select('name', DB::raw('count(*) as total'))
        ->groupBy('name')
        ->get();

        return view('admin.dashboard.index', compact(
        'user', 'airport_parking', 'parking_pricing', 'discount_voucher', 'booking', 'bookingData', 'bookingStatusData','airportParkingData','city'
        ));


    }
}
