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
        <h5 class="my-0 mr-md-auto font-weight-normal">LARAVEL AJAX CRUD YAJRA DATATABLE </h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#">Laravel</a>
            <a class="p-2 text-dark" href="#">Codeigniter</a>
            <a class="p-2 text-dark" href="#">Jquery</a>
            <a class="p-2 text-dark" href="#">Vue Js</a>
        </nav>
        <a class="btn btn-outline-primary" target="_blank"
            href="https://www.youtube.com/channel/UCXFdc68srZQ-ok4I1-pHs2g?view_as=subscriber">Tahu Coding</a>
    </div>

    <!-- MULAI CONTAINER -->
    <div class="container">

        <div class="card">

            <div class="card-body">
                <!-- MULAI TOMBOL TAMBAH -->
                <a href="javascript:void(0)" class="btn btn-info" id="tombol-tambah">Tambah PERSENTASE</a>
                <br><br>
                <!-- AKHIR TOMBOL -->
                <!-- MULAI TABLE -->
                <table class="table table-striped table-bordered table-sm" id="table_persentase">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kabupaten</th>
                            <th>Jenis Bantuan</th>
                            <th>Total Penerima Terealisasi</th>
                            <th>Total Penerima Terealisasi Persen</th>
                            <th>Total Penerima Dalam Antrian </th>
                            <th>Total Penerima Dalam Antrian Persen </th>
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
                    <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal">
                        <div class="row">
                            <div class="col-sm-12">

                                <input type="hidden" name="id" id="id">

                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Total Penerima</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="total_penerima" name="total_penerima"
                                            value="" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Kabupaten</label>
                                    <div class="col-sm-12">
                                        <select name="id_kabupaten" id="id_kabupaten" class="form-control required">
                                            <option value="">Pilih Kabupaten</option>
                                            <option value="1">Lubuk Linggau</option>
                                            <option value="2">Palembang</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Kabupaten</label>
                                    <div class="col-sm-12">
                                        <select name="id_jenis_bantuan" id="id_jenis_bantuan" class="form-control required">
                                            <option value="">Pilih Jenis Bantuan</option>
                                            <option value="1">Bantuan 1</option>
                                            <option value="2">Bantuan 2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Total Penerima terialisasi</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="total_penerima_terealisasi" name="total_penerima_terealisasi" value=""
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Total Penerima Terealisasi Persen</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="total_penerima_terealisasi_persen" name="total_penerima_terealisasi_persen" value=""
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Total Penerima Dalam Antrian</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="total_penerima_dalam_antrian" name="total_penerima_dalam_antrian" value=""
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Total Penerima Dalam Antrian Persen</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="total_penerima_dalam_antrian_persen" name="total_penerima_dalam_antrian_persen" value=""
                                            required>
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
                    <p><b>Jika menghapus Persentase maka</b></p>
                    <p>*data persentase tersebut hilang selamanya, apakah anda yakin?</p>
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
            $('#modal-judul').html("Tambah Persentase Baru"); //valuenya tambah persentase baru
            $('#tambah-edit-modal').modal('show'); //modal tampil
        });

        //MULAI DATATABLE
        //script untuk memanggil data json dari server dan menampilkannya berupa datatable
        $(document).ready(function() {
            $('#table_persentase').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ route('persentase.index') }}",
                    type: 'GET'
                },
                columns: [{
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
                        name: 'action'
                    },

                ],
                order: [
                    [0, 'asc']
                ]
            });
        });

        //SIMPAN & UPDATE DATA DAN VALIDASI (SISI CLIENT)
        //jika id = form-tambah-edit panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
        //jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data
        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
                submitHandler: function(form) {
                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Sending..');

                    $.ajax({
                        data: $('#form-tambah-edit')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('persentase.store') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function(data) { //jika berhasil 
                            $('#form-tambah-edit').trigger("reset"); //form reset
                            $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#table_persentase')
                        .dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data Berhasil Disimpan',
                                message: '{{ Session('
                                success ') }}',
                                position: 'bottomRight'
                            });
                        },
                        error: function(data) { //jika error tampilkan error pada console
                            console.log('Error:', data);
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }

        //TOMBOL EDIT DATA PER PERSENTASE DAN TAMPIKAN DATA BERDASARKAN ID PERSENTASE KE MODAL
        //ketika class edit-post yang ada pada tag body di klik maka
        $('body').on('click', '.edit-post', function() {
            var data_id = $(this).data('id');
            $.get('persentase/' + data_id + '/edit', function(data) {
                $('#modal-judul').html("Edit Post");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');

                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
                $('#id').val(data.id);
                $('#total_penerima').val(data.total_penerima);
                $('#id_kabupaten').val(data.id_kabupaten);
                $('#id_jenis_bantuan').val(data.id_jenis_bantuan);
                $('#total_penerima_terealisasi').val(data.total_penerima_terealisasi);
                $('#total_penerima_terealisasi_persen').val(data.total_penerima_terealisasi_persen);
                $('#total_penerima_dalam_antrian').val(data.total_penerima_dalam_antrian);
                $('#total_penerima_dalam_antrian_persen').val(data.total_penerima_dalam_antrian_persen);
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

                url: "persentase/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function() {
                    $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function(data) { //jika sukses
                    setTimeout(function() {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#table_persentase').dataTable();
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
