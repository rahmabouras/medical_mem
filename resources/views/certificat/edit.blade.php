@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'users', 'title' => __(' ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('certificat.update',$certif->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Modifier Certificat') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name"> Date </label>
                                        <input type="date" value="{{$certif->date}}" class="form-control"
                                               name="date"
                                               placeholder="entrez un nom" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name"> Description </label>
                                        <input type="text" value="{{$certif->description}}" class="form-control"
                                               name="description"
                                               placeholder="Description"
                                               required>

                                    </div>
                                </div>
                                <br>


                            </div>



                            <div align="right">
                                <button type="submit" class="btn btn-dark"> Modifier</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
