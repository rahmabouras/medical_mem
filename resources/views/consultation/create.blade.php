@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'consultation', 'title' => __('Ajouter une fiche de consultation')])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{route('consultation.store')}}" class="form-horizontal">
                @csrf

                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ __('Ajouter une fiche') }}</h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="name"> Date De Creation </label>
                                <input type="date" value="#" class="form-control" name="date"
                                       placeholder="date" required> <br>
                        </div>
                            <div class="col-sm-12">
                                <label for="nomprenom">Nom et Prenom Du Patient </label>

                                <select class="form-control" name="nomprenom">

                                    @foreach($pats as $pat)
                                        <option
                                            value="{{$pat->id}}"> {{$pat->nom_patient .' '. $pat->prenom_patient}}</option>
                                    @endforeach
                                </select>
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <br>
                            <div class="col-sm-12">
                                <label for="name"> Description </label>
                                <input type="text" class="form-control" name="description"
                                       placeholder="entrez la description"
                                       required> <br>
                            </div>
                        </div>
                        <div align="right">
                            <button type="submit" class="btn btn-dark"> Enregistrer la fiche</button> </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
