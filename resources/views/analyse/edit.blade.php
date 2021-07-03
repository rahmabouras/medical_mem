@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'users', 'title' => __('Modifier patient')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('analyse.update',$analyse->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Modifier Analyse') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name"> Date D'analyse</label>
                                        <input type="date" value="{{$analyse->date_analyse}}" class="form-control"
                                               name="date_analyse"
                                               placeholder="entrez un nom" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name"> Description Analyse </label>
                                        <input type="text" value="{{$analyse->description_analyse}}" class="form-control"
                                               name="description_analyse"
                                               placeholder="entrez un nom" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name"> Resultat D'analyse </label>
                                        <input type="text" value="{{$analyse->resultat_analyse}}" class="form-control"
                                               name="resultat_analyse"
                                               placeholder="entrez un prenom"
                                               required>

                                    </div>

                                </div>
                                <br>


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
