<?php

namespace App\Http\Controllers;

use App\consultation;
use App\DossierPatient;
use App\Rendez_vous;
use Illuminate\Http\Request;
use Redirect;
use View;


class RendezvousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      $rdv = Rendez_vous::where('status',0)->paginate(8);

        $view = View::make('rendezvous.index');
        $view->rdv = $rdv;
        return $view;
    }

    public function indexAjax()
    {
        $data = Rendez_vous::with('listConsultation')->get();
        $array = [];
        for ($i = 0; $i < count($data); $i++) {
            $date = $data[$i]->date;
            $time = $data[$i]->heure;
            $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
            $object = (object)[
                'title' => $data[$i]->listConsultation->DossierPatient->nom_patient . ' '
                    . $data[$i]->listConsultation->DossierPatient->prenom_patient,
                'start' => $combinedDT,
                'end' => date('Y-m-d H:i:s', strtotime("$combinedDT +30 minute")),
                'color' => $data[$i]->status === 1 ? 'orange' : 'cyan'
            ];
            array_push($array, $object);
        }
        return response()->json($array);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $patients = DossierPatient::get();
        $view = View::make('rendezvous.create');
        $view->patients = $patients;
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
                'date' => 'required|date|date_format:Y-m-d',
                'heure' => 'required|date_format:H:i',
                'patient_id' => 'required|integer',

            ]);
        //dd($request['patient_id']);
        $ficheconsul = consultation::where('patient_id', intval($request['patient_id']))->first();//un seul element de consultation
        //dd($ficheconsul);
        if (is_null($ficheconsul)) {
            return redirect()->route('rendezvous.create')->with('warning', "Ce patient n'a pas une fiche de consultation");
        }
        $rdv = new Rendez_vous;

        $rdv->date = $request->input('date');
        $rdv->heure = $request->input('heure');
        $rdv->cause = $request->input('cause');
        $rdv->consultation_id = $ficheconsul->id;
        $rdv->status =0;

        $rdv->save();
        return Redirect::to(route('rendezvous.index'));
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


        $rdvs = Rendez_vous::find($id);
        $view = view::make('rendezvous.edit');
        $view->rdvs = $rdvs;
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

        $rdvs = Rendez_vous::find($id);
        $rdvs->date = $request->input('date');
        $rdvs->heure = $request->input('heure');
        $rdvs->cause = $request->input('cause');
        $rdvs->save();
        return Redirect::to(route('rendezvous.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rdvs = Rendez_vous::find($id);
        $rdvs->status=1;
        $rdvs->save();

        return Redirect::to(route('rendezvous.index'));



    }
}
