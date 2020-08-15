@extends('layouts.master')
@section('title','Home')
@section('user',Auth::user()->name)
@push('link-asset')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
    integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
@endpush
@section('content')
<div class="section-header">
    <h1><span class="badge badge-primary">QR-Generator</span></h1>
</div>
<div class="section-body">
    <div class="section-body">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="text-center">
                    <h1></h1>
                    {{-- <h3>{{Carbon\Carbon::now()->format('l')}}</h3> --}}
                    <ul>
                        {{-- @foreach ($schedules as $item)
                            <li>{{$item->classrooms->classroom_name}}</li>
                        @endforeach --}}
                        @if ($schedules == "0")
                        @if ($button == "scan")
                        @if ($data != "0")
                        @foreach ($data as $items)
                        <h3> {{$items->classes->class_name}}/{{$items->classes->class_semester}} -
                            {{$items->courses->course_name}} - start now!</h3>
                        @endforeach
                        <a href="javascript:void(0)" class="btn btn-info" id="generate"><i
                                class="far fa-edit">Generate</i></a>
                        <hr>
                        @endif
                        @else
                        <h3>No Schedule!</h3>
                        @endif
                        @else
                        @foreach ($schedules as $item)
                        <div class="text-left">
                            <table>
                                <tr>
                                    <th>Lecturer</th>
                                    <td>:</td>
                                    <td>{{$item->lecturers->lecturer_name}}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Course</th>
                                    <td>:</td>
                                    <td>{{$item->courses->course_name}}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Classroom</th>
                                    <td>:</td>
                                    <td>{{$item->classrooms->classroom_name}}</td>
                                </tr>
                            </table>
                        </div>



                        @endforeach

                        @endif
                    </ul>

                </div>
                {{-- {!!QrCodee::size(200)->generate('hai');!!} --}}
                {{-- <table id="Schedules-table" class="table table-striped table-bordered">
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
                </table> --}}
            </div>
        </div>
    </div>
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
                            @if ($schedules == "0")
                            @if ($button == "scan")
                            @if ($data != "0")
                            @foreach ($data as $d)
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="{{$d->schedule_id}}" >
                                    <label for="name" class="col-sm-12 control-label">Schedule ID</label>
                                    <input type="text" class="form-control" id="schedule" name="schedule" value="{{$d->schedule_id}}" readonly>
                                    <div class="col-sm-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Course</label>
                                    <input type="text" class="form-control" id="course" name="course" value="{{$d->courses->course_name}}" readonly>
                                    <div class="col-sm-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Class</label>
                                    <input type="text" class="form-control" id="class" name="class" value="{{$d->classes->class_name}}/{{$d->classes->class_semester}}" required readonly>
                                    <div class="col-sm-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Start</label>
                                    <input type="text" class="form-control" id="start" name="start" value="{{$d->schedule_start}}" required readonly>
                                    <div class="col-sm-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">End</label>
                                    <input type="text" class="form-control" id="end" name="end" value="{{$d->schedule_end}}" required readonly>
                                    <div class="col-sm-12">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-offset-2 col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan"
                                    value="create">Generate QR
                                </button>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @endif
                        @endif
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
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
    <script>
        $('#generate').click(function () {
            $('#button-simpan').val("create-post"); //valuenya menjadi create-post
            $('#modal-judul').html("QR-Generator"); //valuenya tambah pegawai baru
            $('#tambah-edit-modal').modal('show'); //modal tampil
        });
        $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    });
        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
                    submitHandler: function (form) {
                        var actionType = $('#tombol-simpan').val();
                        $('#tombol-simpan').html('Generating..');

                        $.ajax({
                                    data: $('#form-tambah-edit')
                                        .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                                    url: "{{ route('generator.store') }}", //url simpan data
                                    type: "POST", //karena simpan kita pakai method POST
                                    // dataType: 'json', //data tipe kita kirim berupa JSON
                                    success: function (data) { //jika berhasil 
                                        $('#tambah-edit-modal').modal('hide'); //modal hide
                                        $('#tombol-simpan').html('Generate'); //tombol simpan
                                        location.reload();
                                        // var oTable = $('#Classes-table').dataTable();
                                        // $('#Schedules-table').DataTable().ajax.reload();
                                        // oTable.fnDraw(false); //reset datatable
                                        // iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                        //     title: 'Data saved',
                                        //     message: '{{ Session('
                                        //     success ')}}',
                                        //     position: 'bottomRight'
                                    
                            },
                            error: function (data) { //jika error tampilkan error pada console

                                console.log('Error:', data);
                                $('#tombol-simpan').html('Error');
                            }
                    });
                }
            })
        }
    </script>
    @endpush