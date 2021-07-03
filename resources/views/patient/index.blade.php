@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'patient', 'title' => __('Patient')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">patient </h4>
                            <p class="card-category"> Voici la liste des patients </p>
                        </div>

                        <div class="col-md-4">
                            <form action="/search" method="get">

                                <label for="name"> Nom </label>
                                <input type="text" value="{{ old('nom') }}" class="form-control" name="nom"
                                       placeholder="">

                                <button type="submit" class="btn btn-primary"> search</button>
                            </form>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{route('patient.create')}}">
                                        <i class="material-icons">add</i>
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th> Nom</th>
                                        <th> Prénom</th>
                                        <th> Email</th>
                                        <th>Adresse</th>
                                        <th>Age</th>
                                        <th> Cin</th>
                                        <th> Sexe</th>
                                        <th> Téléphone</th>
                                        <th>Situation</th>
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($patient as $row )
                                        <tr>
                                            <td>{{$row->nom_patient}}</td>
                                            <td>{{$row->prenom_patient}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->adress_patient}}</td>
                                            <td>{{$row->age_patient}}</td>
                                            <td>{{$row->cin}}</td>
                                            <td>{{$row->sexe}}</td>
                                            <td>{{$row->numtel_patient}}</td>
                                            <td>{{$row->situation_assurance}}</td>
                                            <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                   href="{{route('patient.edit',$row->id)}}"
                                                   data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            <!-- <form action="{{route('patient.destroy',$row->id)}}" method="post">
                                          @method('DELETE')
                                            @csrf
                                                <button type="submit" class="btn btn-danger"> DELETE </button>
                                                  </form>-->
                                                <a data-type="delete" rel="tooltip" class="btn btn-success btn-link"
                                                   data-toggle="modal"
                                                   data-target='#exampleModal'
                                                   data-patientid="{{$row->id}}" /*envoyer l id
                                                data-original-title="" title="">
                                                <i class="material-icons">delete</i>
                                                <div class="ripple-container"></div>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$patient->Links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('composent.modal')
    <script>
        $(document).ready(function () {
            $('#exampleModal').on('show.bs.modal', function (event) {

                var button = $(event.relatedTarget);
                var id = button.data('patientid');
                //*********Modal Delete*********///////////
                $('#hed').attr({
                    class: "modal-header alert alert-danger"
                });
                var title_modal = 'Supprimer Patient';
                var form = $('<form>').attr({ /*baliser form on l ajoute des attributs */
                    action: '{{url('patient/destroy')}}' + '/' + id + '',
                    method: "get",
                    id: "roleForm",
                    name: "form"
                });
                var div_body = $('<div>').attr({
                    class: "modal-body"
                });
                var contenu = 'Êtes-vous sûr de vouloir supprimer'; /*le contenu dans le modal */
                div_body.append(contenu);
                var div_footer = $('<div>').attr({ /*footer du modal*/
                    class: "modal-footer"
                });
                var btns =
                    [
                        $('<input>').attr({
                            type: "submit",
                            class: "btn btn-outline-warning",
                            'data-dismiss': "modal",
                            style: "background: white",
                            value: 'Annuler'
                        }),
                        $('<input>').attr({
                            type: "submit",
                            class: "btn btn-outline-danger",
                            style: "background: white",
                            value: 'Supprimer'
                        })
                    ];
                div_footer.append(btns); /*on a jouté a div footer les bouton btns*/

                form.append(div_body).append(div_footer);
                var modal = $(this); /* this => examplemodal */
                modal.find('.modal-title').text(title_modal);
                modal.find('.modal-content-form').html('').append(form);
            });
        });
        // Facebook Pixel Code Don't Delete
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window,
            document, 'script', '//connect.facebook.net/en_US/fbevents.js');
        try {
            fbq('init', '111649226022273');
            fbq('track', "PageView");
        } catch (err) {
            console.log('Facebook Track Error:', err);
        }
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1"/>
    </noscript>

@endsection



























