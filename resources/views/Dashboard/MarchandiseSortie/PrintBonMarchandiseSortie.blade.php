
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
           /*  height: auto; */
           height: 480px;
            position: relative;
            border: 1px solid;
            border-bottom: dotted;
            padding: 20px;
           /*  margin-bottom: 20px; */
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
        #tableDetail
        {
            border-bottom-color: #fff;
        }

        /* .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 80px;
            opacity: 0.1;
            pointer-events: none;
            text-transform: uppercase;
            white-space: nowrap;
            text-align: center;
        } */

        h4 {
            display: inline;
        }

        span {
            text-transform: uppercase;
        }
        @page {
            size: A4; /* Set the page size to A3 */
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
                <p class="text-uppercase" style="background-color: #f2f2f2;padding:8px;">bon de sortie Marchandise n° : <span class="text-uppercase" style="font-size:16px;" >{{$getMaxNumberBon[0]->number}} / 3</span></p>
            </div>

            <div style="background-color: #f2f2f2">
                <div style="padding: 8px">
                    <h4>Date :</h4> <span>@php echo date('d-m-Y') @endphp</span><br>
                    <h4>Nom du client :</h4><span>{{$Clients[0]->client}}</span><br>
                    <h4>Bon délivré par :</h4><span>{{Auth::user()->name}}</span>
                </div>
            </div>

            <table id="tableDetail">
                <thead>
                    <tr>
                        <th>NOMBRE DE CAISSE</th>
                        <th style="text-align: center">ORIGINE</th>
                        <th>Cumul</th>
                        <th>Etranger</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalCaisse =0;
                    @endphp
                    @foreach ($Data as $item)
                        @php
                            $totalCaisse += $item->qte;
                        @endphp
                        <tr>
                            <td>{{$item->qte}}</td>
                            <td>{{$item->produit}}</td>
                            <td>{{$item->cumul}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">{{ number_format($totalCaisse, 2, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>

            <table id="tableDetail">
                <thead>
                    <tr>
                        <th>NOM CHAUFFEUR / MATRICULE</th>
                        <th>C.I.N</th>
                        <th style="text-align: center">SIGNATURE</th>
                        <th>NATURE CAISSES</th>
                        <th>VISA FRIGO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$ChauffeurAndMatricule[0]->chauffeur." / ".$ChauffeurAndMatricule[0]->matricule}}</td>
                        <td>{{$ChauffeurAndMatricule[0]->cin}}</td>
                        <td></td>
                        <td></td>
                        <td style="width: 150px"></td>
                    </tr>
                </tbody>
            </table>
            <footer class="invoice-footer">
                <span>C/B : {{$infos[0]->cb}}</span>
                <span>IF N° : {{$infos[0]->if}}</span>
                <span>SARL au Capital de : {{$infos[0]->capital}}</span>
                <span>ICE N° : {{$infos[0]->ice}}</span>

            </footer>
            {{-- <div style="margin:8px 0px">
                <label for="" style="font-size:20px">Visa Responsable Frigo</label><span>.....................................</span>
            </div> --}}
        </div>
    @endfor




    {{-- <div class="watermark">BON MARCHANDISE <br> SORTIE</div> --}}

</body>
</html>
