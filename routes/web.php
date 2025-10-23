<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelTransportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KalenderController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\PrivateTripController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Admin\TestimonialAdminController;
use App\Models\Testimonial;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\HotelBookingController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\TransportReservationController;
use App\Http\Controllers\Admin\VehicleController;   
use App\Http\Controllers\UserTransportController;
use App\Http\Controllers\Admin\KalenderController as AdminKalenderController;
use App\Http\Controllers\Admin\HighlightController;



Route::get('/', [HomeController::class, 'view'])->name('home'); 
Route::get('/HotelTransport', [HotelTransportController::class, 'view'])->name('HotelTransport');
Route::get('/Transport', [TransportController::class, 'index'])->name('Transport');
Route::get('/Kalender', [KalenderController::class, 'index'])->name('user.kalender');
Route::get('/PaketWisata', [PaketWisataController::class, 'index'])->name('PaketWisata');
Route::get('/PrivateTrip', [PrivateTripController::class, 'view'])->name('PrivateTrip');
Route::get('/formulir', [FormulirController::class, 'create'])->name('formulir.create');
Route::get('/Event', function () {
    return view('user.Event');
})->name('Event');
Route::post('/formulir', [BookingController::class, 'store'])->name('formulir.store');

Route::get('/about', function () {
    return view('user.about');
})->name('about');

// Route untuk simpan testimonial
Route::post('/testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');

// Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/testimonials', [TestimonialAdminController::class, 'index'])->name('testimonials.index');
    Route::post('/testimonials/{id}/approve', [TestimonialAdminController::class, 'approve'])->name('testimonials.approve');
    Route::post('/testimonials/{id}/reject', [TestimonialAdminController::class, 'reject'])->name('testimonials.reject');
    Route::delete('/testimonials/{id}', [TestimonialAdminController::class, 'destroy'])->name('testimonials.destroy');
});

// Dashboard Admin
Route::get('/admin', function () {
    return view('admin.index', [
        'testimonialCount' => Testimonial::count(),
        'pendingCount' => Testimonial::where('status', 'pending')->count(),
        'approvedCount' => Testimonial::where('status', 'approved')->count(),
    ]);
});

// Admin CRUD
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::put('bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
});

// USER HOTEL BOOKING
Route::get('/hotel/{hotel}/booking', [HotelBookingController::class, 'create'])
    ->name('hotel.booking.create');
Route::post('/hotel/{hotel}/booking', [HotelBookingController::class, 'store'])
    ->name('hotel.booking.store');

// ADMIN HOTEL BOOKING
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('hotel-bookings', [HotelBookingController::class, 'index'])
        ->name('hotel_bookings.index'); // underscore
    Route::get('hotel-bookings/{booking}/edit', [HotelBookingController::class, 'edit'])
        ->name('hotel_bookings.edit'); // underscore
    Route::put('hotel-bookings/{booking}', [HotelBookingController::class, 'update'])
        ->name('hotel_bookings.update'); // underscore
    Route::delete('hotel-bookings/{booking}', [HotelBookingController::class, 'destroy'])
        ->name('hotel_bookings.destroy'); // underscore
});

    Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('hotels', [HotelController::class, 'index'])->name('hotels.index');
    Route::get('hotels/create', [HotelController::class, 'create'])->name('hotels.create');
    Route::post('hotels', [HotelController::class, 'store'])->name('hotels.store');
    Route::get('hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
    Route::put('hotels/{hotel}', [HotelController::class, 'update'])->name('hotels.update');
    Route::delete('hotels/{hotel}', [HotelController::class, 'destroy'])->name('hotels.destroy');
});

Route::prefix('admin')->group(function () {
    Route::resource('hotel_bookings', HotelBookingController::class)
         ->names('admin.hotel-bookings');
});

