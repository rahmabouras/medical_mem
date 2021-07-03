<?php

namespace App\Http\Controllers;

use App\Diagnostic;
use App\DossierPatient;
use App\consultation;


use Illuminate\Http\Request;
use View;
use Redirect;
use DB;

class DiagnosticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diag = Diagnostic::paginate(5);
        $view = View::make('diagnostic.index'); //liaison controller lil blade
        $view->diag = $diag;
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pats = DossierPatient::get();
        $diag = Diagnostic::get();

        $view = view::make('diagnostic.create');
        $view->diag = $diag;

        $view->pats = $pats;

        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { $request->validate(
        [
            'date_diag' => 'required|date',
            'resultat_diag' => 'required|string',
            'patient_id'=>'required|integer',

        ]);
        $ficheconsul = consultation::where('patient_id', intval($request['patient_id']))->first();//un seul element de consultation
        //dd($ficheconsul);
        if (is_null($ficheconsul)) {
            return redirect()->route('diagnostic.create')->with('warning', "Ce patient n'a pas une fiche de consultation");
        }
        $diag = new Diagnostic(); //MODEL
        $diag->date_diagnostic = $request->input('date_diag');
        $diag->resultat_diagnostic = $request->input('resultat_diag');
        $diag->consultation_id = $ficheconsul->id;
        $diag->save();
        return Redirect::to(route('diagnostic.index'));
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
        $diag = Diagnostic::get();

        $diag = Diagnostic::find($id);
        $view = View::make('diagnostic.edit');

        $view->diag = $diag;  // objet envoyé
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
        $diag = Diagnostic::find($id); //MODEL
        $diag->date_diagnostic = $request->input('date_diag');
        $diag->resultat_diagnostic = $request->input('resultat_diag');
        $diag->save();
        return Redirect::to(route('diagnostic.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diag = Diagnostic::find($id);
        $diag->delete();

        return Redirect::to(route('diagnostic.index'));
    }
}
