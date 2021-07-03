@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'ordonnance', 'title' => __('Modifier une ordonnance')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('ordonnance.update',$ordonnance->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Modifier une ordonnance') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name"> Médicament </label>
                                      <!--  <input type="text" value="{{$ordonnance->medicament}}" class="form-control"
                                               name="medicament"
                                               placeholder="" required>-->
                                        <textarea  rows="4" cols="25"  class="form-control" name="medicament">{{$ordonnance->medicament}}</textarea>

                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name"> Nombre de fois </label>
                                         <textarea  rows="4" cols="25"  class="form-control" name="nombre_de_fois">{{$ordonnance->nombre_de_fois}}</textarea>

                                    <!--  <input type="text" value="{{$ordonnance->nombre_de_fois}}" class="form-control"
                                               name="nombre_de_fois"
                                               placeholder=""
                                               required> -->

                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name">Remarque </label>
                                      <!--  <input type="text" value="{{$ordonnance->remarque}}" class="form-control"
                                               name="remarque"
                                               placeholder=""
                                               required>-->
                                        <textarea  rows="4" cols="25" value="{{$ordonnance->remarque}}" class="form-control" name="remarque" required>{{$ordonnance->remarque}}</textarea>


                                    </div>
                                </div>
                                <br>


                            </div>



                            <div align="right">
                                <button type="submit" class="btn btn-dark"> Modifier l'ordonnance</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
