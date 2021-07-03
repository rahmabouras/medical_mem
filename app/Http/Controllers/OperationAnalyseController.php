<?php

namespace App\Http\Controllers;

use App\OperationAnalyse;
use Illuminate\Http\Request;
use App\analyse;
use App\consultation;

use App\DossierPatient;
use View;
use Redirect;
use DB;

class OperationAnalyseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $analyse = OperationAnalyse::paginate(5);
        $view = View::make('analyse.index'); //liaison controller lil blade
        $view->analyse = $analyse;
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $analyse = OperationAnalyse::get();

        $pats = DossierPatient::get();

        $view = view::make('analyse.create');
        $view->analyse = $analyse;
        $view->pats = $pats;

        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  $request->validate(
            [
                'date_analyse' => 'required|date|date_format:Y-m-d',
                'description_analyse' => 'required|string',
                'resultat_analyse'=> 'required|string',
                'patient_id' => 'required|integer',

            ]);

        $ficheconsul =  consultation::where('patient_id', intval($request['patient_id']))->first();//un seul element de consultation
        //dd($ficheconsul);
        if (is_null($ficheconsul)) {
            return redirect()->route('analyse.create')->with('warning', "Ce patient n'a pas une fiche de consultation");
        }
        $analyse = new OperationAnalyse(); //MODEL
        $analyse->date_analyse = $request->input('date_analyse');
        $analyse->description_analyse = $request->input('description_analyse');
        $analyse->resultat_analyse= $request->input('resultat_analyse');
        $analyse->consultation_id= $ficheconsul->id;
        $analyse->save();
        return Redirect::to(route('analyse.index'));    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $analyse = OperationAnalyse::get();

        $analyse = OperationAnalyse::find($id);
        $view = View::make('analyse.edit');

        $view->analyse = $analyse;  // objet envoyé
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $analyse = OperationAnalyse::find($id); //MODEL
        $analyse->date_analyse = $request->input('date_analyse');
        $analyse->description_analyse = $request->input('description_analyse');
        $analyse->resultat_analyse= $request->input('resultat_analyse');
        $analyse->save();
        return Redirect::to(route('analyse.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $analyse= OperationAnalyse::find($id);
        $analyse->delete();

        return Redirect::to(route('analyse.index'));
    }
}
