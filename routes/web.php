<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelTransportController;
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
use App\Http\Controllers\PrivateTripFormController;
use App\Http\Admin\PrivateTripAdminController;
use App\Http\Controllers\Admin\PaymentAdminController;
use App\Http\Controllers\PaymentController;



// ================= USER =================

Route::get('/HotelTransport', [HotelTransportController::class, 'view'])->name('HotelTransport');
Route::get('/Transport', [TransportController::class, 'index'])->name('Transport');
Route::get('/Kalender', [KalenderController::class, 'index'])->name('user.kalender');
Route::get('/PaketWisata', [PaketWisataController::class, 'index'])->name('PaketWisata');

Route::get('/PrivateTrip', function () {
    return view('user.PrivateTrip');
})->name('PrivateTrip');

Route::get('/formulir', [FormulirController::class, 'create'])->name('formulir.create');
Route::get('/Event', function () {
    return view('user.Event');
})->name('Event');
Route::post('/formulir', [BookingController::class, 'store'])->name('formulir.store');

Route::get('/about', function () {
    return view('user.about');
})->name('about');

Route::get('/bandung-private', function () {
    return view('user.BandungPrivate');
})->name('BandungPrivate');
Route::get('/lembang-private', function () {
    return view('user.LembangPrivate');
})->name('LembangPrivate');
Route::get('/ciwidey-private', function () {
    return view('user.CiwideyPrivate');
})->name('CiwideyPrivate');
Route::get('/pangalengan-private', function () {
    return view('user.PangalenganPrivate');
})->name('PangalenganPrivate');
Route::get('/lembangoffroad-private', function () {
    return view('user.OffroadPrivate');
})->name('OffroadPrivate');

Route::get('/private-trip-form', [PrivateTripFormController::class, 'showForm'])
    ->name('privateTripForm.show');

Route::post('/private-trip/store', [PrivateTripFormController::class, 'store'])->name('privateTripForm.store');

Route::post('/testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');

Route::get('/transport/{vehicle}/booking', [UserTransportController::class, 'bookingForm'])
    ->name('user.transport.booking.form');

Route::post('/transport/{vehicle}/booking', [TransportReservationController::class, 'store'])
    ->name('transport.booking.store');

Route::get('/private-trip/form', [PrivateTripFormController::class, 'showForm'])
    ->name('privateTrip.form');

Route::post('/private-trip/store', [PrivateTripFormController::class, 'store'])
    ->name('privateTripForm.store');

Route::get('/payment', [PaymentController::class, 'show'])->name('payment.show');
Route::post('/payment/upload', [PaymentController::class, 'upload'])->name('payment.upload');
Route::get('/payment/invoice-pdf', [PaymentController::class, 'invoice'])->name('payment.invoice');

Route::get('/hotel/{id}/payment', [HotelBookingController::class, 'paymentPage'])->name('admin.hotel-bookings.payment');
Route::get('/hotel/{id}/payment/invoice', [HotelBookingController::class, 'invoice'])->name('hotel.payment.invoice');
Route::post('/hotel/{id}/payment/upload', [HotelBookingController::class, 'uploadPaymentProof'])->name('hotel.payment.upload');

Route::get('/kalender', [EventController::class, 'kalender'])->name('user.kalender');



