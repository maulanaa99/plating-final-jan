<!DOCTYPE html>
<html>

<head>
    <title>Datatables Server Side Processing in Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <br />
        <h3 align="center">Datatables Server Side Processing in Laravel</h3>
        <br />
        <table id="add-row" class="table table-sm table-hover table-bordered table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>no.</th>
                    <th>name</th>
                    <th>qty</th>
                </tr>
            </thead>
        </table>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#add-row').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('product.getdata') }}",
                "pageLength": 75,
                "lengthMenu": [
                    [10, 25, 50, 75, -1],
                    [10, 25, 50, 75, "All"]
                ],
                "buttons": ["excel", "pdf", "print"]

                // "columns": [{
                //         "data": "DT_RowIndex"
                //     },
                //     {
                //         "data": "name"
                //     },
                //     {
                //         "data": "qty"
                //     },
                // ],
            }).buttons().container().appendTo('#add-row_wrapper .col-md-6:eq(0)');
        });
    </script>

</body>

</html>
