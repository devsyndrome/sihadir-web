@extends('layouts.master')
@section('title','SCHEDULES')
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
    <h1>Schedules</h1>
  </div>

  <div class="section-body">
    <div class="section-body">
        <div class="card">
          <div class="card-header">
          </div>
          <div class="card-body">
            <a href="javascript:void(0)" class="btn btn-info" id="tombol-tambah"><i class="far fa-edit">New Form</i></a><hr>
            <table id="Schedules-table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Classroom</th>
                  <th>Course</th>
                  <th>Class</th>
                  <th>Lecturer</th>
                  <th>Start</th>
                  <th>End</th>
                  <th>Day</th>
                  <th>Action</th>
                </tr>
              </thead>
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
                          <input type="hidden" name="id" id="id">
                          <div class="form-group">
                            <label for="name" class="col-sm-12 control-label">Classroom</label>
                            <div class="col-sm-12">
                              {!! Form::select('classroom_id', $classrooms, null, ['class' => 'form-control required', 'name' => 'classroom_id', 'id' => 'classroom_id']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="name" class="col-sm-12 control-label">Course</label>
                          <div class="col-sm-12">
                            {!! Form::select('course_id', $courses, null, ['class' => 'form-control required', 'name' => 'course_id', 'id' => 'course_id']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Class</label>
                        <div class="col-sm-12">
                          {!! Form::select('class_id', $classes, null, ['class' => 'form-control required', 'name' => 'class_id', 'id' => 'class_id']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-12 control-label">Lecturer</label>
                      <div class="col-sm-12">
                        {!! Form::select('lecturer_id', $lecturers, null, ['class' => 'form-control required', 'name' => 'lecturer_id', 'id' => 'lecturer_id']) !!}
                      </div>
                  </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-12 control-label">Start</label>
                              <div class="col-sm-12">
                                  <input type="time" class="form-control" id="start" name="start"
                                      value="" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-12 control-label">End</label>
                              <div class="col-sm-12">
                                  <input type="time" class="form-control" id="end" name="end"
                                      value="" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="name" class="col-sm-12 control-label">Day</label>
                              <div class="col-sm-12">
                                    <select class="form-control" name="day" id="day">
                                      <option>Monday</option>
                                      <option>Tuesday</option>
                                      <option>Wednesday</option>
                                      <option>Thursday</option>
                                      <option>Friday</option>
                                      <option>Saturday</option>
                                    </select>
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
      $('#Schedules-table').DataTable({
        processing : true,
        serverside : true,
        ajax       :{
          url: "{{route('schedules.index')}}",
          type: 'GET'
        },
        columns: [
          {data: 'schedule_id', name: 'schedule_id'},
          {data: 'classrooms.classroom_name', name: 'classrooms.classroom_name'},
          {data: 'courses.course_name', name: 'courses.course_name'},
          {data: 'classes.class_name', name: 'classes.class_name'},
          {data: 'lecturers.lecturer_name', name: 'lecturers.lecturer_name'},
          {data: 'schedule_start', name: 'schedule_start'},
          {data: 'schedule_end', name: 'schedule_end'},
          {data: 'schedule_day', name: 'schedule_day'},
          {data: 'action', name: 'action'},
        ],
        order: [[0, 'asc']]
      });
    } );
    //TOMBOL TAMBAH DATA
        //jika tombol-tambah diklik maka
        $('#tombol-tambah').click(function () {
            $('#button-simpan').val("create-post"); //valuenya menjadi create-post
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Add new Schedule"); //valuenya tambah pegawai baru
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
                        url: "{{ route('schedules.store') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        // dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function (data) { //jika berhasil 
                            $('#form-tambah-edit').trigger("reset"); //form reset
                            $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            // var oTable = $('#Classes-table').dataTable();
                            $('#Schedules-table').DataTable().ajax.reload();
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
            var data_id = $(this).data('id');
            $.get('schedules/' + data_id + '/edit', function (data) {
                $('#modal-judul').html("Edit Class");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');

                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
                $('#id').val(data.schedule_id);
                $('#classroom_id').val(data.classroom_id);
                $('#course_id').val(data.course_id);
                $('#class_id').val(data.class_id);
                $('#lecturer_id').val(data.lecturer_id);
                $('#start').val(data.schedule_start);
                $('#end').val(data.schedule_end);
                $('#day').val(data.schedule_day);
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

                url: "schedules/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-hapus').text('Delete'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        $('#Schedules-table').DataTable().ajax.reload();
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