// Edit hotel
Route::get('/admin/hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('admin.hotels.edit');

// Update hotel
Route::put('/admin/hotels/{hotel}', [HotelController::class, 'update'])->name('admin.hotels.update');

// USER - Transport
Route::prefix('user')->name('user.')->group(function () {
    Route::get('transport', [UserTransportController::class,'index'])->name('transport.index');
    Route::get('transport/{vehicle}/booking', [UserTransportController::class,'bookingForm'])->name('transport.booking.form');
    Route::post('transport/{vehicle}/booking', [TransportReservationController::class,'store'])->name('transport.booking.store');
});

// ADMIN (vehicles CRUD + reservations list)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('vehicles', TransportController::class);
    Route::get('transport-reservations', [TransportReservationController::class,'index'])->name('transport-reservations.index');
    Route::delete('transport-reservations/{id}', [TransportReservationController::class,'destroy'])->name('transport-reservations.destroy');
});

// Vehicles
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('vehicles', VehicleController::class);
    Route::get('vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
    Route::put('vehicles/{vehicle}', [VehicleController::class, 'update'])->name('vehicles.update');
    Route::delete('vehicles/{vehicle}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
    Route::resource('transport_reservations', TransportReservationController::class);
});

Route::get('/transport/{vehicle}/booking', [UserTransportController::class, 'bookingForm'])
     ->name('user.transport.booking.form');

Route::post('/transport/{vehicle}/booking', [TransportReservationController::class, 'store'])
     ->name('transport.booking.store');

Route::prefix('admin')->group(function(){
    Route::get('/kalender',[App\Http\Controllers\Admin\KalenderController::class,'index'])->name('admin.kalender');
    Route::post('/kalender/event',[App\Http\Controllers\Admin\KalenderController::class,'storeEvent'])->name('admin.kalender.store');
    Route::put('/kalender/event/{event}',[App\Http\Controllers\Admin\KalenderController::class,'updateEvent'])->name('admin.kalender.update');
    Route::delete('/kalender/event/{event}',[App\Http\Controllers\Admin\KalenderController::class,'deleteEvent'])->name('admin.kalender.delete');
    
    // Event Highlights
    Route::post('/kalender/highlight',[App\Http\Controllers\Admin\KalenderController::class,'storeHighlight'])->name('admin.kalender.highlight.store');
    Route::put('/kalender/highlight/{highlight}',[App\Http\Controllers\Admin\KalenderController::class,'updateHighlight'])->name('admin.kalender.highlight.update');
    Route::delete('/kalender/highlight/{highlight}',[App\Http\Controllers\Admin\KalenderController::class,'deleteHighlight'])->name('admin.kalender.highlight.delete');
});

Route::get('/admin/kalender', [AdminKalenderController::class, 'index']);
Route::get('/admin/kalender/create', [AdminKalenderController::class, 'create']);
Route::post('/admin/kalender', [AdminKalenderController::class, 'store']);
Route::get('/admin/kalender/{id}/edit', [AdminKalenderController::class, 'edit']);
Route::put('/admin/kalender/{id}', [AdminKalenderController::class, 'update']);
Route::delete('/admin/kalender/{id}', [AdminKalenderController::class, 'destroy']);

// Halaman list kalender admin
Route::get('/admin/kalender', [AdminKalenderController::class, 'index'])->name('admin.kalender.index');

// Form create
Route::get('/admin/kalender/create', [AdminKalenderController::class, 'create'])->name('admin.kalender.create');
Route::post('/admin/kalender', [AdminKalenderController::class, 'store'])->name('admin.kalender.store');

// Form edit
Route::get('/admin/kalender/{id}/edit', [AdminKalenderController::class, 'edit'])->name('admin.kalender.edit');
Route::put('/admin/kalender/{id}', [AdminKalenderController::class, 'update'])->name('admin.kalender.update');

// Delete
Route::delete('/admin/kalender/{id}', [AdminKalenderController::class, 'destroy'])->name('admin.kalender.delete');

Route::get('/kalender', [App\Http\Controllers\EventController::class, 'kalender'])->name('user.kalender');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('highlight', HighlightController::class);
});
