@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'certificat', 'title' => __(' ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('certificat.store')}}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Créer un certificat') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name"> Date </label>
                                        <input type="date" value="{{old('date')}}" class="form-control"
                                               name="date"
                                               placeholder="entrez une date" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name"> Description </label>
                                        <input type="textarea" value="{{old('description')}}" class="form-control"
                                               name="description"
                                               placeholder="Description"
                                               required>

                                    </div>
                                </div>
                                <br>

                                <label for="patient_id"> Nom et prénom </label>

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

