@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'consultation', 'title' => __('Modifier une fiche de consultation')])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{route('consultation.update',$consultation->id)}}" class="form-horizontal">
                @method('PUT')

                @csrf

                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ __('Modifier une fiche') }}</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="nomprenom">Nom et Prenom Du Patient </label>
                                <select class="form-control" name="nomprenom" >
                                    <option value="{{$consultation->DossierPatient->id}}" selected>{{$consultation->DossierPatient->nom_patient.' '.$consultation->DossierPatient->prenom_patient}}</option>
                                    @foreach($pats as $pat)
                                        <option
                                            value="{{$pat->id}}"> {{$pat->nom_patient .' '. $pat->prenom_patient}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="name"> Date de Creation </label>
                                <input type="date" value="{{$consultation->date_de_creation}}" class="form-control"
                                       name="date"
                                       placeholder="date" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="name"> Description </label>
                                <input type="text" value="{{$consultation->description_cas}}" class="form-control"
                                       name="description"
                                       placeholder="entrez la description"
                                       required>

                            </div>
                        </div>
                        <div align="right">
                        <button type="submit" class="btn btn-dark"> Enregistrer </button>
                    </div> </div>
                </div>
            </form>
        </div>
    </div>
@endsection
