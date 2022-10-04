@extends('layout.master')
@section('title')
    Input Data Stok
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > Stok</li>
@endsection

@section('content')
    {{-- <marquee direction="left" scrollamount="8" align="center">SELAMAT DATANG DI APLIKASI RACKING <br> UTAMAKAN KESELAMATAN KERJA</marquee> --}}
    <div class="card-header">
        <div class="row float-right">
            <div class="col-12 col-md-12 col-lg-12">
            </div>
        </div>
    </div>

    <div class="card-body">
        <table id="add-row" class="table table-sm table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>No Part</th>
                    <th>Part Name</th>
                    <th>Total OK</th>
                    <th>Total NG</th>
                    <th>Stok</th>
                    <th>Total Kirim</th>
                    <th>No Kartu</th>
                    <th>Kirim Painting</th>
                    <th>Kirim Assy</th>
                </tr>
            </thead>

            <tbody>
                @php $no = 1; @endphp
                @foreach ($stok as $row)
                    <tr>
                        <td> <center> {{ $no++ }} </center></td>
                        <td>{{ $row->no_part }}</td>
                        <td>{{ $row->part_name }}</td>
                        <td>{{ $row->total_ok }} </td>
                        <td>{{ $row->total_ng }} </td>
                        <td>{{ $row->stok }} </td>
                        <td>{{ $row->getTotal() }} </td>
                        <td>{{ $row->no_kartu }} </td>
                        <td>{{ $row->kirim_painting }} </td>
                        <td>{{ $row->kirim_assy }} </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <center> <b> Total </b> </center>
                    </td>
                    <td> <b> {{ $sum_total_ok }}</b></td>
                    <td> <b> {{ $sum_total_ng }}</b></td>
                    <td> <b> {{ $sum_stok }}</b></td>
                    <td>{{ $total_kirim }}</td>
                    <td></td>
                    <td> <b> {{ $sum_kirim_painting }}</b></td>
                    <td> <b> {{ $sum_kirim_assy }}</b></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <br>
    </div>
@endsection

@push('page-script')
    <script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
@endpush

@push('after-script')
    <script>
        $(".swal-confirm").click(function(e) {
            id = e.target.dataset.id;
            swal({
                    title: 'Hapus data? ',
                    text: 'Setelah dihapus data tidak dapat dikembalikan',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // swal('Poof! Your imaginary file has been deleted!', {
                        // icon: 'success',
                        // });
                        $(`#delete${id}`).submit();
                    } else {
                        // swal('Your imaginary file is safe!');
                    }
                });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#add-row").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "pageLength": 75,
                "lengthMenu": [
                    [10, 25, 50, 75, -1],
                    [10, 25, 50, 75, "All"]
                ],
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#add-row_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
