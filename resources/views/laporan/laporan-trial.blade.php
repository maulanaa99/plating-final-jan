@extends('layout.master')
@section('title')
    Data Produksi Trial Plating
@endsection

@push('page-styles')
    <style>
        .centering {
            margin: auto;
            width: 50%;
            border: 3px solid;
            border-color: #F4F6F9;
            padding: 10px;
        }
    </style>
@endpush

@section('breadcrumb')
    @parent
    <li class="active"> > Laporan > Trial</li>
@endsection

@section('content')
    <div class="card-header centering">
        <form action="{{ route('laporan.trial') }}" method="GET">
            <div class="row input-daterange">
                <div class="col-md-5">
                    <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $start_date }}">
                </div>
                <div class="col-md-1">
                    <center>
                        <font size="5"><b> - </b> </font>
                    </center>
                </div>
                <div class="col-md-5">
                    <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $end_date }}">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="add-row" class="table table-sm table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th class="text-center" >Tgl Racking</th>
                        <th class="text-center">Tgl Unracking</th>
                        <th class="text-center">Tgl Kensa</th>
                        <th class="text-center">Part Name</th>
                        <th>No Bar</th>
                        <th>Channel</th>
                        <th>Chrome</th>
                        <th>Katalis</th>
                        <th>Qty Bar</th>
                        <th>Qty Aktual</th>
                        <th>Cycle</th>
                        <th class="text-center">Nikel</th>
                        <th class="text-center">Butsu</th>
                        <th class="text-center">Hadare</th>
                        <th class="text-center">Hage</th>
                        <th class="text-center">Moyo</th>
                        <th class="text-center">Fukure</th>
                        <th class="text-center">Crack</th>
                        <th class="text-center">Henkei</th>
                        <th class="text-center">Hana zaki</th>
                        <th class="text-center">Kizu</th>
                        <th class="text-center">Kaburi</th>
                        <th class="text-center">Shiro moya</th>
                        <th class="text-center">Shimi</th>
                        <th class="text-center">Pitto</th>
                        <th class="text-center">Misto</th>
                        <th class="text-center">Other</th>
                        <th class="text-center">Gores</th>
                        <th class="text-center">Regas</th>
                        <th class="text-center">Silver</th>
                        <th class="text-center">Hike</th>
                        <th class="text-center">Burry</th>
                        <th class="text-center">Others</th>
                        <th class="text-center">Total OK</th>
                        <th class="text-center">Total NG</th>
                        <th>% Total OK</th>
                        <th>% Total NG</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trials as $no => $trial)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ \Carbon\Carbon::parse($trial->tanggal_r)->format('d-m-Y') }} {{ $trial->waktu_in_r }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ \Carbon\Carbon::parse($trial->tanggal_u)->format('d-m-Y') }} {{ $trial->waktu_in_u }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ \Carbon\Carbon::parse($trial->tanggal_k)->format('d-m-Y') }} {{ $trial->waktu_k }}</td>
                            <td style="width:1px; white-space:nowrap;">{{ $trial->part_name }}</td>
                            <td>{{ $trial->no_bar }}</td>
                            <td>{{ $trial->channel }}</td>
                            <td>{{ $trial->grade_color }}</td>
                            <td>{{ $trial->katalis }}</td>
                            <td class="text-center">{{ $trial->qty_bar }}</td>
                            <td class="text-center">{{ $trial->qty_aktual }}</td>
                            <td class="text-center">{{ $trial->cycle }}</td>
                            <td class="text-center">{{ $trial->nikel }}</td>
                            <td class="text-center">{{ $trial->butsu }}</td>
                            <td class="text-center">{{ $trial->hadare }}</td>
                            <td class="text-center">{{ $trial->hage }}</td>
                            <td class="text-center">{{ $trial->moyo }}</td>
                            <td class="text-center">{{ $trial->fukure }}</td>
                            <td class="text-center">{{ $trial->crack }}</td>
                            <td class="text-center">{{ $trial->henkei }}</td>
                            <td class="text-center">{{ $trial->hanazaki }}</td>
                            <td class="text-center">{{ $trial->kizu }}</td>
                            <td class="text-center">{{ $trial->kaburi }}</td>
                            <td class="text-center">{{ $trial->shiromoya }}</td>
                            <td class="text-center">{{ $trial->shimi }}</td>
                            <td class="text-center">{{ $trial->pitto }}</td>
                            <td class="text-center">{{ $trial->misto }}</td>
                            <td class="text-center">{{ $trial->other }}</td>
                            <td class="text-center">{{ $trial->gores }}</td>
                            <td class="text-center">{{ $trial->regas }}</td>
                            <td class="text-center">{{ $trial->silver }}</td>
                            <td class="text-center">{{ $trial->hike }}</td>
                            <td class="text-center">{{ $trial->burry }}</td>
                            <td class="text-center">{{ $trial->others }}</td>
                            <td class="text-center">{{ $trial->total_ok }}</td>
                            <td class="text-center">{{ $trial->total_ng }}</td>
                            <td class="text-center">{{ $trial->p_total_ok }}%</td>
                            <td class="text-center">{{ $trial->p_total_ng }}%</td>
                            {{-- <td style="width:1px; white-space:nowrap;"> --}}
                            {{-- <a href="{{ route('kensa.edit', $kensha->id) }}" class="btn btn-icon btn-sm btn-warning"><i
                                        class="far fa-edit"></i></a> --}}
                            {{-- <a href="#" data-id="{{ $kensha->id }}"
                                    class="btn btn-icon btn-sm btn-danger swal-confirm"><i class="far fa-trash-alt">
                                        </i>
                                    <form action="{{ route('kensa.delete', $kensha->id) }}" id="delete{{ $kensha->id }}"
                                        method="POST">
                                        @csrf
                                    </form>
                                </a> --}}
                            {{-- </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    </div>
@endsection

@push('page-script')
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
@endpush

@push('after-script')
    @include('sweetalert::alert')

    <script>
        $(document).ready(function() {
            $("#add-row").DataTable({
                "responsive": false,
                "lengthChange": true,
                "autoWidth": false,
                "pageLength": 75,
                "lengthMenu": [
                    [10, 25, 50, 75, -1],
                    [10, 25, 50, 75, "All"]
                ],
                "buttons": ["excel", "pdf", "print"],
                scrollY: "700px",
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                fixedColumns: {
                    left: 6,
                }
            }).buttons().container().appendTo('#add-row_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $(".swal-confirm").click(function(e) {
            id = e.target.dataset.id;
            swal({
                    title: 'Hapus data? ',
                    text: 'Setelah dihapus, data tidak dapat dikembalikan',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(`#delete${id}`).submit();
                    } else {}
                });
        });
    </script>
@endpush
