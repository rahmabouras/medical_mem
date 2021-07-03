<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\DossierPatient;

// lien model
use View;
use Redirect;
use Illuminate\Http\Request;
use DB;

class DossiermedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$patient = DossierPatient::OrderBy('created_at', 'asc')->get();
      $patient = DossierPatient::where('status',0)->paginate(8);
        $view = View::make('patient.index'); //liaison controller lil blade
        $view->patient = $patient;
        return $view;

    }

    public function search(Request $request)
    {

        $search=$request->input('nom');
        $patient=DB::table('dossier_patient')->where('nom_patient' , 'like' ,'%'.$search.'%')->paginate(6);
        return view('patient.index', ['patient'=>$patient]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pat = DossierPatient::get();
        $view = view::make('patient.create');
        $view->pat = $pat;
        return $view;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'adress' => 'required|string',
                'age' => 'required|integer',
                'cin' => 'required|integer',
                'sexe' => 'required|string',
                'situation' => 'required|string',
                'description' => 'required|string',
                'numero' => 'required|integer',
                'email' => 'required|email|unique:dossier_patient',
            ]);
        if (strlen($request->input('cin'))!==8) {
            return redirect()->route('patient.create')->with('warning', "Le cin doit etre composé de 8 chiffres");
        }
        if (strlen($request->input('numero'))!==8) {
            return redirect()->route('patient.create')->with('warning', "Le numero de téléphone doit etre composé de 8 chiffres");
        }
        $patient = new DossierPatient; //MODEL
        $patient->nom_patient = $request->input('nom');
        $patient->prenom_patient = $request->input('prenom');
        $patient->adress_patient = $request->input('adress');
        $patient->age_patient = $request->input('age');
        $patient->cin = $request->input('cin');
        $patient->email = $request->input('email');
        $patient->sexe = $request->input('sexe');
        $patient->numtel_patient = $request->input('numero');
        $patient->situation_assurance = $request->input('situation');
        $patient->status =0;
        $patient->description_generale = $request->input('description');
        $patient->save();
        return Redirect::to(route('patient.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = DossierPatient::find($id);
        $view = View::make('patient.edit');
        $view->patient = $patient;  // objet envoyé
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate(
            [
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'adress' => 'required|string',
                'age' => 'required|integer',
                'cin' => 'required|integer',
                'sexe' => 'required|string',
                'situation' => 'required|string',
                'description' => 'required|string',
                'numero' => 'required|integer',
                'email' => 'required|email|unique:dossier_patient',
            ]);
        if (strlen($request->input('cin'))!==8) {
            return redirect()->route('patient.create')->with('warning', "Le cin doit etre composé de 8 chiffres");
        }
        if (strlen($request->input('numero'))!==8) {
            return redirect()->route('patient.create')->with('warning', "Le numero de téléphone doit etre composé de 8 chiffres");
        }
        
        $patient = DossierPatient::find($id); //MODEL
        $patient->nom_patient = $request->input('nom');
        $patient->prenom_patient = $request->input('prenom');
        $patient->adress_patient = $request->input('adress');
        $patient->age_patient = $request->input('age');
        $patient->cin = $request->input('cin');
        $patient->email = $request->input('email');
        $patient->sexe = $request->input('sexe');
        $patient->numtel_patient = $request->input('numero');
        $patient->situation_assurance = $request->input('situation');
        $patient->description_generale = $request->input('description');
        $patient->save();
        return Redirect::to(route('patient.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $DossierPatient = DossierPatient::find($id);
        $DossierPatient->status=1;
        $DossierPatient->save();

        return Redirect::to(route('patient.index'));

    }
}
