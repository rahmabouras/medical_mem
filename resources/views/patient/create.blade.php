@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'patient', 'title' => __('Ajouter patient')])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{route('patient.store')}}" class="form-horizontal">
                @csrf

                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ __('Ajouter patient') }}</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="name">Prenom </label>
                                <input type="text" value="{{ old('prenom') }}" class="form-control" name="prenom"
                                       placeholder="entrez un prenom" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="name"> Nom</label>
                                <input type="text" value="{{ old('nom') }}" class="form-control" name="nom"
                                       placeholder="entrez un nom"
                                       required>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="name"> Adresse </label>
                                <input type="text" value="{{ old('adress') }}" class="form-control" name="adress"
                                       placeholder="entrez l'adresse" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="name"> Age </label>
                                <input type="text" value="{{ old('age') }}" class="form-control" name="age"
                                       placeholder="entrez l'adresse"
                                       required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="name"> Cin</label>
                                <input type="text" value="{{ old('cin') }}" class="form-control" name="cin"
                                       placeholder="entrez l'adresse"
                                       required>
                            </div>
                            <div class="col-sm-6">
                                <label for="name"> Email  </label>
                                <input type="text" value="{{ old('email') }}" class="form-control" name="email"
                                       placeholder="entrez l'adresse"
                                       required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="sexe">Sexe </label>
                                <select class="form-control" name="sexe" required value="{{ old('sexe') }}">

                                    <option value="feminin">Feminin</option>
                                    <option value="masculin">Masculin</option>

                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="name"> Numero </label>
                                <input type="text" value="{{ old('numero') }}" class="form-control"
                                       name="numero" required
                                       placeholder="entrez numero">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="name"> Situation d'assurence </label>
                                <input type="text" value="{{ old('situation') }}" class="form-control"
                                       name="situation" required
                                       placeholder="entrez la situation d'assurance">
                            </div>
                            <div class="col-sm-6">
                                <label for="name"> Description generale </label>
                                <input type="text" value="{{ old('description') }}" class="form-control"
                                       name="description" required
                                       placeholder="entrez la description generale">
                            </div>
                        </div>
                    <div align="right">
                      <button type="submit" class="btn btn-dark" > Ajouter</button>
                    </div> </div>
            </form>
        </div>
    </div>
   
    

@endsection
