<?php

namespace App\Http\Controllers;

use App\Models\Dailyhour;
use Illuminate\Http\Request;
use DB;

class DailyhourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dailyhour  $dailyhour
     * @return \Illuminate\Http\Response
     */
    public function show(Dailyhour $dailyhour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dailyhour  $dailyhour
     * @return \Illuminate\Http\Response
     */
    public function edit(Dailyhour $dailyhour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dailyhour  $dailyhour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dailyhour $dailyhour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dailyhour  $dailyhour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dailyhour $dailyhour)
    {
        //
    }

    public function pointer(Request $request)
    {
        $input = $request->all();
        $daily = new Dailyhour([
            "salarie_id" => $request->get('salarie_id'),
            "h_arrive" => $request->get('h_arrive'),
            "h_depart" => $request->get('h_depart'),
            "today_date" => $request->get('today_date'),
        ]);
        $daily->save();
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }


    public function pointerDepart(Request $request)
    {
        
        $chauffs = DB::select(DB::raw("UPDATE dailyhour SET h_depart = :h_depart  WHERE salarie_id = :salarie_id AND today_date = :today_date AND h_depart is null  "), array(
            'h_depart' => $request->get('h_depart'),
            'today_date' => $request->get('today_date'),
            'salarie_id' => $request->get('salarie_id'),
        ));

        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }


}
