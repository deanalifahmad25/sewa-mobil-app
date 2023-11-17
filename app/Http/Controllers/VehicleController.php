<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehicle;
use App\Models\BookVehicle;
use App\Models\User;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();

        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create', ['customers' => User::get(['id', 'name'])]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Vehicle::create($data);

        return redirect()->route('vehicle');
    }

    public function show(Vehicle $vehicle)
    {
        $userId = Auth::user()->id;

        $vehicles = BookVehicle::where('customer_id', $userId)->where('return_date', null)->with('vehicle')->get();

        return view('dashboard', compact('vehicles'));
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::where('id', $id)->first();

        $vehicle->delete();

        return redirect()->route('vehicle');
    }
}
