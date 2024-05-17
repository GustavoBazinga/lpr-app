<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreParkingRequest;
use App\Http\Requests\UpdateParkingRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\FtpController;
use App\Http\Controllers\AccessController;
use DateTime;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function search()
    {
        $startOfDay = date('Y-m-d\T00:00:00');
        $endOfDay = date('Y-m-d\T23:59:59');
        $todayParking = Parking::whereBetween('entry_date', [$startOfDay, $endOfDay])->get();

        $todayParkingCount = $todayParking->count();
        $todayParkingNoPlate = $todayParking->where('plate', 'Sem placa')->count();
        return view('parking.search')->with('todayParkingCount', $todayParkingCount)->with('todayParkingNoPlate', $todayParkingNoPlate);
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
        $startOfDay = date('Y-m-d\T00:00:00', strtotime($datetime));
        $endOfDay = date('Y-m-d\T23:59:59', strtotime($datetime));
        if ($datetime == null) {
            $startOfDay = date('Y-m-d\T00:00:00', strtotime('today'));
            $endOfDay = date('Y-m-d\T23:59:59', strtotime('today'));
        }
        $data = Parking::where('plate', $plate)->whereBetween('entry_date', [$startOfDay, $endOfDay])->get();
        $car = [
            'plate' => $plate,
            'datetime' => $datetime
        ];

        $accessData = [];
        $response = [];
        foreach ($data as $item) {
            //Split date by T
            $temp_date = explode('T', $item->entry_date);
            $temp_date[1] = str_replace('-', ':', $temp_date[1]);
            $date = $temp_date[0] . "T" . $temp_date[1];
            $date = new Datetime($date);
            $date = $date->format('H:i:s d/m/Y');
            $response[] = [
                //Date format HH:mm:ss dd/MM/yyyy
                'entry_date' => $date,
                'file' => FtpController::getImage($item->file),
                'access' => AccessController::findAccessByTime($item->entry_date)
            ];
            $car['color'] = $item->color;
        };
        //Revert array to show the last access first
        $response = array_reverse($response);

        return view('parking.show')->with('data', $response)->with('plate', $plate)->with('datetime', $datetime)->with('access', $accessData)->with('car', $car);
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
