<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kanban</title>
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
                                    <th colspan="3">PT. SAKAE RIKEN INDONESIA</th>
                                    <th rowspan="2">
                                        <font size="6">{{ $pengiriman->no_kartu }}</font>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="3">PART TAG</th>
                                </tr>
                                <tr>
                                    <th colspan="3">{!! DNS1D::getBarcodeHTML($pengiriman->no_part, 'C128', 1.3, 22) !!}
                                        <font size="1">{{ $pengiriman->no_part }}</font>
                                    </th>
                                    <th colspan="1">
                                        <font size="3">{{ $pengiriman->bagian }}</font>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="4">{{ $pengiriman->part_name }}</th>
                                </tr>
                                <tr>
                                    <th colspan="4">{{ $pengiriman->next_process }}</th>
                                </tr>
                                <tr>
                                    <th>MODEL</th>
                                    <th>QTY</th>
                                    <th>LOT NO.</th>
                                    <th>QC PASS</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="align-middle text-center">{{ $pengiriman->model }}</td>
                                    <td class="align-middle text-center">{{ $pengiriman->qty_troly }}</td>
                                    <td class="align-middle text-center">{{ $pengiriman->tgl_kanban }}</td>
                                    <td></td>
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
