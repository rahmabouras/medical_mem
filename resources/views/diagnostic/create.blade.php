@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'users', 'title' => __(' ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('diagnostic.store')}}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Création du diagnostique') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-6">

                                        <label for="name"> Date </label>
                                        <input type="date" value="{{old('date_diagnostic')}}" class="form-control"
                                               name="date_diag"
                                               placeholder="date" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name"> Description </label>
                                        <input type="textarea" value="{{old('resultat_diagnostic')}}" class="form-control"
                                               name="resultat_diag"
                                               placeholder="resultat diagnostic"
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
                                    <button type="submit" class="btn btn-dark">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>


@endsection
