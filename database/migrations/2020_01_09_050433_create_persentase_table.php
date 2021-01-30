<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8|7 Datatables Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Laravel 7|8 Yajra Datatables Example</h2>
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Total Penerima</th>
                    <th>Kabupaten</th>
                    <th>Jenis Bantuan</th>
                    <th>Phone</th>
                    <th>DOB</th>
                    <th>DOB</th>
                    <th>DOB</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(function() {

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('persentase.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'total_penerima',
                    name: 'total_penerima'
                },
                {
                    data: 'id_kabupaten',
                    name: 'id_kabupaten'
                },
                {
                    data: 'id_jenis_bantuan',
                    name: 'id_jenis_bantuan'
                },
                {
                    data: 'total_penerima_terealisasi',
                    name: 'total_penerima_terealisasi'
                },
                {
                    data: 'total_penerima_terealisasi_persen',
                    name: 'total_penerima_terealisasi_persen'
                },
                {
                    data: 'total_penerima_dalam_antrian',
                    name: 'total_penerima_dalam_antrian'
                },
                {
                    data: 'total_penerima_dalam_antrian_persen',
                    name: 'total_penerima_dalam_antrian_persen'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });

    });

</script>

</html>
