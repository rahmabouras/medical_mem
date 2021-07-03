<?php

namespace App\Http\Controllers;

use App\consultation;
use Illuminate\Http\Request;
use App\Certificat;
use App\DossierPatient;
use View;
use Redirect;
use DB;


class CertificatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certif = Certificat::paginate(8);
        $view = View::make('certificat.index'); //liaison controller lil blade
        $view->certif = $certif;
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function create()
    {
        $certif = certificat::get();

            $pats = DossierPatient::get();
            $consul=consultation::get();

            $view = view::make('certificat.create');
            $view->certif = $certif;
            $view->consul=$consul;
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
        {
            $request->validate(
                [
                    'date' => 'required|date',
                    'description' => 'required|string',
                     'patient_id'=>'required|integer',

                ]);
            $ficheconsul = consultation::where('patient_id', intval($request['patient_id']))->first();//un seul element de consultation
            //dd($ficheconsul);
            if (is_null($ficheconsul)) {
                return redirect()->route('certificat.create')->with('warning', "Ce patient n'a pas une fiche de consultation");
            }

            $certif = new certificat; //MODEL
            $certif->date = $request->input('date');
            $certif->description = $request->input('description');
            $certif->consultation_id=  $ficheconsul->id;
            $certif->save();
            return Redirect::to(route('certificat.index'));
        }

        /**
         * Display the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public
        function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public
        function edit($id)
        {
            $certif = certificat::get();

            $certif = certificat::find($id);
            $view = View::make('certificat.edit');

            $view->certif = $certif;  // objet envoyé
            return $view;
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public
        function update(Request $request, $id)

        {
            $request->validate(
                [
                    'date' => 'required|date',
                    'description' => 'required|string',
                    'patient_id'=>'required|integer',

                ]);
            $certif = certificat::find($id); //MODEL
            $certif->date = $request->input('date');
            $certif->description = $request->input('description');
            $certif->save();
            return Redirect::to(route('certificat.index'));
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public
        function destroy($id)
        {
            $certif = certificat::find($id);
            $certif->delete();

            return Redirect::to(route('certificat.index'));
        }
    }
