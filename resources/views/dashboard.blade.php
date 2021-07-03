@extends('layouts.app', ['activePage' => 'dashboard', 'title' => __('Accueil')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">content_copy</i>
                            </div>
                            <p class="card-category">Patients</p>
                            <h3 class="card-title">{{$patient}}
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">store</i>
                            </div>
                            <p class="card-category">Rendez-vous</p>
                            <h3 class="card-title">{{$rdv}}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="{{route('details')}}">
                        <button type="button" class="btn btn-primary">Details d'un patient</button>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-site-traffic">
                        <div id="spline" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>

<!---------------------- CHART ------------------------->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/locales-all.min.js'></script>
    <script src="{{ asset('js/locale-calendar.js') }}"></script>
    <script>
        $(document).ready(function () {
            var resultChartsPatient = '';
            $.ajax({
                url: "{{url('getChartsPatient')}}",
                type: 'get',
                async: false,
                success: function (result) {
                    console.log(result)
                    resultChartsPatient = result;
                }
            });
            var resultChartsOperation = '';
            $.ajax({
                url: "{{url('getChartsOperation')}}",
                type: 'get',
                async: false,
                success: function (result) {
                    console.log(result)
                    resultChartsOperation = result;
                }
            });

            // Javascript method's body can be found in assets/js/demos.js
            var dataSetBilling = [];

            var chartPatient = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            var chartOperation = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

            var AllMonth = [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

            for (var k = 0; k < resultChartsPatient.length; k++) {
                chartPatient[resultChartsPatient[k]['month'] - 1] = resultChartsPatient[k]['peoples'];
            }
            for (var k = 0; k < resultChartsOperation.length; k++) {
                chartOperation[resultChartsOperation[k]['month'] - 1] = resultChartsOperation[k]['peoples'];
            }

            Highcharts.chart('spline', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Nombre Patient {{\Carbon\Carbon::now()->format('Y')}}'
                },

                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    labels: {
                        formatter: function () {
                            return this.value + '°';
                        }
                    }
                },
                tooltip: {
                    crosshairs: true,
                    shared: true
                },
                plotOptions: {
                    spline: {
                        marker: {
                            radius: 4,
                            lineColor: '#666666',
                            lineWidth: 1
                        }
                    }
                },
                series: [{
                    name: 'Patient',
                    marker: {
                        symbol: 'square'
                    },
                    data: chartPatient,
                },{
                    name: 'Operation',
                    marker: {
                        symbol: 'square'
                    },
                    data: chartOperation,

                }]
            });

            /*----------------------------calendrier----------------------------------*/
            var SITEURL = "{{url('/')}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var initialLocaleCode = 'fr';
            $('#calendar').fullCalendar({ /*we are working with full calender*/
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listMonth'
                },
                navLinks: true,
                editable: true,
                weekends: true,
                timeZone: "Africa/Tunis",
                eventLimit: true,
                locale: initialLocaleCode,
                events: SITEURL + "/getAllRdv",
                displayEventTime: true,
                eventRender: function (eventObj, $el)/*le petit carré bech yraja3 response*/ {
                    $el.popover({
                        title: eventObj.title,
                        content: `début : ${formattedDate(eventObj.start._d)} / fin: ${formattedDate(eventObj.end._d)}`,
                        trigger: 'hover',
                        placement: 'top',
                        container: 'body'
                    });
                },
                selectable: false,
                showNonCurrentDates: false,
                weekNumbers: false,
                fixedWeekCount: false,
                selectHelper: false,
            });
        })
        ;

        function formattedDate(d = new Date) {
            let month = String(d.getMonth() + 1);
            let day = String(d.getDate());
            const year = String(d.getFullYear());
            const hours = String(d.getHours());
            const minutes = String(d.getMinutes());

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return `${hours}:${minutes}`;
        }
    </script>
@endsection

