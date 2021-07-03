@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'users', 'title' => __('Modifier une ordonnance')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('ordonnance.store')}}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('créer ordonnance') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name"> Médicament </label>
                                        <textarea  rows="4" cols="25" value="{{old('medicament')}}" class="form-control" name="medicament"></textarea>
                                       <!-- <input type="text" value="{{old('medicament')}}" class="form-control"
                                               name="medicament"
                                               placeholder="" required>-->
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name"> Nombre de fois </label>
                                        <textarea  rows="4" cols="25" value="{{old('nombre_de_fois')}}" class="form-control" name="nombre_de_fois"></textarea>
                                       <!-- <input type="text" value="{{old('nombre_de_fois')}}" class="form-control"
                                               name="nombre_de_fois"
                                               placeholder=""
                                               required><br> <br> -->
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name">Remarque </label>
                                         <textarea  rows="4" cols="25" value="{{old('remarque')}}" class="form-control" name="remarque"></textarea>

                                     <!--   <input type="text" value="{{old('remarque')}}" class="form-control"
                                               name="remarque"
                                               placeholder=""
                                               required> -->

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
