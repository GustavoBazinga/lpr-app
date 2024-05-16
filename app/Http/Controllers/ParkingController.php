<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreParkingRequest;
use App\Http\Requests\UpdateParkingRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\FtpController;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function search()
    {
        # Pega todos os registros
        $data = Parking::all();
        return view('parking.search');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreParkingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $inputs = $request->all();
        $plate = $inputs['plate'];
        $datetime = $inputs['datetime'];
        $data = Parking::where('plate', $plate)->get();
        $startOfDay = date('Y-m-d 00:00:00', strtotime($datetime));
        $endOfDay = date('Y-m-d 23:59:59', strtotime($datetime));
        if ($datetime == null) {
            $startOfDay = date('Y-m-d 00:00:00', strtotime('today'));
            $endOfDay = date('Y-m-d 23:59:59', strtotime('today'));
        }
        $data = Parking::where('plate', $plate)->whereBetween('entry_date', [$startOfDay, $endOfDay])->get();
        $response = [];
        foreach ($data as $item) {
            $response[] = [
                'plate' => $item->plate,
                'color' => $item->color,
                'entry_date' => $item->entry_date,
                'file' => FtpController::getImage($item->file),
            ];
        };
        // return $response[0]['file'];
        return view('parking.show')->with('data', $response)->with('plate', $plate)->with('datetime', $datetime);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parking $parking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParkingRequest $request, Parking $parking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parking $parking)
    {
        //
    }
}
