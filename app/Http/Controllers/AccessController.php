<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccessRequest;
use App\Http\Requests\UpdateAccessRequest;
use App\Models\Member;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;

class AccessController extends Controller
{
    public static function findAccessByTIme($time)
    {
        //Split the time into date and time
        $time = explode('T', $time);
        $date = $time[0];
        $time = $time[1];
        //Replace - with : in time
        $time = str_replace('-', ':', $time);
        $datetime = $date . 'T' . $time;
        $time = strtotime($time);
        //Get all accesses with the given time 15 seconds ago and later than time
        $startTime = date('Y-m-d\TH:i:s', $time - 15);
        $endTime = date('Y-m-d\TH:i:s', $time + 15);

        $data = Access::whereBetween('Date', [$startTime, $endTime])->whereIn('Ratchet', ['1116448', '5124723', '7061845'])->get();

        //Order the data by time
        $data = $data->sortBy('Date');



        $persons = [];
        foreach ($data as $access) {
            if ($access->Authorization){
                $authorization = DB::connection('mc_sqlsrv')->table('dbo.Authorizations')->where('Id', $access->Authorization)->first();
                $persons[] = Visitor::find($authorization->Visitor);
            } else {
                // dd($access->Barcode);
                $persons[] = Member::where('Barcode', $access->Barcode)->first();
            }
        };


        return $persons;

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Test get all accesses for today
        $data = Access::whereDate('Date', date('Y-m-d'))->get();
        return response()->json($data);
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
    public function store(StoreAccessRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Access $access)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Access $access)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccessRequest $request, Access $access)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Access $access)
    {
        //
    }
}
