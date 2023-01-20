@extends('layout.master')
@section('title')
    Data Kensa
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > Kensa > Kensa</li>
@endsection
@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Produksi Kensa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
    <div class="card-header" style="padding-left: 10px;">
        <div class="row float-right">
            <div class="col-12 col-md-12 col-lg-12">
                <a href="{{ route('kensa.tambah') }}" class="btn btn-icon icon-left btn-info"><i class="fas fa-plus"></i>
                    Tambah Data</a>
            </div>
        </div>
        <form action="{{ route('kensa') }}" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <label for="">Tanggal</label>
                    <input type="date" class="form-control" name="date" id="date" value="{{ $date }}">
                </div>
                <div class="col-md-4">
                    <label for="" class="text-white">Filter</label> <br>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>


    <div class="card-body mt-3" style="
    padding-top: 0px;
">
        <table id="kensa-table" class="table table-sm table-hover table-bordered table-striped responsive">
            <thead>
                <tr>
                    <th rowspan="2" class="align-middle text-center">#</th>
                    <th rowspan="2" class="align-middle text-center">Tgl Unracking</th>
                    <th rowspan="2" class="align-middle text-center">Waktu Unracking</th>
                    <th rowspan="2" class="align-middle text-center">Tgl Kensa</th>
                    <th rowspan="2" class="align-middle text-center">Waktu Kensa</th>
                    <th rowspan="2" class="align-middle text-center">Part Name</th>
                    <th rowspan="2" class="align-middle text-center">No Bar</th>
                    <th rowspan="2" class="align-middle text-center">Qty Bar</th>
                    <th rowspan="2" class="align-middle text-center">Total OK</th>
                    <th rowspan="2" class="align-middle text-center">Cycle</th>
                    <th colspan="16" class="align-middle text-center">NG PLATING</th>
                    <th colspan="6" class="align-middle text-center">NG MOLDING</th>
                    <th colspan="5" class="align-middle text-center">Total</th>
                </tr>
                <tr>
                    <th>Nikel</th>
                    <th>Butsu</th>
                    <th>Hadare</th>
                    <th>Hage</th>
                    <th>Moyo</th>
                    <th>Fukure</th>
                    <th>Crack</th>
                    <th>Henkei</th>
                    <th>Hana zaki</th>
                    <th>Kizu</th>
                    <th>Kaburi</th>
                    <th>Shiro moya</th>
                    <th>Shimi</th>
                    <th>Pitto</th>
                    <th>Misto</th>
                    <th>Other</th>
                    <th>Gores</th>
                    <th>Regas</th>
                    <th>Silver</th>
                    <th>Hike</th>
                    <th>Burry</th>
                    <th>Others</th>
                    <th>Total NG</th>
                    <th>% Total OK</th>
                    <th>% Total NG</th>
                    <th>Keterangan</th>
                    <th>PIC</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kensa as $no => $kensha)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td style="width:1px; white-space:nowrap;">
                            {{ \Carbon\Carbon::parse($kensha->tanggal_u)->format('d-m-Y') }}
                        </td>
                        <td style="width:1px; white-space:nowrap;" align="center" >
                            {{ \Carbon\Carbon::parse($kensha->waktu_in_u)->format('H:i:s') }}</td>
                        <td style="width:1px; white-space:nowrap;">
                            {{ \Carbon\Carbon::parse($kensha->tanggal_k)->format('d-m-Y') }}
                        </td>
                        <td style="width:1px; white-space:nowrap;">
                            {{ \Carbon\Carbon::parse($kensha->waktu_k)->format('H:i:s') }}</td>
                        <td style="width:1px; white-space:nowrap;">{{ $kensha->part_name }}</td>
                        <td class="text-center">{{ $kensha->no_bar }}</td>
                        <td class="text-center">{{ $kensha->qty_aktual }}</td>
                        <td class="text-center">{{ $kensha->total_ok }}</td>
                        <td class="text-center">{{ $kensha->cycle }}</td>
                        <td class="text-center">{{ $kensha->nikel }}</td>
                        <td class="text-center">{{ $kensha->butsu }}</td>
                        <td class="text-center">{{ $kensha->hadare }}</td>
                        <td class="text-center">{{ $kensha->hage }}</td>
                        <td class="text-center">{{ $kensha->moyo }}</td>
                        <td class="text-center">{{ $kensha->fukure }}</td>
                        <td class="text-center">{{ $kensha->crack }}</td>
                        <td class="text-center">{{ $kensha->henkei }}</td>
                        <td class="text-center">{{ $kensha->hanazaki }}</td>
                        <td class="text-center">{{ $kensha->kizu }}</td>
                        <td class="text-center">{{ $kensha->kaburi }}</td>
                        <td class="text-center">{{ $kensha->shiromoya }}</td>
                        <td class="text-center">{{ $kensha->shimi }}</td>
                        <td class="text-center">{{ $kensha->pitto }}</td>
                        <td class="text-center">{{ $kensha->misto ?? 0 }}</td>
                        <td class="text-center">{{ $kensha->other }}</td>
                        <td class="text-center">{{ $kensha->gores }}</td>
                        <td class="text-center">{{ $kensha->regas }}</td>
                        <td class="text-center">{{ $kensha->silver }}</td>
                        <td class="text-center">{{ $kensha->hike }}</td>
                        <td class="text-center">{{ $kensha->burry }}</td>
                        <td class="text-center">{{ $kensha->others }}</td>
                        <td class="text-center">{{ $kensha->total_ng }}</td>
                        <td style="width:1px; white-space:nowrap;">{{ $kensha->p_total_ok }} %</td>
                        <td style="width:1px; white-space:nowrap;">{{ $kensha->p_total_ng }} %</td>
                        <td>{{ $kensha->keterangan }}</td>
                        <td>{{ $kensha->created_by }}</td>
                        <td style="width:1px; white-space:nowrap;">
                            <a href="{{ route('kensa.edit', $kensha->id) }}" class="btn btn-icon btn-sm btn-warning"><i
                                    class="far fa-edit"></i></a>
                            {{-- <a href="#" data-id="{{ $kensha->id }}"
                                class="btn btn-icon btn-sm btn-danger swal-confirm"><i class="far fa-trash-alt">
                                    </i>
                                <form action="{{ route('kensa.delete', $kensha->id) }}" id="delete{{ $kensha->id }}"
                                    method="POST">
                                    @csrf
                                </form>
                            </a> --}}
                            <button type="button" class="btn btn-danger btn-sm delete-button"
                                data-id="{{ $kensha->id }}"> <i class="far fa-trash-alt">
                                </i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="10" class="bg-transparent">
                    </td>
                    <td class="text-center"><b>{{ $sum_nikel }}</b></td>
                    <td class="text-center"><b>{{ $sum_butsu }}</b></td>
                    <td class="text-center"><b>{{ $sum_hadare }}</b></td>
                    <td class="text-center"><b>{{ $sum_hage }}</b></td>
                    <td class="text-center"><b>{{ $sum_moyo }}</b></td>
                    <td class="text-center"><b>{{ $sum_fukure }}</b></td>
                    <td class="text-center"><b>{{ $sum_crack }}</b></td>
                    <td class="text-center"><b>{{ $sum_henkei }}</b></td>
                    <td class="text-center"><b>{{ $sum_hanazaki }}</b></td>
                    <td class="text-center"><b>{{ $sum_kizu }}</b></td>
                    <td class="text-center"><b>{{ $sum_kaburi }}</b></td>
                    <td class="text-center"><b>{{ $sum_shiromoya }}</b></td>
                    <td class="text-center"><b>{{ $sum_shimi }}</b></td>
                    <td class="text-center"><b>{{ $sum_pitto }}</b></td>
                    <td class="text-center"><b>{{ $sum_misto }}</b></td>
                    <td class="text-center"><b>{{ $sum_other }}</b></td>
                    <td class="text-center"><b>{{ $sum_gores }}</b></td>
                    <td class="text-center"><b>{{ $sum_regas }}</b></td>
                    <td class="text-center"><b>{{ $sum_silver }}</b></td>
                    <td class="text-center"><b>{{ $sum_hike }}</b></td>
                    <td class="text-center"><b>{{ $sum_burry }}</b></td>
                    <td class="text-center"><b>{{ $sum_others }}</b></td>
                    {{-- <td><b>{{ $sum_total_ok }}</b></td> --}}
                    <td class="text-center"><b>{{ $sum_total_ng }}</b></td>
                    <td class="text-center">{{ '-' }}</td>
                    <td class="text-center">{{ '-' }}</td>
                    <td colspan="3"></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <br>
    {{-- {!! $kensa->links() !!} --}}
    </div>
