@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'diagnostic', 'title' => __(' ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('diagnostic.update',$diag->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Modification du diagnostique') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="name"> Date Diagnostic </label>
                                        <input type="date" value="{{$diag->date_diagnostic}}" class="form-control"
                                               name="date_diag"
                                               placeholder="" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name"> Resultat </label>
                                        <input type="text" value="{{$diag->resultat_diagnostic}}" class="form-control"
                                               name="resultat_diag"
                                               placeholder=""
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
