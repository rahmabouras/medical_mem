@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'rendezvous', 'title' => __('Créer Un Rendez-vous')])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{route('rendezvous.store')}}" class="form-horizontal">
              

                @csrf
 
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ __('Créer Un Rendez-vous') }}</h4>
                    </div>

                    <div class="card-body ">
                       <div class="row">
                         <div class="col-sm-12">
                                <label for="nomprenom">Nom et Prenom Du Patient </label>

                                <select class="form-control" name="patient_id">

                                    @foreach($patients as $patient)
                                        <option
                                            value={{$patient->id}}> {{$patient->nom_patient .' '. $patient->prenom_patient}} </option>
                                    @endforeach
                                </select>
                                <br>
                            </div>
                          </div>

                         <div class="row">
                            <div class="col-sm-6">
                                <label for="name"> Date </label>
                                <input type="date" value="{{old('date')}}" class="form-control"
                                       name="date"
                                       placeholder="date" required>
                            </div>

                       
                        
                       
                            <div class="col-sm-6">
                                <label for="name"> Heure </label>
                                <input type="time" value="{{old('heure')}}" class="form-control"
                                       name="heure"
                                       placeholder="heure"
                                       required> <br>

                            </div>
                        </div>
                         <div class="col-sm-12">
                                <label for="name"> Cause </label>
                                <input type="text" value="{{old('cause')}}" class="form-control"
                                       name="cause"
                                       placeholder="entrez la description"
                                       required>

                            </div>
                        <div align="right">
                        <button type="submit" class="btn btn-dark"> Enregistrer </button>
                    </div> </div>
                </div>
            </form>
        </div>
    </div>
@endsection