@endsection

@push('page-script')
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js">
    </script>
@endpush

@push('after-script')
    @include('sweetalert::alert')

    <script>
        $(document).ready(function() {
            $("#kensa-table").DataTable({
                "responsive": false,
                "lengthChange": true,
                "autoWidth": false,
                "pageLength": 75,
                "lengthMenu": [
                    [10, 25, 50, 75, -1],
                    [10, 25, 50, 75, "All"]
                ],
                scrollY: "700px",
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                fixedColumns: {
                    left: 10,
                }
            });
        });
    </script>

    <script>
        $(document).on('click', '.delete-button', function(e) {
            e.preventDefault();

            var id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak dapat mengembalikan data yang telah dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus saja!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '/kensa/delete/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            if (data.success) {
                                Swal.fire(
                                    'Terhapus!',
                                    'Data Anda telah dihapus.',
                                    'success'
                                ).then((result) => {
                                    window.location.href = '/kensa';
                                });
                            } else {
                                Swal.fire(
                                    'Gagal!',
                                    'Part sudah di Unracking.',
                                    'error'
                                )
                            }
                        },
                        error: function() {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat menghapus data.',
                                'error'
                            ).then((result) => {
                                window.location.href = '/kensa';
                            });
                        }
                    });
                }
            })
        });
    </script>

    {{-- <script>
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
    </script> --}}
@endpush
