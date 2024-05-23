@extends('Dashboard.index')
@section('contentDashboard')
<section>
    <h3 class="bg-light p-2 rounded-2 border">Table Sortie de  Marchandises</h3>
    <form action="{{url('SortieMarchByCompagnie')}}" method="get">
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
    {{-- table Marchandise sortie --}}
    <div style="overflow-x: auto">

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th rowspan="2">Date</th>
                    @foreach ($clientsMarchSortie as $client)
                        <th >{{ $client }}</th>
                    @endforeach
                    <th rowspan="2">Total</th>
                </tr>
                <tr>
                    @foreach ($clientsMarchSortie as $client)
                        <th>nombre</th>
                        {{-- <th>Cumul</th> --}}
                    @endforeach
                    {{-- <th>nombre</th>
                    <th>Cumul</th> --}}
                </tr>
            </thead>
            <tbody>

                @foreach ($dataMarchSortie as $date => $clientsData)

                    <tr>
                        <td style="white-space: nowrap">{{ $date }}</td>
                        @foreach ($clientsMarchSortie as $client)

                            <td>{{intval($clientsData[$client]['nombre'])  }}</td>
                            {{-- <td>{{intval($clientsData[$client]['Cuml'])  }}</td> --}}

                        @endforeach
                        <td>{{intval($totalsMarchSortie[$date]['totalNombre'])  }}</td>
                        {{-- <td>{{ $totalsMarchSortie[$date]['totalCuml'] }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
            <tfoot >
                <tr >
                    <td>Totaux</td>
                    @foreach ($clientsMarchSortie as $client)
                        <?php
                        $sumNombre = 0;
                        $sumCuml = 0;
                        foreach ($dataMarchSortie as $date => $clientsData) {
                            $sumNombre += $clientsData[$client]['nombre'];
                            $sumCuml += $clientsData[$client]['Cuml'];
                        }
                        ?>
                        <td >{{ $sumNombre }}</td>
                        {{-- <td >{{ $sumCuml }}</td> --}}
                    @endforeach
                    <td >{{ $totalsMarchSortie['grandTotalNombre'] }}</td>
                    {{-- <td >{{ $totalsMarchSortie['grandTotalCuml'] }}</td> --}}
                </tr>
            </tfoot>

        </table>
    </div>

    {{-- <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th rowspan="2">Date</th>
                @foreach ($clientsSortie as $client)
                    <th colspan="2">{{ $client }}</th>
                @endforeach
            </tr>
            <tr>
                @foreach ($clientsSortie as $client)
                    <th>nombre</th>
                    <th>Cuml</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($dataSortie as $date => $clientsData)
                <tr>
                    <td>{{ $date }}</td>
                    @foreach ($clientsSortie as $client)
                        <td>{{ $clientsData[$client]['nombre'] }}</td>
                        <td>0</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td>totaux</td>
                @foreach ($clientsSortie as $client)
                    <td colspan="2">{{ $totalsSortie[$client] }}</td>
                @endforeach
            </tr>
        </tfoot>
    </table> --}}
</section>
<style>
    .listStockage .three-menu-item {
        color: rgb(0, 202, 91);
        font-size: 19px;
        font-weight: bold;
    }
    @media print
    {
            .btn-secondary{
                display: none;
            }


        }
        #bodywrapper
        {
            overflow-x: auto;
        }
</style>
<script>
    $(document).ready(function () {
        var currentPath = window.location.pathname;
        var pathSegments = currentPath.split('/');
        var lastSegment = pathSegments[pathSegments.length - 1];
        if(lastSegment === "SortieMarchandise")
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
