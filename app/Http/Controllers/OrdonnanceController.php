<?php

namespace App\Http\Controllers;

use App\Ordonnance;
use App\DossierPatient;
use App\consultation;

use Illuminate\Http\Request;
use View;
use Redirect;
use DB;
class OrdonnanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordonnance =Ordonnance::paginate(8);
        $view = View::make('ordonnance.index'); //liaison controller lil blade
        $view->ordonnance = $ordonnance;
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordonnance = Ordonnance::get();

        $pats = DossierPatient::get();

        $view = view::make('ordonnance.create');
        $view->ordonnance = $ordonnance;
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
    {
        $request->validate(
            [
                'medicament' => 'required|string',
                'nombre_de_fois'=> 'required|string',
                'remarque' => 'required|string',

            ]);

        $ficheconsul =  consultation::where('patient_id', intval($request['patient_id']))->first();//un seul element de consultation
        //dd($ficheconsul);
        if (is_null($ficheconsul)) {
            return redirect()->route('ordonnance.create')->with('warning', "Ce patient n'a pas une fiche de consultation");
        }
        $ordonnance = new Ordonnance(); //MODEL
        $ordonnance->medicament = $request->input('medicament');
        $ordonnance->nombre_de_fois = $request->input('nombre_de_fois');
        $ordonnance->remarque= $request->input('remarque');
        $ordonnance->consultation_id= $ficheconsul->id;
        $ordonnance->save();
        return Redirect::to(route('ordonnance.index'));
    }

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
        $ordonnance = Ordonnance::get();

        $ordonnance= Ordonnance::find($id);
        $view = View::make('ordonnance.edit');

        $view->ordonnance = $ordonnance;  // objet envoyé
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
        $ordonnance = Ordonnance::find($id); //MODEL
        $ordonnance->medicament = $request->input('medicament');
        $ordonnance->nombre_de_fois = $request->input('nombre_de_fois');
        $ordonnance->remarque= $request->input('remarque');
        $ordonnance->save();
        return Redirect::to(route('ordonnance.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ordonnance= Ordonnance::find($id);

        $ordonnance->delete();

        return Redirect::to(route('ordonnance.index'));    }
}
