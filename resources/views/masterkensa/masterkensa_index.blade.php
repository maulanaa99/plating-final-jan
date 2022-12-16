@extends('layout.master')
@section('title')
    Master Data Kensa
@endsection

@section('breadcrumb')
    @parent
    <li class="active"> > Master Data Kensa</li>
@endsection

@section('content')
    {{-- <marquee direction="left" scrollamount="8" align="center">SELAMAT DATANG DI APLIKASI RACKING <br> UTAMAKAN KESELAMATAN KERJA</marquee> --}}

    <div class="card-body">
        <table id="add-row" class="table table-sm table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="align-middle text-center">Part Number</th>
                    <th class="align-middle text-center">Part Name</th>
                    <th>Qty Bar</th>
                    <th>Qty Trolly</th>
                    <th>Bagian</th>
                    <th>Next Process</th>
                    <th>Model</th>
                </tr>
            </thead>

            <tbody>
                @php $no = 1; @endphp
                @foreach ($masterkensa as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->no_part }}</td>
                        <td>{{ $row->part_name }}</td>
                        <td>{{ $row->qty_bar }} </td>
                        <td>{{ $row->qty_trolly }} </td>
                        <td>{{ $row->bagian }} </td>
                        <td>{{ $row->next_process }} </td>
                        <td>{{ $row->model }} </td>
                    </tr>
                @endforeach
            </tbody>
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
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#add-row_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
