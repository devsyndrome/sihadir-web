@extends('layouts.master')
@section('title','LECTURERS')
@section('user',Auth::user()->name)
@push('link-asset')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
@endpush
@section('content')
<div class="section-header">
    <h1>Lecturers</h1>
  </div>

  <div class="section-body">
    <div class="section-body">
        <div class="card">
          <div class="card-header">
          </div>
          <div class="card-body">
            <a href="javascript:void(0)" class="btn btn-info" id="tombol-tambah"><i class="far fa-edit">New Form</i></a><hr>
            <table id="lecturers-table" class="table table-striped table-bordered table-sm">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Birthdate</th>
                  <th>Birthplace</th>
                  <th>Gender</th>
                  <th>Addres</th>
                  <th>Phone Number</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              {{-- <tbody>
                @foreach ($list_lecturers as $data)
                    <tr>
                      <td>{{$data->lecturer_id}}</td>
                      <td>{{$data->lecturer_name}}</td>
                      <td>{{$data->lecturer_birthdate}}</td>
                      <td>{{$data->lecturer_birthplace}}</td>
                      <td>{{$data->lecturer_gender}}</td>
                      <td>{{$data->lecturer_address}}</td>
                      <td>{{$data->lecturer_phonenumber}}</td>
                      <td>{{$data->lecturer_email}}</td>
                    </tr>
                @endforeach
              </tbody> --}}
            </table>

        </div>
      </div>  
  </div>

<!-- MULAI MODAL KONFIRMASI DELETE-->

<div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">WARNING</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <p><b>Do you want to delete</b></p>
              <p>*data will be deleted forever, are you sure?</p>
          </div>
          <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Delete</button>
          </div>
      </div>
  </div>
</div>

<!-- AKHIR MODAL -->
@endsection
@push('modal')
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

                            <div class="form-group">
                                <label for="id" class="col-sm-12 control-label">Lecturer ID</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="id" name="id"
                                        value="" required>
                                </div>
                            </div>

                            <div class="form-group">
                              <label for="name" class="col-sm-12 control-label">Name</label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="name" name="name"
                                      value="" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="birthdate" class="col-sm-12 control-label">Birthdate</label>
                              <div class="col-sm-12">
                                  <input type="date" class="form-control" id="birthdate" name="birthdate"
                                      value="" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="birthplace" class="col-sm-12 control-label">Birthplace</label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="birthplace" name="birthplace"
                                      value="" required>
                              </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">Gender</label>
                                <div class="col-sm-12">
                                    <select name="gender" id="gender" class="form-control required">
                                        <option value="">Choose</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-12 control-label">E-mail</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="email" name="email" value=""
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                              <label for="phonenumber" class="col-sm-12 control-label">Phone Number</label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="phonenumber" name="phonenumber" value=""
                                      required>
                              </div>
                          </div>

                            <div class="form-group">
                                <label for="address" class="col-sm-12 control-label">Address</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="address" id="address" required></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-offset-2 col-sm-12">
                            <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan"
                                value="create">Submit
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
@endpush
@push('page-script')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js" integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    //Token CSRF
    $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    });
    //READ - Tampil Data
    $(document).ready(function() {
      $('#lecturers-table').DataTable({
        processing : true,
        serverside : true,
        ajax       :{
          url: "{{route('lecturers.index')}}",
          type: 'GET'
        },
        columns: [
          {data: 'lecturer_id', name: 'lecturer_id'},
          {data: 'lecturer_name', name: 'lecturer_name'},
          {data: 'lecturer_birthdate', name: 'lecturer_birthdate'},
          {data: 'lecturer_birthplace', name: 'lecturer_birthplace'},
          {data: 'lecturer_gender', name: 'lecturer_gender'},
          {data: 'lecturer_address', name: 'lecturer_address'},
          {data: 'lecturer_phonenumber', name: 'lecturer_phonenumber'},
          {data: 'lecturer_email', name: 'lecturer_email'},
          {data: 'action', name: 'action'},
        ],
        order: [[0, 'asc']]
      });
    } );
    //TOMBOL TAMBAH DATA
        //jika tombol-tambah diklik maka
        $('#tombol-tambah').click(function () {
            $("#id").attr('readonly', false)
            $('#button-simpan').val("create-post"); //valuenya menjadi create-post
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Add or edit lecturer"); //valuenya tambah pegawai baru
            $('#tambah-edit-modal').modal('show'); //modal tampil
        });

    //SIMPAN & UPDATE DATA DAN VALIDASI (SISI CLIENT)
        //jika id = form-tambah-edit panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
        //jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data
        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Sending..');

                    $.ajax({
                        data: $('#form-tambah-edit')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('lecturers.store') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function (data) { //jika berhasil 
                            $('#form-tambah-edit').trigger("reset"); //form reset
                            $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            // var oTable = $('#lecturers-table').dataTable();
                            $('#lecturers-table').DataTable().ajax.reload();
                            // oTable.fnDraw(false); //reset datatable
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data saved',
                                message: '{{ Session('
                                success ')}}',
                                position: 'bottomRight'
                            });
                        },
                        error: function (data) { //jika error tampilkan error pada console
                            console.log('Error:', data);
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }

        //TOMBOL EDIT DATA PER PEGAWAI DAN TAMPIKAN DATA BERDASARKAN ID PEGAWAI KE MODAL
        //ketika class edit-post yang ada pada tag body di klik maka
        $('body').on('click', '.edit-post', function () {
            $("#id").attr('readonly', true)
            var data_id = $(this).data('id');
            $.get('lecturers/' + data_id + '/edit', function (data) {
                $('#modal-judul').html("Edit lecturer");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');

                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
                $('#id').val(data.lecturer_id);
                $('#name').val(data.lecturer_name);
                $('#birthdate').val(data.lecturer_birthdate);
                $('#birthplace').val(data.lecturer_birthplace);
                $('#gender').val(data.lecturer_gender);
                $('#address').val(data.lecturer_address);
                $('#phonenumber').val(data.lecturer_phonenumber);
                $('#email').val(data.lecturer_email);
            })
        });

        //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
        $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
        });

        //jika tombol hapus pada modal konfirmasi di klik maka
        $('#tombol-hapus').click(function () {
            $.ajax({

                url: "lecturers/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-hapus').text('Delete'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        $('#lecturers-table').DataTable().ajax.reload();
                        // var oTable = $('#table_pegawai').dataTable();
                        // oTable.fnDraw(false); //reset datatable
                    });
                    iziToast.warning({ //tampilkan izitoast warning
                        title: 'Data deleted',
                        message: '{{ Session('
                        delete ')}}',
                        position: 'bottomRight'
                    });
                }
            })
        });
  </script>

  
    
@endpush