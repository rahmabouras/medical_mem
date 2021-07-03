@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'rendezvous', 'title' => __(' ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title "> Rendez-vous </h4>
                            <p class="card-category"> Voici la liste des rendez-vous </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{route('rendezvous.create')}}">
                                        <i class="material-icons">add</i>
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>Nom et Prenom</th>
                                        <th>date</th>

                                       <th> heure</th>
                                        <th>cause</th>

                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($rdv as $row )

                                        <tr>
                                            <td>{{$row->listConsultation->DossierPatient->nom_patient .''
                                         . $row->listConsultation->DossierPatient->prenom_patient}}</td>
                                            <td>{{$row->date}}</td>
                                            <td>{{$row->heure}}</td>
                                             <td>{{$row->cause}}</td>
                                            <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                   href="{{route('rendezvous.edit',$row->id)}}"
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
                                                   data-consultationid="{{$row->id}}" /*envoyer l id
                                                   data-original-title="" title="">
                                                    <i class="material-icons">delete</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </td>


                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                                            {{$rdv->Links()}}

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
                    var id = button.data('consultationid');
                    //*********Modal Delete*********///////////
                    $('#hed').attr({
                        class: "modal-header alert alert-danger"
                    });
                    var title_modal = 'Supprimer le rendez-vous';
                    var form = $('<form>').attr({ /*baliser form on l ajoute des attributs */
                        action: '{{url('rendezvous/destroy')}}' + '/' + id + '',
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
                /* $('#exampleModal').on('show.bs.modal', function (e) {
                     var modalContent = '<div class="modal-header">' +
                         '<h5 class="modal-title">Modal title</h5>' +
                         '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                         '<span aria-hidden="true">&times;</span> </button>  </div> ' +
                         '<div class="modal-body">' +
                         '<p>Modal body text goes here.</p></div>' +
                         '<div class="modal-footer">' +
                         ' <button type="button" class="btn btn-primary">Save changes</button> ' +
                         '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> </div>';

                     $('.modal-content').append(modalContent) //ajouter du contenu de modalContent a modal-content

                     var modal = $(this);
                     modal.find('.modal-title').text('suppression');
                     modal.find('.modal-content').html('').append(modalContent);


                 });*/
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
