<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flight;

class FlightController extends Controller
{
    public function index(Request $request)
    {
        
        $perPage = $request->get('per_page', 10);

        $sortBy = $request->get('sort_by', 'departure_time');

        $sortOrder = $request->get('sort_order', 'asc');

        
        $query = Flight::query();

        if ($request->has('number')) {
            $query->where('number', 'like', '%' . $request->get('number') . '%');
        }

        if ($request->has('departure_city')) {
            $query->where('departure_city', 'like', '%' . $request->get('departure_city') . '%');
        }

        if ($request->has('arrival_city')) {
            $query->where('arrival_city', 'like', '%' . $request->get('arrival_city') . '%');
        }

        if ($request->has('departure_time')) {
            $query->whereDate('departure_time', $request->get('departure_time'));
        }

        if ($request->has('arrival_time')) {
            $query->whereDate('arrival_time', $request->get('arrival_time'));
        }

        
        $flights = $query->orderBy($sortBy, $sortOrder)->paginate($perPage);

        
        return response()->json($flights);
    }
    public function passengers(Flight $flight){
        $passengers = $flight->passengers()->get();
        return response()->json($passngers);
    }

}
