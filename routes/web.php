<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\AccommodationsController;
use App\Http\Controllers\OfferImagesController;
use App\Http\Controllers\OfferPricesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AirplaneTicketController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('offers', OffersController::class);
    Route::resource('locations', LocationsController::class);
    Route::resource('accommodations', AccommodationsController::class);

    // Offer Images Routes
    Route::get('/offer_images', [OfferImagesController::class, 'index'])->name('offer_images.index');
    Route::get('/offer_images/create', [OfferImagesController::class, 'create'])->name('offer_images.create');
    Route::post('/offer_images', [OfferImagesController::class, 'store'])->name('offer_images.store');
    Route::get('/offer_images/{offer_image}', [OfferImagesController::class, 'show'])->name('offer_images.show');
    Route::get('/offer_images/{offer_image}/edit', [OfferImagesController::class, 'edit'])->name('offer_images.edit');
    // Route::put('/offer_images/{offer_image}', [OfferImagesController::class, 'update'])->name('offer_images.update');
    Route::delete('/offer_images/{offer_image}', [OfferImagesController::class, 'destroy'])->name('offer_images.destroy');
    // Route::patch('/offer_images/{offer_image}', [OfferImagesController::class, 'update'])->name('offer_images.update');


    Route::resource('offer_prices', OfferPricesController::class);


    Route::patch('/dashboard/contacts/{id}/mark-contacted', [DashboardController::class, 'markContacted'])->name('dashboard.contacts.mark-contacted');

    Route::patch('/dashboard/user-images/{id}/toggle-approval', [DashboardController::class, 'approveImage'])->name('dashboard.user-images.toggle-approval');
    Route::patch('/dashboard/testimonials/{id}/toggle-approval', [DashboardController::class, 'toggleApproval'])->name('dashboard.testimonials.toggle-approval');


    Route::get('/airplane-tickets', [AirplaneTicketController::class, 'index'])->name('airplane-tickets.index');
Route::get('/airplane-tickets/{id}', [AirplaneTicketController::class, 'show'])->name('airplane-tickets.show');

Route::middleware('superadmin')->group(function () {
    Route::resource('users', UserController::class);
});
});

require __DIR__.'/auth.php';
