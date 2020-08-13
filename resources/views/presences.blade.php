@extends('layouts.master')
@section('title','Home')
@section('user',Auth::user()->name)
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