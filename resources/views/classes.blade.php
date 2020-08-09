@extends('layouts.master')
@section('title','Home')
@section('user','Arie Arbiansyah')
@section('content')
<div class="section-header">
    <h1>Welcome</h1>
  </div>

  <div class="section-body">
    <div class="section-body">
        <div class="card">
          <div class="card-header">
          </div>
          <div class="card-body">
            <div class="text-center">
            <h1>KELAS <span class="badge badge-primary">Attendance Manager</span></h1>
          </div>
          <div class="card-footer bg-whitesmoke text-center">
          <b>Security Computer Network '17 - {{ Auth::user()->level}}</b>
          </div>
        </div>
      </div>  
  </div>
@endsection