@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'consultation', 'title' => __('details')])

@section('content')
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title"></h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    <div class="table-responsive">

                        <h4 style="color:#BA55D3">Description Du cas</h4>

                        <h4>  {{$consultation->DossierPatient->description_generale}}</h4>
                        <br> <br>
                        <hr>
                        <h4 style="color:#BA55D3">Situation d'assurance</h4>
                        <h4>{{$consultation->DossierPatient->situation_assurance}}</h4>
                        <br> <br>
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th><h4 style="color:#BA55D3">Liste Des Diagnostiques</h4></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($consultation->listDiagnostic))
                                @foreach ($consultation->listDiagnostic as $dg )
                                    <tr>
                                        <td><h4>{{$dg->date_diagnostic}}</h4></td>
                                        <td><h4>{{$dg->resultat_diagnostic}}</h4></td>

                                    </tr>
                                @endforeach
                            @endif


                            </tbody>
                        </table>


                    </div>

                </div>
                <div class="col-sm-4">
                    <div class="card card-chart">
                        <div class="card-header card-header-success">
                            @if($consultation->DossierPatient->sexe=="masculin")
                                <img src="{{ URL::to('/assets/img/male.jpg') }}" alt="male" width="100%">
                            @endif
                            @if($consultation->DossierPatient->sexe=="feminin")
                                <img src="{{ URL::to('/assets/img/female.jpg') }}" alt="female" width="100%">

                            @endif

                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{$consultation->DossierPatient->nom_patient.' '.$consultation->DossierPatient->prenom_patient}}</h4>
                            <p class="card-category">Age : {{$consultation->DossierPatient->age_patient}} Ans</p>
                            <p class="card-category">Adress : {{$consultation->DossierPatient->adress_patient}} </p>
                            <p class="card-category">Numero Cin : {{$consultation->DossierPatient->cin}} </p>
                            <p class="card-category">Telephone : {{$consultation->DossierPatient->numtel_patient}} </p>


                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>La liste des Rendez-vous</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($consultation->listRendezVous))
                                @foreach ($consultation->listRendezVous as $rdv )
                                    <tr>
                                        <td> {{$rdv->date}}</td>
                                        <td> {{$rdv->heure}}</td>
                                        <td> {{$rdv->cause}}</td>
                                    </tr>
                                @endforeach
                            @endif


                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                        <thead class=" text-primary">
                        <tr>
                            <th>La liste des Certificats obtenus</th>
                        </tr>
                        </thead>
                        <tr>
                        @if(count($consultation->certificat))
                            @foreach ($consultation->certificat as $crt )
                                <tr><td> {{$crt->date}}</td>
                                <td> {{$crt->description}}</td>
                        </tr>


                            @endforeach
                        @endif


                        </tbody>
                    </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>La liste des Analyses</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($consultation->listAnalyse))
                                @foreach ($consultation->listAnalyse as $analyse )
                                    <tr>
                                        <td> {{$analyse->date_analyse}}</td>
                                        <td> {{$analyse->description_analyse}}</td>
                                        <td> {{$analyse->resultat_analyse}}</td>
                                    </tr>
                                @endforeach
                            @endif


                            </tbody>
                        </table>
                    </div>


                </div>


            </div>
        </div>
    </div>
@endsection
