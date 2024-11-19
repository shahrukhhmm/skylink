<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Admin\BookingDataController;
use App\Http\Controllers\Frontend\frontendController;
use App\Http\Controllers\Admin\AirportParkingController;
use App\Http\Controllers\Admin\ParkingPricingController;


Route::get('/optimize', function() {
    Artisan::call('optimize');
    return "optimized!";
});

    // routes/web.php
Route::get('lang/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('setLanguage');

// Route::redirect('/', '/dashboard');

// home

Route::get('/', [frontendController::class, 'index'])->name('home');
Route::get('/search-parking', [frontendController::class, 'searchParking'])->name('searchParking');

Route::get('/book-parking-form', [frontendController::class, 'BookingParkingForm'])->name('BookingParkingForm');

Route::get('/booking-detail/{id}', [frontendController::class, 'bookingDetailPage'])->name('bookingDetailPage');

Route::post('/booking-save', [frontendController::class, 'saveBookingDetail'])->name('saveBookingDetail');



Route::get('/payment/{id}', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::get('/create-checkout-session/{booking}', [PaymentController::class, 'createCheckoutSession'])->name('checkout.session');



Route::get('/payment-success/{bookingId}', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment-cancel/{bookingId}', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');

// about

Route::get('/about', function(){
    return view('frontend.home.about');
});

// contact

Route::get('/contact-us', [frontendController::class, 'contactPage'])->name('contact ');
Route::post('contact-save', [frontendController::class, 'contactSave'])->name('contact-save');



Route::get('register', [AuthController::class, 'registerPage'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');
Route::get('login', [AuthController::class, 'loginPage'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');



Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');







    //================ user

    Route::get('/user', [UserController::class, 'index'])->name('user');

    Route::get('/users-list', [UserController::class, 'getUsers'])->name('user.list');

    // add user
    Route::post('/add-user',                     [UserController::class, 'addUser'])->name('user.add');

    // edit user
    Route::get('/edit-user/{id}',                [UserController::class, 'editUser'])->name('user.edit');

    // update user
    Route::get('/update-user',                   [UserController::class, 'updateUser'])->name('user.update');

    // user delete
    Route::get('/user-delete/{id}',              [UserController::class, 'deleteUser'])->name('user.delete');


    // profile user
    Route::get('/profile-user',                   [UserController::class, 'profileUser'])->name('user.profile');





    //================ airport-parkings



    Route::get('/airport-parkings', [AirportParkingController::class, 'index'])->name('/airport-parkings');

    // change the user to AirportParking



    Route::get('/airport-parkings-list', [AirportParkingController::class, 'getAirportParking'])->name('/airport-parkings.list');

    // add AirportParking
    Route::post('/add-airport-parkings',       [AirportParkingController::class, 'addAirportParking'])->name('airport-parkings.add');

    // edit AirportParking
    Route::get('/edit-airport-parkings/{id}',  [AirportParkingController::class, 'editAirportParking'])->name('airport-parkings.edit');

    // update AirportParking
    Route::post('/update-airport-parkings',     [AirportParkingController::class, 'updateAirportParking'])->name('airport-parkings.update');

    // AirportParking delete
    Route::get('/airport-parkings-delete/{id}',[AirportParkingController::class, 'deleteAirportParking'])->name('airport-parkings.delete');






    //================ city



    Route::get('/city', [CityController::class, 'index'])->name('/city');

    // change the user to City

    Route::get('/city-list', [CityController::class, 'getCity'])->name('/city.list');

    // add City
    Route::post('/add-city',       [CityController::class, 'addCity'])->name('city.add');

    // edit AirportParking
    Route::get('/edit-city/{id}',  [CityController::class, 'editCity'])->name('city.edit');

    // update City
    Route::get('/update-city',     [CityController::class, 'updateCity'])->name('city.update');

    // City delete
    Route::get('/city-delete/{id}',[CityController::class, 'deleteCity'])->name('city.delete');




    //================ -parkinPricinggs pricing



    Route::get('/parkings-pricing', [ParkingPricingController::class, 'index'])->name('/parkings-pricing');

    // change the user to ParkingPricing

    Route::get('/parkings-pricing-list', [ParkingPricingController::class, 'getParkingPricing'])->name('/parkings-pricing.list');

    // add ParkingPricing
    Route::post('/add-parkings-pricing',       [ParkingPricingController::class, 'addParkingPricing'])->name('parkings-pricing.add');

    // edit ParkingPricing
    Route::get('/edit-parkings-pricing/{id}',  [ParkingPricingController::class, 'editParkingPricing'])->name('parkings-pricing.edit');

    // update ParkingPricing
    Route::get('/update-parkings-pricing',     [ParkingPricingController::class, 'updateParkingPricing'])->name('parkings-pricing.update');

    // ParkingPricing delete
    Route::get('/parkings-pricing-delete/{id}',[ParkingPricingController::class, 'deleteParkingPricing'])->name('parkings-pricing.delete');






    //================ discount voucher



    Route::get('/discount', [DiscountController::class, 'index'])->name('/discount');

    // change the user to Discount

    Route::get('/discount-list', [DiscountController::class, 'getDiscount'])->name('/discount.list');

    // add Discount
    Route::post('/add-discount',       [DiscountController::class, 'addDiscount'])->name('discount.add');

    // edit Discount
    Route::get('/edit-discount/{id}',  [DiscountController::class, 'editDiscount'])->name('discount.edit');

    // update Discount
    Route::get('/update-discount',     [DiscountController::class, 'updateDiscount'])->name('discount.update');

    // Discount delete
    Route::get('/discount-delete/{id}',[DiscountController::class, 'deleteDiscount'])->name('discount.delete');




    //================ booking

    Route::get('/booking-data-admin', [BookingDataController::class, 'index'])->name('bookingData');

    Route::get('/booking-data-admin-list', [BookingDataController::class, 'bookingDataList'])->name('bookingData.list');


    // edit
    Route::get('/edit-booking/{id}',                [BookingDataController::class, 'editBooking'])->name('booking.edit');

    // update Booking
    Route::get('/update-booking',                   [BookingDataController::class, 'updateBooking'])->name('booking.update');





    // ==================contact

    Route::get('/contact', [ContactController::class, 'index'])->name('Contact');

    Route::get('/contact-list', [ContactController::class, 'ContactList'])->name('Contact.list');

});
