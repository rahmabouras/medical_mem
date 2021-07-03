@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'rendezvous', 'title' => __('Modifier Le Rendez-vous')])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{route('rendezvous.update',$rdvs->id)}}" class="form-horizontal">
                @method('PUT')

                @csrf

                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ __('Modifier Le Rendez-vous') }}</h4>
                    </div>
                    <div class="card-body ">
                         <div class="row">
                            <div class="col-sm-6">
                                <label for="name"> Date </label>
                                <input type="date" value="{{$rdvs->date}}" class="form-control"
                                       name="date"
                                       placeholder="date" required>
                            </div>
                       
                        
                       
                            <div class="col-sm-6">
                                <label for="name"> Heure </label>
                                <input type="time" value="{{$rdvs->heure}}" class="form-control"
                                       name="heure"
                                       placeholder=""
                                       required> <br>

                            </div>
                        </div>
                         <div class="col-sm-12">
                                <label for="name"> Cause </label>
                                <input type="text" value="{{$rdvs->cause}}" class="form-control"
                                       name="cause"
                                       placeholder="ion"
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