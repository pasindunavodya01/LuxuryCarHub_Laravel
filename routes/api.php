<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Route;

// User Routes
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Registration
Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return response()->json(['message' => 'User registered successfully']);
});

// Login and token creation
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
        'user' => $user,
    ]);
});

Route::post('/logout', function (Request $request) {
    $request->user()->tokens()->delete();
    return response()->json(['message' => 'Logged out']);
})->middleware('auth:sanctum');

// Vehicle Routes
Route::get('/vehicles', function () {
    return response()->json(App\Models\Car::all());
});

Route::get('/vehicles/{id}', function ($id) {
    $car = App\Models\Car::find($id);
    if (!$car) {
        return response()->json(['message' => 'Vehicle not found'], 404);
    }
    return response()->json($car);
});

Route::post('/vehicles', function (Request $request) {
    $request->validate([
        'make' => 'required|string',
        'model' => 'required|string',
        'year' => 'required|integer',
        'price' => 'required|numeric',
        'fuel' => 'required|string',
        'images' => 'required|string'
    ]);

    $car = App\Models\Car::create($request->all());
    return response()->json($car, 201);
})->middleware('auth:sanctum');

Route::put('/vehicles/{id}', function (Request $request, $id) {
    $car = App\Models\Car::find($id);
    if (!$car) {
        return response()->json(['message' => 'Vehicle not found'], 404);
    }

    $request->validate([
        'make' => 'string',
        'model' => 'string',
        'year' => 'integer',
        'price' => 'numeric',
        'fuel' => 'string',
        'images' => 'string'
    ]);

    $car->update($request->all());
    return response()->json($car);
})->middleware('auth:sanctum');

Route::delete('/vehicles/{id}', function (Request $request, $id) {
    $car = App\Models\Car::find($id);
    if (!$car) {
        return response()->json(['message' => 'Vehicle not found'], 404);
    }

    $car->delete();
    return response()->json(['message' => 'Vehicle deleted successfully']);
})->middleware('auth:sanctum');

// Search vehicles
Route::get('/vehicles/search', function (Request $request) {
    $query = App\Models\Car::query();

    if ($request->has('make')) {
        $query->where('make', 'like', '%' . $request->make . '%');
    }
    if ($request->has('model')) {
        $query->where('model', 'like', '%' . $request->model . '%');
    }
    if ($request->has('year')) {
        $query->where('year', $request->year);
    }
    if ($request->has('fuel')) {
        $query->where('fuel', 'like', '%' . $request->fuel . '%');
    }
    if ($request->has('price_min')) {
        $query->where('price', '>=', $request->price_min);
    }
    if ($request->has('price_max')) {
        $query->where('price', '<=', $request->price_max);
    }

    return response()->json($query->get());
});


