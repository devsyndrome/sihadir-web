@extends('layouts.master')
@section('title','Report')
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
    <h1>Courses</h1>
</div>
<div class="section-body">
    <div class="section-body">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="text-center">
                    <h1>Presences <span class="badge badge-primary">Report</span></h1>
                    <h3>{{Carbon\Carbon::now()->format('d F Y')}}</h3><hr>

                </div>
                {{-- {!!QrCodee::size(200)->generate('hai');!!} --}}
                <table id="Schedules-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Course</th>
                            <th>Students</th>
                            <th>Class</th>
                            <th>Semester</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Day</th>
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
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script>
        //READ - Tampil Data
        $(document).ready(function () {
            $('#Schedules-table').DataTable({
                dom: 'Bfrtip',
        buttons: [
            'print'
        ],
                processing: true,
                serverside: true,
                ajax: {
                    url: "{{route('presences.index')}}",
                    type: 'GET'
                },
                columns: [{
                        data: 'presence_id',
                        name: 'presence_id'
                    },
                    {
                        data: 'generator_date',
                        name: 'generator_date'
                    },
                    {
                        data: 'presence_time',
                        name: 'presence_time'
                    },
                    {
                        data: 'course_name',
                        name: 'course_name'
                    },
                    {
                        data: 'student_name',
                        name: 'student_name'
                    },
                    {
                        data: 'class_name',
                        name: 'class_name'
                    },
                    {
                        data: 'class_semester',
                        name: 'class_semester'
                    },
                    {
                        data: 'schedules.schedule_start',
                        name: 'schedules.schedule_start'
                    },
                    {
                        data: 'schedules.schedule_end',
                        name: 'schedules.schedule_end'
                    },
                    {
                        data: 'schedules.schedule_day',
                        name: 'schedules.schedule_day'
                    },
                ],
                order: [
                    [0, 'desc']
                ],
               
            });
        });

        $('body').on('click', '.generator', function () {
            var data_id = $(this).data('id');
            $.get('presences/' + data_id + '/edit', function (data) {})
        });
    </script>
    @endpush