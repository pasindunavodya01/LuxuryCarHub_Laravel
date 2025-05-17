<?php
namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectId;


class VehicleController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Car::query();

            if ($request->filled('search')) {
                $search = $request->get('search');
                $regex = '/' . preg_quote($search, '/') . '/i';
                
                $query->where(function($q) use ($regex) {
                    $q->where('make', 'regex', $regex)
                      ->orWhere('model', 'regex', $regex)
                      ->orWhere('year', 'regex', $regex)
                      ->orWhere('fuel', 'regex', $regex);
                });
            }

            $vehicles = $query->get();
            
            return view('vehicles', compact('vehicles'));
            
        } catch (\Exception $e) {
            \Log::error('Error in vehicle search: ' . $e->getMessage());
            return view('vehicles', [
                'vehicles' => [],
                'error' => 'An error occurred while fetching vehicles. Please try again.'
            ]);
        }
    }

 

public function show($id)
{
    try {
        $car = Car::find($id);

        if (!$car) {
            return redirect()->route('vehicles.index')
                           ->with('error', 'Car not found');
        }        $dealer = \App\Models\User::find($car->dealer_id);

        return view('car_details', compact('car', 'dealer'));
    } catch (\Exception $e) {
        return response()->view('errors.500', ['message' => 'Error fetching car details: ' . $e->getMessage()], 500);
    }
}

}
