@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'users', 'title' => __('Material Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Users</h4>
                            <p class="card-category"> Here you can manage users</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="#" class="btn btn-sm btn-primary">Add user</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            id
                                        </th>
                                        <th>
                                            nom patient
                                        </th>
                                        <th>
                                            prenom patient
                                        </th>
                                         <th>
                                            adress patient
                                        </th>
                                         <th>
                                            age patient
                                        </th>
                                        <th>
                                            cin
                                        </th>
                                        <th>
                                            email
                                        </th>
                                        <th>
                                            sexe
                                        </th>
                                        <th>
                                            numtel_patient
                                        </th>
                                         <th>
                                          situation assurance   
                                        </th>
                                         <th>
                                            numtel_patient
                                        </th>
                                          <th>situation assurance  </th> 
                                         <th>description generale </th>



                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            Admin Admin
                                        </td>
                                        <td>
                                            admin@material.com
                                        </td>
                                        <td>
                                            2020-02-24
                                        </td>
                                        <td class="td-actions text-right">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="#"
                                               data-original-title="" title="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script>
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