//===== ADMIN =====
Route::group(['middleware' => ['auth', 'role:Admin']], function () {

    // Dashboard
    Route::get('/admin', function () {
        return view('admin.index', [
            'testimonialCount' => Testimonial::count(),
            'pendingCount' => Testimonial::where('status', 'pending')->count(),
            'approvedCount' => Testimonial::where('status', 'approved')->count(),
        ]);
    })->name('admin');

    // Testimonials
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/testimonials', [TestimonialAdminController::class, 'index'])->name('testimonials.index');
        Route::post('/testimonials/{id}/approve', [TestimonialAdminController::class, 'approve'])->name('testimonials.approve');
        Route::post('/testimonials/{id}/reject', [TestimonialAdminController::class, 'reject'])->name('testimonials.reject');
        Route::delete('/testimonials/{id}', [TestimonialAdminController::class, 'destroy'])->name('testimonials.destroy');
    });

    // CRUD Booking
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('bookings', [BookingController::class, 'index'])->name('bookings.index');
        Route::put('bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
        Route::delete('bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    });

    // USER HOTEL BOOKING
    Route::get('/hotel/{hotel}/booking', [HotelBookingController::class, 'create'])->name('hotel.booking.create');
    Route::post('/hotel/{hotel}/booking', [HotelBookingController::class, 'store'])->name('hotel.booking.store');

    // ADMIN HOTEL BOOKING
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('hotel-bookings', [HotelBookingController::class, 'index'])->name('hotel_bookings.index');
        Route::get('hotel-bookings/{booking}/edit', [HotelBookingController::class, 'edit'])->name('hotel_bookings.edit');
        Route::put('hotel-bookings/{booking}', [HotelBookingController::class, 'update'])->name('hotel_bookings.update');
        Route::delete('hotel-bookings/{booking}', [HotelBookingController::class, 'destroy'])->name('hotel_bookings.destroy');
    });
    
    // Hotels
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('hotels', [HotelController::class, 'index'])->name('hotels.index');
        Route::get('hotels/create', [HotelController::class, 'create'])->name('hotels.create');
        Route::post('hotels', [HotelController::class, 'store'])->name('hotels.store');
        Route::get('hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('hotels.edit');
        Route::put('hotels/{hotel}', [HotelController::class, 'update'])->name('hotels.update');
        Route::delete('hotels/{hotel}', [HotelController::class, 'destroy'])->name('hotels.destroy');
    });

    Route::prefix('admin')->group(function () {
        Route::resource('hotel_bookings', HotelBookingController::class)->names('admin.hotel-bookings');
    });

    Route::get('/admin/hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('admin.hotels.edit');
    Route::put('/admin/hotels/{hotel}', [HotelController::class, 'update'])->name('admin.hotels.update');

    // USER TRANSPORT
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('transport', [UserTransportController::class, 'index'])->name('transport.index');
        Route::get('transport/{vehicle}/booking', [UserTransportController::class, 'bookingForm'])->name('transport.booking.form');
        Route::post('transport/{vehicle}/booking', [TransportReservationController::class, 'store'])->name('transport.booking.store');
    });

    // Vehicles + Reservations
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('vehicles', TransportController::class);
        Route::get('transport-reservations', [TransportReservationController::class, 'index'])->name('transport-reservations.index');
        Route::delete('transport-reservations/{id}', [TransportReservationController::class, 'destroy'])->name('transport-reservations.destroy');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('vehicles', VehicleController::class);
        Route::resource('transport_reservations', TransportReservationController::class);
    });

    Route::get('/admin/kalender/{id}/edit', [KalenderController::class, 'edit'])
    ->name('admin.kalender.edit');

    // Kalender Admin
    Route::prefix('admin')->group(function () {
        Route::get('/kalender', [AdminKalenderController::class, 'index'])->name('admin.kalender.index');
        Route::get('/kalender/create', [AdminKalenderController::class, 'create'])
        ->name('admin.kalender.create');
        Route::post('/kalender/event', [AdminKalenderController::class, 'storeEvent'])->name('admin.kalender.store');
        Route::put('/kalender/event/{event}', [AdminKalenderController::class, 'updateEvent'])->name('admin.kalender.update');
        Route::delete('/kalender/event/{event}', [AdminKalenderController::class, 'deleteEvent'])->name('admin.kalender.delete');

        Route::post('/kalender/highlight', [AdminKalenderController::class, 'storeHighlight'])->name('admin.kalender.highlight.store');
        Route::put('/kalender/highlight/{highlight}', [AdminKalenderController::class, 'updateHighlight'])->name('admin.kalender.highlight.update');
        Route::delete('/kalender/highlight/{highlight}', [AdminKalenderController::class, 'deleteHighlight'])->name('admin.kalender.highlight.delete');
    });

    // Logout
        Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    })->name('logout');

    // Highlight
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('highlight', HighlightController::class);
    });

    // Private Trip Admin
    Route::get('/admin/private-trips', [PrivateTripAdminController::class, 'index'])->name('admin.privateTrips');

    // Payments
    Route::get('/admin/payments', [PaymentAdminController::class, 'index'])->name('admin.payments');
    Route::post('/admin/payments/{id}/status', [PaymentAdminController::class, 'updateStatus'])->name('admin.payments.updateStatus');
    Route::delete('/admin/payments/{id}', [PaymentAdminController::class, 'destroy'])->name('admin.payments.delete');
});


// ================= LOGIN =================

Route::get('/login', [UserController::class, 'formLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/', [HomeController::class, 'view'])->name('home');