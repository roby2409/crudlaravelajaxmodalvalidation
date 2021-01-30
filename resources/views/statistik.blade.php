<!DOCTYPE html>
<html>

<head>
    <title>CRUD AJAX LARAVEL</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- MULAI STYLE CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
    <!-- AKHIR STYLE CSS -->

</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">LARAVEL AJAX modal Validation dan Upload</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ route('statistik.index') }}">Statistik</a>
            <a class="p-2 text-dark" href="{{ route('persentase.index') }}">Persentase</a>
        </nav>

    </div>

    <!-- MULAI CONTAINER -->
    <div class="container">

        <div class="card">

            <div class="card-body">
                <!-- MULAI TOMBOL TAMBAH -->
                <a href="javascript:void(0)" class="btn btn-info" id="tombol-tambah">Tambah STATISTIK</a>
                <br><br>
                <!-- AKHIR TOMBOL -->
                <!-- MULAI TABLE -->
                <table class="table table-striped table-bordered table-sm" id="table_statistik">
                    <thead>
                        <tr>
                            <th>Keterangan</th>
                            <th>file</th>
                            <th>Created At</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
                <!-- AKHIR TABLE -->
            </div>
        </div>
    </div>
    <!-- AKHIR CONTAINER -->

    <!-- MULAI MODAL FORM TAMBAH/EDIT-->
    <div class="modal fade" id="tambah-edit-modal" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-judul"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none"></div>
                    <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">

                                <input type="hidden" name="id" id="id">

                                <div class="form-group" id="form-group-keterangan">
                                    <label for="name" class="col-sm-12 control-label">Nama Statistik</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                                            value="" required>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group" id="form-group-file">
                                    <label for="file" class="col-sm-12 control-label">Upload File</label>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="file" name="file" id="file">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan"
                                    value="create">Simpan
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR MODAL -->

    <!-- MULAI MODAL KONFIRMASI DELETE-->

    <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">PERHATIAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Jika menghapus Statistik maka</b></p>
                    <p>*data statistik tersebut hilang selamanya, apakah anda yakin?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus
                        Data</button>
                </div>
            </div>
        </div>
    </div>

    <!-- AKHIR MODAL -->

    <!-- LIBARARY JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>


    <!-- AKHIR LIBARARY JS -->

    <script>
        $(document).ready(function() {
            $('#tombol-simpan').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                var form = $('#form-tambah-edit')[0];
                $.ajax({
                    processData: false,
                    contentType: false,
                    url: "{{ route('statistik.store') }}", //url simpan data
                    method: 'post',
                    data: new FormData(form),
                    success: function(result) {
                        if (result.errors) {
                            $('.alert-danger').html('');
                            $.each(result.errors, function(key, value) {
                                $('.alert-danger').show();
                                $('.alert-danger').append('<li>' + value + '</li>');
                            });
                            $('#tombol-simpan').html('Simpan');
                        } else {
                            $('.alert-danger').hide();
                            $('#form-tambah-edit').trigger("reset"); //form reset
                            $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#table_statistik')
                                .dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data Berhasil Disimpan',
                                message: '{{ Session('
                                    success ') }}',
                                position: 'bottomRight'
                            });
                        }
                    }
                });
            });
        });

    </script>

    <!-- JAVASCRIPT -->
    <script>
        //CSRF TOKEN PADA HEADER
        //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        //TOMBOL TAMBAH DATA
        //jika tombol-tambah diklik maka
        $('#tombol-tambah').click(function() {
            $('#button-simpan').val("create-post"); //valuenya menjadi create-post
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Statistik Baru"); //valuenya tambah statistik baru
            $('#tambah-edit-modal').modal('show'); //modal tampil
        });

        //MULAI DATATABLE
        //script untuk memanggil data json dari server dan menampilkannya berupa datatable
        $(document).ready(function() {
            $('#table_statistik').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ route('statistik.index') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'file',
                        name: 'file'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },

                ],
                order: [
                    [0, 'asc']
                ]
            });
        });


        //TOMBOL EDIT DATA PER STATISTIK DAN TAMPIKAN DATA BERDASARKAN ID STATISTIK KE MODAL
        //ketika class edit-post yang ada pada tag body di klik maka
        $('body').on('click', '.edit-post', function() {
            var data_id = $(this).data('id');
            $.get('statistik/' + data_id + '/edit', function(data) {
                $('#modal-judul').html("Edit Post");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');

                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
                $('#id').val(data.id);
                $('#keterangan').val(data.keterangan);
                $('#file').val(data.file);
                $('#id_jenis_bantuan').val(data.id_jenis_bantuan);
            })
        });

        //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
        $(document).on('click', '.delete', function() {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
        });

        //jika tombol hapus pada modal konfirmasi di klik maka
        $('#tombol-hapus').click(function() {
            $.ajax({

                url: "statistik/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function() {
                    $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function(data) { //jika sukses
                    setTimeout(function() {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#table_statistik').dataTable();
                        oTable.fnDraw(false); //reset datatable
                    });
                    iziToast.warning({ //tampilkan izitoast warning
                        title: 'Data Berhasil Dihapus',
                        message: '{{ Session('
                        delete ') }}',
                        position: 'bottomRight'
                    });
                }
            })
        });

    </script>

    <!-- JAVASCRIPT -->
</body>

</html>
