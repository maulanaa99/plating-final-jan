<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kanban Unracking</title>
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
</head>

<body>


    <body style="background-color: white;" onload="window.print()">
        <style>
            .line-title {
                border: 0;
                border-style: inset;
                border-top: 1px solid #000;
            }

            .text-center {
                text-align: center !important
            }
        </style>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">

                        {{-- --Main Content-- --}}
                        <table class="table table-lg" border="1" align="left" cellpadding="10px">
                            <thead>
                                <tr>
                                    <th colspan="4">PART NAME</th>

                                </tr>
                                <tr>
                                    <th colspan="4">PART NAME</th>
                                    {{-- <th colspan="4">{{ $unracking->part_name }}</th> --}}
                                </tr>
                                <tr>
                                    <th colspan="3"></th>
                                    <th rowspan="3"> QTY <br>
                                        <font size="5"> QTY AKTUAL </font>
                                        {{-- <font size="5"> {{ $unracking->qty_aktual }} </font> --}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="0" colspan="" >CHANNEL</td>
                                    <td colspan="1">CHANNEL</td>
                                    {{-- <td colspan="1">{{ $unracking->channel }}</td> --}}
                                    <td rowspan="4">Produksi <br> <center> Cycle </center></td>
                                    <td rowspan="4"> <b> CYCLE</b></td>
                                    <td rowspan="4"> <b> CYCLE</b></td>
                                    {{-- <td rowspan="4"> <b> {{ $unracking->cycle }} </b></td> --}}
                                </tr>
                                <tr>
                                    <td width="0" >PINBOSH</td>
                                    <td colspan="1"></td>
                                </tr>
                                <tr>
                                    <td width="0" >TANGGAL</td>
                                    <td colspan="1">TANGGAL</td>
                                    {{-- <td colspan="1">{{ $unracking->tanggal_u }} {{ $unracking->waktu_in_u }}</td> --}}
                                </tr>
                                <tr>
                                    <td width="0" >NO BAR</td>
                                    <td colspan="1">NO BAR</td>
                                    {{-- <td colspan="1">{{ $unracking->no_bar }}</td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>

</body>

</html>
