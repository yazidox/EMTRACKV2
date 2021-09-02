<?php

namespace App\Http\Controllers;

use App\Models\Salarier;
use Illuminate\Http\Request;
use DB;
use PDF;


class SalarierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Salarier::latest()->paginate(100);
    
        return view('salariers.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = DB::select('select * from restaurants');
        return view('salariers.create', ['restaurants'=>$restaurants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        Salarier::create($request->all());
     
        return redirect()->route('salariers.index')
                        ->with('success','Le restaurant a été ajouter avec success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salarier  $salarier
     * @return \Illuminate\Http\Response
     */
    public function show(Salarier $salarier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salarier  $salarier
     * @return \Illuminate\Http\Response
     */
    public function edit(Salarier $salarier)
    {
        $restaurants = DB::select('select * from restaurants');
        return view('salariers.edit',compact('salarier'), ['restaurants'=>$restaurants]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salarier  $salarier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salarier $salarier)
    {
        $salarier->update($request->all());
    
        return redirect()->route('salariers.index')
                        ->with('success','Le salarié a été modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salarier  $salarier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salarier $salarier)
    {
        $salarier->delete();
    
        return redirect()->route('salariers.index')
                        ->with('success','Employé a été suprimmé avec success');
    }
    
    public function getSalarieSalle()
    {
        $salaries = DB::select('select * from salariers WHERE poste = "1" ');
        return response()->json($salaries);
    }

    public function getSalarieCuisine()
    {
        $salaries = DB::select('select * from salariers WHERE poste = "2" ');
        return response()->json($salaries);
    }
    public function getSalariePlonge()
    {
        $salaries = DB::select('select * from salariers WHERE poste = "3" ');
        return response()->json($salaries);
    }

    public function checkpin(Request $request){
        $getpin = DB::select( DB::raw("SELECT pin from salariers WHERE id = :id "), array(
            'id' => $request->get('id'),
        ));
        $pin = $request->get('pin');
        foreach ($getpin as $getpin) {
            if($getpin->pin == $pin){
                return response()->json(['success'=>'true']);
            }else {
                return response()->json(['success'=>'false']);
            }
        }  
    }

    public function ishere(Request $request){
        $getnotes = DB::select( DB::raw("UPDATE salariers SET ishere = :ishere WHERE id = :id "), array(
            'id' => $request->get('id'),
            'ishere' => $request->get('ishere')
        ));
        return response()->json(['success'=>'Got Simple updated.']);
    }

    public function getRapport($id){
        $rapport = DB::select( DB::raw("SELECT * FROM dailyhour INNER JOIN salariers ON dailyhour.salarie_id = salariers.id WHERE salarie_id = :id "), array(
            'id' => $id,
        ));
        $rapport_name = DB::select( DB::raw("SELECT * FROM salariers WHERE id = :id LIMIT 1"), array(
            'id' => $id,
        ));
        return view('salariers.rapport',['rapport'=>$rapport, 'rapport_name'=>$rapport_name]);
    }

    public function generatePDF($id)
    {
      
        $rapport = DB::select( DB::raw("SELECT * FROM dailyhour INNER JOIN salariers ON dailyhour.salarie_id = salariers.id WHERE salarie_id = :id "), array(
            'id' => $id,
        ));
        $rapport_name = DB::select( DB::raw("SELECT * FROM salariers WHERE id = :id LIMIT 1"), array(
            'id' => $id,
        ));

        $data = ['rapport'=>$rapport, 'rapport_name'=>$rapport_name];

        $pdf = PDF::loadView('salariers.rapportpdf', $data);
    
        return $pdf->download('rapport.pdf');
    }


}
