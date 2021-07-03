<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Antecedent;
use App\DossierPatient;

use View;
use Redirect;
use DB;

class AntecedentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $antec = Antecedent::paginate(5);
        $view = View::make('antecedent.index'); //liaison controller lil blade
        $view->antec = $antec;
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
        $antec=Antecedent::get();

        $view = view::make('antecedent.create');
        $view->antec=$antec;
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
                'typeantec' => 'required|string',
                'description' => 'required|string',


            ]);


        $antec = new Antecedent(); //MODEL
        $antec->type_antecedent = $request->input('typeantec');
        $antec->description_antecedent = $request->input('description');
        $antec->patient_id= $request->input('nomprenom');
        $antec->save();
        return Redirect::to(route('antecedent.index'));
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
    { $pats=DossierPatient::get();
        $antec = Antecedent::get();

        $antec = Antecedent::find($id);
        $view = View::make('antecedent.edit');
        $view->antec = $antec;
        $view->pats=$pats;

   // objet envoyé
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
        $request->validate(
            [
                'typeantec' => 'required|string',
                'description' => 'required|string',


            ]);
        $antec=antecedent::find($id); //MODEL
        $antec->type_antecedent = $request->input('typeantec');
        $antec->description_antecedent = $request->input('description');
        $antec->patient_id= $request->input('nomprenom');

        $antec->save();
        return Redirect::to(route('antecedent.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $antec = Antecedent::find($id);
        $antec->delete();

        return Redirect::to(route('antecedent.index'));
    }
}
