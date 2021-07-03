<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\consultation;
use App\DossierPatient;


use View;
use Redirect;
use DB;


class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consul = consultation::where('status', 0)->paginate(8);

        ///dd($consul);
        $view = View::make('consultation.index'); //liaison controller lil blade
        $view->consul = $consul;
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

        $consul = consultation::get();
        $view = view::make('consultation.create');
        $view->pats = $pats;
        $view->consul = $consul;
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
                'date' => 'required|date',
                'description' => 'required|string',


            ]);

        $ficheconsul = consultation::where('patient_id', intval($request['nomprenom']))->first();//un seul element de consultation
        //dd($ficheconsul);
        if (is_null($ficheconsul) or $ficheconsul->status == '1') {
            $consultation = new consultation; //MODEL
            $consultation->date_de_creation = $request->input('date');
            $consultation->description_cas = $request->input('description');
            $consultation->patient_id = $request->input('nomprenom');
            $consultation->status = 0;
            $consultation->save();
            return redirect()->route('consultation.index');
        } else {

            return redirect()->route('consultation.index')->with('warning', "Le patient a deja une fiche");
        }
        
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $consultation = consultation::find($id);
        $view = view::make('consultation.show');
        $view->consultation = $consultation;
        //dd($consultation);
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pats = DossierPatient::get();

        $consultation = consultation::find($id);
        $view = View::make('consultation.edit');
        $view->pats = $pats;

        $view->consultation = $consultation;  // objet envoyé
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
        $consultation = consultation::find($id); //MODEL
        $consultation->date_de_creation = $request->input('date');
        $consultation->description_cas = $request->input('description');
        $consultation->patient_id = $request->input('nomprenom');

        $consultation->save();
        return Redirect::to(route('consultation.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consul = consultation::find($id);


        $consul->status = 1;
        $consul->save();


        return Redirect::to(route('consultation.index'));

    }

    public function details()
    {
        $consul = consultation::where('status', 0)->paginate(8);

        ///dd($consul);
        $view = View::make('consultation.details'); //liaison controller lil blade
        $view->consul = $consul;
        return $view;
    }
}
