<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DealerCarController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\VehicleController;
use Laravel\Jetstream\Jetstream;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Authentication routes with role-based redirection
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;
        if ($role === 'dealer') {
            return redirect()->route('dealer.cars.index');
        } else {
            return view('dashboard.user');
        }
    })->name('dashboard');

    // Profile Routes
    Route::get('/user/profile', function () {
        return view('profile.show');
    })->name('profile.show');

    Route::get('/user/profile/edit', function () {
        return view('profile.edit');
    })->name('profile.edit');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Example protected route
    Route::get('/cars', [App\Http\Controllers\Api\CarController::class, 'index']);
});


// Dealer routes
Route::middleware(['auth'])->prefix('dealer')->name('dealer.')->group(function () {
    Route::resource('cars', DealerCarController::class);
});

// Public dealer routes
Route::get('/dealers/{id}', [DealerController::class, 'show'])->name('dealers.show');
Route::post('/dealers/{id}/contact', [DealerController::class, 'contact'])->name('dealers.contact');

Route::get('/car_details/{id}', [VehicleController::class, 'show'])->name('vehicles.show');


Route::get('/dealer/{id}', [DealerController::class, 'show'])->name('dealers.show');
Route::post('/dealer/{id}/contact', [DealerController::class, 'contact'])->name('dealers.contact');

// routes/web.php

use App\Http\Controllers\MapController;

Route::get('/map', [MapController::class, 'index'])->name('map');

