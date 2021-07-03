@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'dashboard', 'title' => __('dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">fiches </h4>
                            <p class="card-category"> Voici les fiches de consultation </p>
                        </div>
                        <div class="card-body">
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>Nom et prenom</th>

                                        <th> date de creation</th>
                                        <th>description du cas</th>

                                        <th class="text-right">
                                            Details
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($consul as $row )


                                        <tr>
                                            <td> {{$row->DossierPatient->nom_patient.' '.$row->DossierPatient->prenom_patient}} </td>
                                            <td>{{$row->date_de_creation}}</td>
                                            <td>{{$row->description_cas}}</td>
                                            <td class="td-actions text-right">



                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                   href="{{route('consultation.show',$row->id)}}"
                                                   data-original-title="" title="">
                                                    <i class="material-icons">details</i>
                                                    <div class="ripple-container"></div>
                                                </a>


                                            </td>


                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$consul->Links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
