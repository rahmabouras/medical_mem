@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'analyse', 'title' => __('Ajouter Analyse')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('analyse.store')}}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Création d analyse') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name"> Date D'analyse</label>
                                        <input type="date" value="{{old('date_analyse')}}" class="form-control"
                                               name="date_analyse"
                                               placeholder="entrez une date" required>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name"> Description Analyse </label>
                                        <input type="text" value="{{old('description_analyse')}}" class="form-control"
                                               name="description_analyse"
                                               placeholder="" required>

                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name"> Resultat D'analyse </label>
                                        <input type="text" value="{{old('resultat_analyse')}}" class="form-control"
                                               name="resultat_analyse"
                                               placeholder=""
                                               required>

                                    </div>
                                </div>
                                <br>


                                <select class="form-control" name="patient_id">

                                    @foreach($pats as $pat)
                                        <option
                                            value="{{$pat->id}}"> {{$pat->nom_patient .' '. $pat->prenom_patient}}</option>

                                    @endforeach

                                </select>

                                <div align="right">
                                    <button type="submit" class="btn btn-dark"> Enregistrer </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>
@endsection
