<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your PDF Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #tableDetail {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            font-size: 12px;
            height: 60vh;
        }

        .invoice-container {
            height: 480px;
            /* height: auto; */ /* Adjusted height */
            position: relative;
            border: 1px solid;
            border-bottom: dotted;
            padding: 20px;
            /* margin-bottom: 20px; */
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-title {
            text-transform: uppercase;
            text-align: center;
        }

        .invoice-footer {
            /* text-transform: uppercase;
            display: flex;
            flex-direction: column;
            align-items: flex-start;

            bottom: 30;
            left: 0;
            width: 100%;
            padding: 10px;
            background-color: white;
            box-sizing: border-box; */
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            text-align: left;
        }

        .invoice-footer span {
            margin: 5px 0;
        }

        @media (min-width: 600px) {
            .invoice-footer {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }

            .invoice-footer span {
                margin: 0;
            }
        }

        #tableDetail th,
        #tableDetail td {
            border: 1px solid;
            padding: 8px;
            text-align: left;
            font-size: 10px;
        }

        #tableDetail th {
            background-color: #f2f2f2;
            font-weight: bold;
            font-size: 11px;
            white-space: nowrap;
        }

        span {
            border: none;
            font-size: 12px;
            white-space: nowrap;
        }

        label {
            font-size: 12px;
        }



        h4 {
            display: inline;
        }

        span {
            text-transform: uppercase;
        }

        @page {
            size: A4;
            margin: 10mm;
        }
    </style>
</head>
<body>
    @for ($i=0;$i<2;$i++)
        <div class="invoice-container">
            <div style=":display: flex;padding-left:8px;">
                <h5>{{$infos[0]->name}}</h5>
                <label for="">Tél :</label><span>{{$infos[0]->telephone}}</span>
            </div>

            <div class="invoice-title">
                <p class="text-uppercase" style="background-color: #f2f2f2;padding:8px;">bon de sortie caisses vides n° : <span class="text-uppercase" style="font-size:16px;" >{{$getMaxNumberBon[0]->number}} /1</span></p>
            </div>

            <div style="background-color: #f2f2f2">
                <div style="padding: 8px">
                    <h4>Date :</h4> <span>@php echo date('d-m-Y') @endphp</span><br>
                    <h4>Nom du client :</h4><span>{{$Data[0]->client}}</span><br>
                    <h4>Bon délivré par :</h4><span>{{Auth::user()->name}}</span>
                </div>
            </div>

            <table id="tableDetail">
                <thead>
                    <tr>
                        <th>Nombre de Caisse</th>
                        <th style="text-align: center">Nom Livreur / Matricule</th>
                        <th>CIN</th>
                        <th>Signature</th>
                        <th>Cumul</th>
                        <th>Etranger</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @if ($count == 1)
                        @foreach ($Data as $item)
                            <tr>
                                <td>{{$item->nbbox}}</td>
                                <td style="text-align: center">{{$item->chauffeur." / ".$item->matricule}}</td>
                                <td>{{$item->cin}}</td>
                                <td>{{$item->siganture}}</td>
                                <td>{{$item->cumul}}</td>
                                <td>{{ $item->etranger}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    @endif --}}
                    {{-- @if ($count == 2)
                        @foreach ($Data as $item)
                            <tr>
                                <td>{{$item->nbbox}}</td>
                                <td style="text-align: center">{{$item->chauffeur." / ".$item->matricule}}</td>
                                <td>{{$item->cin}}</td>
                                <td>{{$item->siganture}}</td>
                                <td>{{$item->cumul}}</td>
                                <td>{{ $item->etranger}}</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    @endif --}}
                    {{-- @if ($count > 2)
                        @foreach ($Data as $item)
                            <tr>
                                <td>{{$item->nbbox}}</td>
                                <td style="text-align: center">{{$item->chauffeur." / ".$item->matricule}}</td>
                                <td>{{$item->cin}}</td>
                                <td>{{$item->siganture}}</td>
                                <td>{{$item->cumul}}</td>
                                <td>{{ $item->etranger}}</td>
                            </tr>
                        @endforeach
                    @endif
                --}}@foreach ($Data as $item)
                <tr>
                    <td>{{intval($item->nbbox)}}</td>
                    <td style="text-align: center">{{$item->chauffeur." / ".$item->matricule}}</td>
                    <td>{{$item->cin}}</td>
                    <td>{{$item->siganture}}</td>
                    <td>{{intval($item->cumul)}}</td>
                    <td>{{ $item->etranger}}</td>
                </tr>
                @endforeach

                </tbody>
            </table>

            <div style="margin:8px 0px">
                <label for="" style="font-size:20px">Visa Responsable Frigo</label><span>.....................................</span>
            </div>
            <footer class="invoice-footer">
                <span>SOCIETE : {{$infos[0]->societe}}</span>
                <span>SARL au Capital de : {{$infos[0]->capital}}</span>
                 <span>ICE N° : {{$infos[0]->ice}}</span>
                  <span>IF N° : {{$infos[0]->if}}</span>
                <span>C/B : {{$infos[0]->cb}}</span>




            </footer>
        </div>
    @endfor






</body>
</html>
