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
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/qrcode.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/qrcode.min.js')}}"></script>

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
                        {{-- <div class="idgen" id="idgen" ></div> --}}
                        {{-- {{\Carbon\Carbon::now()->format('H:i:s')}} --}}
                        {{-- {!!QrCode::size(400)->generate($item->generator_id);!!} --}}
                        {{-- @if($item->generator_id != null)
                            <input id="idgen" type="hidden" value="{{$item->generator_id}}" />
                        @else
                        <input id="idgen" type="hidden" value="0" />
                        @endif --}}
                        @php
                        function encrypt_decrypt($action, $string)
                        {
                            $output = false;
                            $encrypt_method = "AES-256-CBC";
                            $secret_key = 'Proyek Teknik Informatika';
                            $secret_iv = 'TI SCN 2017102008';
                            // hash
                            $key = hash('sha256', $secret_key);
                            // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a
                            // warning
                            $iv = substr(hash('sha256', $secret_iv), 0, 16);
                        if ($action == 'encrypt')
                        {
                            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                            $output = base64_encode($output);
                        }
                        else
                        {
                        if ($action == 'decrypt')
                        {
                            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                        }
                        }
                        return $output;
                        }
                        //
                        // usage
                        //
                            $plain_txt = "$item->generator_id";
                            // echo "Plain Text = $plain_txt\n <br>";
                            $encrypted_txt = encrypt_decrypt('encrypt', $plain_txt);
                            // echo "Encrypted Text = $encrypted_txt\n <br>";
                            $decrypted_txt = encrypt_decrypt('decrypt', $encrypted_txt);
                            // echo "Decrypted Text = $decrypted_txt\n <br>";
                        if ($plain_txt === $decrypted_txt)
                        {echo "SUCCESS";}
                        else
                            {   echo "FAILED";
                                echo "\n";}
                        @endphp
                        <input id="idgen" type="hidden" value="{{$encrypted_txt}}" />
                        <input id="text" type="hidden" />
                        {{-- <input class="form-control-range" type="range" id="size" value="200" min="50" max="650" title="QR Code Size"> --}}
                        <div class="d-flex justify-content-center">
                            <div id="qrcode"></div>
                        </div>

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
                                <tr>
                                    <th>Class</th>
                                    <td>:</td>
                                    <td>{{$item->classes->class_name}}</td>
                                </tr>
                                <tr>
                                    <th>Time</th>
                                    <td>:</td>
                                    <td>{{$item->schedule_start}} - {{$item->schedule_end}}</td>
                                </tr>
                            </table>
                        </div>
                        <script>
                            // let slider = document.querySelector('[type=range]')
                            // let div = document.querySelector('#qrcode')

                            // slider.addEventListener('input', e => {
                            // div.style.width = e.target.value + 'px'
                            // div.style.height = e.target.value + 'px'
                            // })
                            function currentTime() {
                                var idgen = document.getElementById('idgen').getAttribute('value');
                                var date = new Date(); /* creating object of Date class */
                                var hour = date.getHours();
                                var min = date.getMinutes();
                                var sec = date.getSeconds();
                                var midday = "AM";
                                midday = (hour >= 12) ? "PM" : "AM"; /* assigning AM/PM */
                                hour = (hour == 0) ? 12 : ((hour > 12) ? (hour - 12) :
                                    hour); /* assigning hour in 12-hour format */
                                hour = updateTime(hour);
                                min = updateTime(min);
                                sec = updateTime(sec);
                                document.getElementById("text").value = idgen + "+" + hour + ":" + min + ":" +
                                    sec; /* adding time to the div */
                                var t = setTimeout(currentTime, 1000); /* setting timer */
                            }
                            function updateTime(k) {
                                /* appending 0 before time elements if less than 10 */
                                if (k < 10) {
                                    return "0" + k;
                                } else {
                                    return k;
                                }
                            }
                            currentTime();
                            if (document.getElementById("qrcode") == null) {}
                            var qrcode = new QRCode(document.getElementById("qrcode"), {
                                width: 300,
                                height: 300,
                            });
                            function makeCode() {
                                var elText = document.getElementById("text");
                                if (!elText.value) {
                                    alert("Input a text");
                                    elText.focus();
                                    return;
                                }
                                qrcode.makeCode(elText.value);
                            }
                            makeCode();
                            // $("#text").
                            // 	on("blur", function () {
                            // 		makeCode();
                            // 	}).
                            // 	on("keydown", function (e) {
                            // 		if (e.keyCode == 13) {
                            // 			makeCode();
                            // 		}
                            //     });
                            $(document).ready(
                                function () {
                                    setInterval(function () {
                                        makeCode();
                                    }, 15000);
                                });
                        </script>
                        @endforeach

                        @endif
                    </ul>
                </div>
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
                                    <input type="hidden" name="id" id="id" value="{{$d->schedule_id}}">
                                    <label for="name" class="col-sm-12 control-label">Schedule ID</label>
                                    <input type="text" class="form-control" id="schedule" name="schedule"
                                        value="{{$d->schedule_id}}" readonly>
                                    <div class="col-sm-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Course</label>
                                    <input type="text" class="form-control" id="course" name="course"
                                        value="{{$d->courses->course_name}}" readonly>
                                    <div class="col-sm-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Class</label>
                                    <input type="text" class="form-control" id="class" name="class"
                                        value="{{$d->classes->class_name}}/{{$d->classes->class_semester}}" required
                                        readonly>
                                    <div class="col-sm-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Start</label>
                                    <input type="text" class="form-control" id="start" name="start"
                                        value="{{$d->schedule_start}}" required readonly>
                                    <div class="col-sm-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">End</label>
                                    <input type="text" class="form-control" id="end" name="end"
                                        value="{{$d->schedule_end}}" required readonly>
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
        $("link[rel=icon]").prop("href", $("#qr img").prop("src"));
        $(document).ready(
            function () {
                setInterval(function () {
                    var randomnumber = Math.floor(Math.random() * 100);
                    $('#reload').text(
                        'I am getting refreshed every 3 seconds..! Random Number ==> ' +
                        randomnumber);
                }, 3000);
            });
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