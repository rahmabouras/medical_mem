<?php

namespace App\Http\Controllers;

use App\consultation;
use App\DossierPatient;
use App\Rendez_vous;
use Illuminate\Support\Facades\DB;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $patient = DossierPatient::count();
        $rdv = Rendez_vous::count();
        $view = View::make('dashboard');
        $view->rdv = $rdv;
        $view->patient = $patient;
        return $view;
    }

    public function getChartsPatient()
    {
        $count = DB::table('dossier_patient')->select(DB::raw('count(*) as peoples'),
            DB::raw('MONTH(created_at) month'))
            ->groupby('month')
            ->get();

        return response()->json($count);
    }

    public function getChartsOperation()
    {
        $count = DB::table('operationanalyse')->select(DB::raw('count(*) as peoples'),
            DB::raw('MONTH(date_analyse) month'))
            ->groupby('month')
            ->get();

        return response()->json($count);
    }
}
