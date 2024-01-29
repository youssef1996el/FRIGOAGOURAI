@extends('Dashboard.index')

@section('contentDashboard')
<div class="container">
    <div class="row g-3">

        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person fs-3 me-3"></i>
                        <div>
                            <h5 class="card-title">
                                <i class="data-feather theme-item text-dark" data-feather="users" style="margin-right: 10px;font-size:20px"></i>
                                Clients
                            </h5>
                            <p class="card-text fs-4">{{$clients}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add more sections as needed -->
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-bar-chart fs-3 me-3"></i>
                        <div>
                            <h5 class="card-title">
                                <img src="{{asset('public/images/caisse_sortie.png')}}" alt="" width="25px" height="25px" style="margin-left:-8px;">
                                sorite de caisses vides
                            </h5>
                            <p class="card-text fs-4">{{$CaisseVide}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Another Section -->
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-gear fs-3 me-3"></i>
                        <div>
                            <h5 class="card-title">
                                <img src="{{asset('public/images/courier.png')}}" alt="" width="25px" height="25px" style="margin-left:-8px;transform: scaleX(-1)">
                                 Entrée de marchandises
                            </h5>
                            <p class="card-text fs-4">{{$MarchandiseEntre}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- Another Section -->
         <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-gear fs-3 me-3"></i>
                        <div>
                            <h5 class="card-title">
                                <img src="{{asset('public/images/courier.png')}}" alt="" width="25px" height="25px" style="margin-left:-8px;">
                                 Sorite de marchandises</h5>
                            <p class="card-text fs-4">{{$MarchandiseSortie}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Another Section -->
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-gear fs-3 me-3"></i>
                        <div>
                            <h5 class="card-title">
                                <img src="{{asset('public/images/caisse.png')}}" alt="" width="25px" height="25px" style="margin-left:-8px;">
                                Retour de caisses vides</h5>
                            <p class="card-text fs-4">{{$MarchandiseSortie}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="card">
                    <div class="bg-light text-primary fs-3 p-3">Restant caisses vides chez clients </div>
                    <div class="card-body">
                        <div id="chartdiv"></div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<script>
    $.ajax({
    type: "get",
    url: "{{url('GetDataReste')}}",
    dataType: "json",
    success: function (response) {
        if (response.status == 200) {
            am5.ready(function () {
                var root = am5.Root.new("chartdiv");
                root.setThemes([
                    am5themes_Animated.new(root)
                ]);

                var chart = root.container.children.push(am5xy.XYChart.new(root, {
                    panX: false,
                    panY: false,
                    wheelX: "panX",
                    wheelY: "zoomX",
                    paddingLeft: 0,
                    layout: root.verticalLayout
                }));

                var colors = chart.get("colors");
                var data = [];

                $.each(response.data, function (index, value) {
                    data.push({
                        country: value.client,
                        visits: parseFloat(value.rest), // Convert to a number if needed
                        icon: "https://www.amcharts.com/wp-content/uploads/flags/united-states.svg",
                        columnSettings: { fill: colors.next() }
                    });
                });

                var xRenderer = am5xy.AxisRendererX.new(root, {
                    minGridDistance: 30,
                    minorGridEnabled: true
                });

                var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                    categoryField: "country",
                    renderer: xRenderer,
                    bullet: function (root, axis, dataItem) {
                        return am5xy.AxisBullet.new(root, {
                            location: 0.5,
                            sprite: am5.Picture.new(root, {
                                width: 24,
                                height: 24,
                                centerY: am5.p50,
                                centerX: am5.p50,
                                src: dataItem.dataContext.icon
                            })
                        });
                    }
                }));

                xRenderer.grid.template.setAll({
                    location: 1
                });

                xRenderer.labels.template.setAll({
                    paddingTop: 20
                });

                xAxis.data.setAll(data);

                var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                    renderer: am5xy.AxisRendererY.new(root, {
                        strokeOpacity: 0.1
                    })
                }));

                var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "visits",
                    categoryXField: "country"
                }));

                series.columns.template.setAll({
                    tooltipText: "{categoryX}: {valueY}",
                    tooltipY: 0,
                    strokeOpacity: 0,
                    templateField: "columnSettings"
                });

                series.data.setAll(data);
                series.appear();
                chart.appear(1000, 100);
            });
        } else {
            console.error("Error in Ajax response. Status: " + response.status);
        }
    },
    error: function (error) {
        console.error("Ajax Request Failed:", error);
    }
});



    </script>
    <script>
        $(document).ready(function () {
            var currentPath = window.location.pathname;
        var pathSegments = currentPath.split('/');
        var lastSegment = pathSegments[pathSegments.length - 1];
        if(lastSegment === "Dashboard")
        {
            $('.list-unstyled li:has(span:contains("page d\'accueil"))').css({
                'background-color': 'rgb(159 226 212)',
                'box-shadow' :'5px 5px 10px #888888',
                'border-top-right-radius': '10px',
                'border-bottom-right-radius': '10px'
            }).find('i[data-feather="users"]').addClass('text-white');
        }
        });
    </script>
<style>
    #chartdiv {
      width: 100%;
      height: 500px;
    }
    </style>
@endsection
