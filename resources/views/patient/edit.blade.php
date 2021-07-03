@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'users', 'title' => __('Modifier patient')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('patient.update',$patient->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Modifier patient') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name"> Nom </label>
                                        <input type="text" value="{{$patient->nom_patient}}" class="form-control"
                                               name="nom"
                                               placeholder="entrez un nom" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name"> Prenom </label>
                                        <input type="text" value="{{$patient->prenom_patient}}" class="form-control"
                                               name="prenom"
                                               placeholder="entrez un prenom"
                                               required>

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name"> Adresse </label>
                                        <input type="text" value="{{$patient->adress_patient}}" class="form-control"
                                               name="adress"
                                               placeholder="entrez l'adresse" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name"> Age  </label>
                                        <input type="text" value="{{$patient->age_patient}}" class="form-control"
                                               name="age"
                                               placeholder="entrez l'adresse"
                                               required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name"> Cin </label>
                                        <input type="text" value="{{$patient->cin}}" class="form-control" name="cin"
                                               placeholder="entrez l'adresse"
                                               required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name"> Email </label>
                                        <input type="text" value="{{$patient->email}}" class="form-control" name="email"
                                               placeholder="entrez l'adresse"
                                               required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="sexe">Sexe </label>
                                        <select class="form-control" name="sexe" required value="{{$patient->sexe}}">

                                            <option value="feminin">feminin</option>
                                            <option value="masculin">masculin</option>

                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name"> Numero Telephone </label>
                                        <input type="text" value="{{$patient->numtel_patient}}" class="form-control"
                                               name="numero" required
                                               placeholder="entrez l'adresse">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name"> Situation d'assurence </label>
                                        <input type="text" value="{{$patient->situation_assurance}}"
                                               class="form-control"
                                               name="situation" required
                                               placeholder="entrez la situation d'assurance">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name"> Description generale </label>
                                        <input type="text" value="{{$patient->description_generale}}"
                                               class="form-control"
                                               name="description" required
                                               placeholder="entrez la description generale">
                                    </div>
                                </div>
                                <div align="right">
                                <button type="submit" class="btn btn-dark"> Modifier le patient</button>
                              </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
