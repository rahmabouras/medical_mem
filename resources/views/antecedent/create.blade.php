@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'users', 'title' => __(' ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('antecedent.store')}}" class="form-horizontal">
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Ajouter un antecedent') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name"> type antecedent </label>
                                        <input type="textarea" value="{{old('typeantec')}}" class="form-control"
                                               name="typeantec"
                                               placeholder="Type" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name"> Description </label>
                                        <input type="textarea" value="{{old('description')}}" class="form-control"
                                               name="description"
                                               placeholder="description"
                                               required>

                                    </div>
                                </div>
                                <br>


                                <select class="form-control" name="nomprenom">

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
