<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Car;

// Public routes
Route::get('/dealers', function () {
    $dealers = User::where('role', 'dealer')->get();
    return response()->json($dealers);
});

// Registration
Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'phone' => 'required|string|max:15',
        'role' => 'required|in:user,dealer',
        'password' => 'required|string|min:6',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'role' => $request->role,
        'password' => Hash::make($request->password),
    ]);

    return response()->json(['message' => 'User registered successfully', 'user' => $user]);
});

// Login
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

// Authenticated routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', function (Request $request) {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out']);
    });

    // Add new vehicle
    Route::post('/vehicles', function (Request $request) {
        $request->validate([
            'make' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'fuel' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'images' => 'required|string', // or use 'image_url' if that's your frontend field
        ]);

        $car = Car::create([
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'fuel' => $request->fuel,
            'price' => $request->price,
            'description' => $request->description,
            'images' => $request->images,
        ]);

        return response()->json(['message' => 'Vehicle added successfully', 'vehicle' => $car], 201);
    });

    Route::put('/vehicles/{id}', function (Request $request, $id) {
        $car = Car::find($id);
        if (!$car) {
            return response()->json(['message' => 'Vehicle not found'], 404);
        }

        $request->validate([
            'make' => 'sometimes|string',
            'model' => 'sometimes|string',
            'year' => 'sometimes|integer',
            'fuel' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'description' => 'sometimes|string',
            'images' => 'sometimes|string',
        ]);

        $car->update($request->all());

        return response()->json(['message' => 'Vehicle updated successfully', 'vehicle' => $car]);
    });

    Route::delete('/vehicles/{id}', function (Request $request, $id) {
        $car = Car::find($id);
        if (!$car) {
            return response()->json(['message' => 'Vehicle not found'], 404);
        }

        $car->delete();
        return response()->json(['message' => 'Vehicle deleted successfully']);
    });
});

// Public vehicle routes
Route::get('/vehicles', function () {
    return response()->json(Car::all());
});

Route::get('/vehicles/{id}', function ($id) {
    $car = Car::find($id);
    if (!$car) {
        return response()->json(['message' => 'Vehicle not found'], 404);
    }
    return response()->json($car);
});

Route::get('/vehicles/search', function (Request $request) {
    $query = Car::query();

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
