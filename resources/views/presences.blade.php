@extends('layouts.master')
@section('title','Home')
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
    <h1>QR-Generator</h1>
</div>
<div class="section-body">
    <div class="section-body">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="text-center">
                    <h1>Schedules <span class="badge badge-primary">Today</span></h1>
                <h3>{{Carbon\Carbon::today()->toDateString()}}</h3>
                <h5 id="time"></span></h5>
                

<script type="text/javascript">
  function showTime() {
    var date = new Date(),
        utc = new Date(Date.UTC(
          date.getFullYear(),
          date.getMonth(),
          date.getDate(),
          date.getHours(),
          date.getMinutes(),
          date.getSeconds()
        ));

    document.getElementById('time').innerHTML = utc.toLocaleTimeString();
  }

  setInterval(showTime, 1000);
</script>
                </div>
                {{-- {!!QrCodee::size(200)->generate('hai');!!} --}}
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
    @endsection
    @push('page-script')
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js" integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
    <script>
        //READ - Tampil Data
        $(document).ready(function () {
            $('#Schedules-table').DataTable({
                processing: true,
                serverside: true,
                ajax: {
                    url: "{{route('presences.index')}}",
                    type: 'GET'
                },
                columns: [{
                        data: 'schedule_id',
                        name: 'schedule_id'
                    },
                    {
                        data: 'classrooms.classroom_name',
                        name: 'classrooms.classroom_name'
                    },
                    {
                        data: 'courses.course_name',
                        name: 'courses.course_name'
                    },
                    {
                        data: 'classes.class_name',
                        name: 'classes.class_name'
                    },
                    {
                        data: 'lecturers.lecturer_name',
                        name: 'lecturers.lecturer_name'
                    },
                    {
                        data: 'schedule_start',
                        name: 'schedule_start'
                    },
                    {
                        data: 'schedule_end',
                        name: 'schedule_end'
                    },
                    {
                        data: 'schedule_day',
                        name: 'schedule_day'
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
    </script>
    @endpush