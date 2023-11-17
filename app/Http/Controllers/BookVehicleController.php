<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\BookVehicle;
use Carbon\Carbon;

class BookVehicleController extends Controller
{
    public function index($id)
    {
        $vehicle = Vehicle::where('id', $id)->first();

        return view('book_vehicles.create', compact('vehicle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'vehicle_id' => 'required',
            'customer_id' => 'required',
        ]);

        $vehicle = Vehicle::where('id', $request->vehicle_id)->first();
        if ($vehicle->status == true) {
            return redirect()->back();
        }

        $booking = BookVehicle::create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'vehicle_id' => $request->vehicle_id,
            'customer_id' => $request->customer_id,
        ]);

        Vehicle::where('id', $vehicle->id)->update(['status' => true]);

        return redirect()->route('vehicle');
    }

    public function update($id)
    {
        $vehicle = BookVehicle::where('customer_id', $id)->first();

        return view('return_vehicles.create', compact('vehicle'));
    }

    public function return(Request $request)
    {
        $request->validate([
            'plat_number' => 'required',
        ]);

        $vehicle = Vehicle::where('plat_number', $request->plat_number)->first();

        if ($vehicle->status == true) {
            $booking = BookVehicle::where('vehicle_id', $vehicle->id)
                ->whereNull('return_date')
                ->with('vehicle')
                ->first();

            $dailyRate = $vehicle->charge;
            $startDate = $booking->start_date;
            $endDate = Carbon::parse($booking->end_date);

            $daysRented = $endDate->diffInDays($startDate);
            $totalCost = $daysRented * $dailyRate;

            $booking->update([
                'return_date' => $endDate,
                'total_cost' => $totalCost,
            ]);

            Vehicle::where('id', $vehicle->id)->update(['status' => false]);

            return view('return_vehicles.show', compact('booking', 'daysRented', 'totalCost'));
        } else {
            return redirect()->back();
        }
    }
}
