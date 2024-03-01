@extends('Dashboard.index')
@section('contentDashboard')
    <section>
        <h3 class="bg-light p-2 rounded-2 border">Table Retour de  Marchandises</h3>
        {{-- table caisse retour --}}
         <form action="{{url('RetourByCompagnie')}}" method="get">
            <div class="row  mb-3">

                    <div class="col-sm-12 col-md-6 col-xl-6 ">
                        <label for="">Compagnie</label>
                        <select name="compagnie" id="" class="form-select">
                            @foreach ($Compagnie as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6 ">
                        <button class="btn btn-secondary mr-3 float-end mt-4" type="submit">Recherche</button>
                    </div>
            </div>
         </form>
         <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th rowspan="2">Date</th>
                    @foreach ($clientsCaisseRetour as $client)
                        <th >{{ $client }}</th>
                    @endforeach
                    <th rowspan="2">Total</th>
                </tr>
                <tr>
                    @foreach ($clientsCaisseRetour as $client)
                        <th>nombre</th>
                        {{-- <th>Cumul</th> --}}
                    @endforeach
                    {{-- <th>nombre</th>
                    <th>Cumul</th> --}}
                </tr>
            </thead>
            <tbody>

                @foreach ($dataCaisseRetour as $date => $clientsData)

                    <tr>
                        <td style="white-space: nowrap">{{ $date }}</td>
                        @foreach ($clientsCaisseRetour as $client)

                            <td>{{intval($clientsData[$client]['nombre'])  }}</td>
                           {{-- <td>{{intval($clientsData[$client]['Cuml'])  }}</td>--}}

                        @endforeach
                        <td>{{intval($sumByDate[$date])  }}</td>
                        {{--<td>{{intval($totalsCaisseRetour[$date]['totalNombre'])  }}</td>--}}
                        {{-- <td>{{ $totalsCaisseRetour[$date]['totalCuml'] }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
            <tfoot >
                <tr >
                    <td>Totaux</td>
                    @foreach ($clientsCaisseRetour as $client)
                        <?php
                        $sumNombre = 0;
                        $sumCuml = 0;
                        foreach ($dataCaisseRetour as $date => $clientsData) {
                            $sumNombre += $clientsData[$client]['nombre'];
                            $sumCuml += $clientsData[$client]['Cuml'];
                        }
                        ?>
                        <td >{{ $sumNombre }}</td>
                        {{-- <td >{{ $sumCuml }}</td> --}}
                    @endforeach
                     <td >{{ $totalSum }}</td>
                    {{--<td >{{ $totalsCaisseRetour['grandTotalNombre'] }}</td> --}}
                    {{-- <td >{{ $totalsCaisseRetour['grandTotalCuml'] }}</td> --}}
                </tr>
            </tfoot>

        </table>


    </section>

    <style>
        .listStockage .foor-menu-item {
            color: rgb(0, 202, 91);
            font-size: 19px;
            font-weight: bold;
        }
        @media print {
            .btn-secondary {
                display: none;
            }


        }
    </style>

    <script>
        $(document).ready(function () {
            var currentPath = window.location.pathname;
            var pathSegments = currentPath.split('/');
            var lastSegment = pathSegments[pathSegments.length - 1];
            if(lastSegment === "RetourdeMarchandise")
            {

                    $('.list-unstyled .listStockage > ul').css('display', 'block');

                    $('.list-unstyled li:has(span:contains("Situation de stockage"))').css({
                        'background-color': 'rgb(159 226 212)',
                        'box-shadow' :'5px 5px 10px #888888',
                        'border-top-right-radius': '10px',
                        'border-bottom-right-radius': '10px'
                    }).find('i[data-feather="users"]').addClass('text-white');


            }
        });
    </script>
@endsection
