<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\AccommodationsController;
use App\Http\Controllers\Api\OfferImageController;
use App\Http\Controllers\Api\OfferPriceController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\AirplaneTicketController;
use App\Http\Controllers\Api\AirplaneContactController;
use App\Http\Controllers\Api\UserImageController;
use App\Http\Controllers\Api\TestimonialController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/offers', [OfferController::class, 'index']);
Route::get('/offers/{id}', [OfferController::class, 'show']);

Route::get('/locations', [LocationController::class, 'index']);
Route::get('/locations/{id}', [LocationController::class, 'show']);

Route::get('/accommodations', [AccommodationsController::class, 'index']);
Route::get('/accommodations/{id}', [AccommodationsController::class, 'show']);

Route::get('/offer-images', [OfferImageController::class, 'index']);
Route::get('/offer-images/{id}', [OfferImageController::class, 'show']);

Route::get('offer-prices', [OfferPriceController::class, 'index']);
Route::get('offer-prices/{id}', [OfferPriceController::class, 'show']);


Route::post('/subscriptions', [SubscriptionController::class, 'store'])->name('subscriptions.store');
Route::post('/contacts', [ContactController::class, 'store']);

Route::post('/airplane-tickets', [AirplaneTicketController::class, 'store']);
Route::post('/airplane-contacts', [AirplaneContactController::class, 'store']);

Route::get('/user-images', [UserImageController::class, 'index']);
Route::post('/user-images', [UserImageController::class, 'store']);
Route::get('/user-images/{id}', [UserImageController::class, 'show']);

Route::get('/testimonials', [TestimonialController::class, 'index']);
Route::get('/testimonials/{id}', [TestimonialController::class, 'show']);
Route::post('/testimonials', [TestimonialController::class, 'store']);
