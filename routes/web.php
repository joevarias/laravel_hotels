<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\HotelController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HotelController as Hotel;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserExtendedController;
use App\Http\Controllers\BookingExtendedController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('hotel.index');
});



require __DIR__.'/auth.php';



Route::middleware('auth:superadmin,employee,web')->group(function(){

	Route::get('/dashboard', function () {
    	return view('dashboard');
	})->name('dashboard');

});


// Route::prefix('form')->group(function () {
//     Route::get('/','App\Http\Controllers\FormController@index')->name('form.index');
// });


// SuperAdmin Hotel Controllers

Route::prefix('/superadmin')->name('superadmin.')->middleware('auth:superadmin')->group(function(){

        Route::get('/add_hotels', [HotelController::class, 'addHotel'])
                ->name('add_hotels');

        Route::post('/menu/add_hotel', [HotelController::class, 'saveHotel'])
                ->name('save_hotels');

});

Route::prefix('/hotels')->name('search.')->group(function(){

        Route::get('/', [SearchController::class, 'showIndex'])
        		->name('index');

        Route::get('/search/city',[SearchController::class, 'searchCity'])
        		->name('city');

        Route::get('/search/hotels',[SearchController::class, 'searchHotel'])
        		->name('hotels');

        Route::get('/search/rooms', [Hotel::class, 'changeRoomDateSearch'])
                ->name('rooms');

        Route::get('/{id}/{dates_frominput}', [Hotel::class, 'showHotelAndRoomAvailability']);


});


// Booking routes

Route::middleware(['auth'])->prefix('/book')->name('book.')->group(function(){

        Route::get('/bookingdetails', [BookingController::class, 'showFormBooking'])
                ->name('bookingdetails');

        Route::PUT('/transaction-details', [BookingController::class, 'showTransactionDetails'])
                ->name('transactiondetails');

});

// Customer profile routes


Route::middleware(['auth'])->prefix('/customer')->name('customer.')->group(function(){

        Route::get('/profile', [UserController::class, 'showProfileForm'])
                ->name('profile');

        Route::PUT('/profile/update', [UserController::class, 'updateProfile'])
                ->name('profile.update');

        Route::get('/profile/password', [UserController::class, 'showPasswordForm'])
                ->name('profile.password');

        Route::PUT('/profile/password/update', [UserController::class, 'updatePassword'])
                ->name('password.update');

        Route::get('/profile/booking/show', [UserController::class, 'showBookings'])
                ->name('profile.bookings');

        Route::get('/profile/bookingdetails/updatedetails', [UserController::class, 'bookingsTransactionUpdateDetails'])
                ->name('booking.updatedetails');

        Route::get('/profile/booking/update', [UserController::class, 'showBookingsTransactionForm'])
                ->name('booking.updateform');

        Route::PUT('/booking/submitchanges', [UserExtendedController::class, 'bookingTransacntionSubmitChanges'])
                ->name('booking.submitchanges');

});


Route::middleware(['auth'])->prefix('/customer')->name('customer.')->group(function(){

        Route::get('/profile/viewbooking/{trans_no}', [UserController::class, 'showBookingsTransactionDetails']);

        Route::DELETE('/bookingdelete/{trans_no}/fromAll', [BookingExtendedController::class, 'deleteBookingFromShowAll']);

        Route::DELETE('/bookingdelete/{trans_no}/fromOne', [BookingExtendedController::class, 'deleteBookingFromShowOne']);

        Route::PUT('/bookingcancel/{trans_no}', [BookingExtendedController::class, 'cancelBooking']);

});