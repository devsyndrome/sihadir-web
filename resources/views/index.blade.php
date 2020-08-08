@extends('layouts.master')
@section('title','Home')
@section('user',Auth::user()->name)
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
            <img src="../assets/img/cic.png" alt="" width="400" height="200" srcset=""><hr>
            <h1>SiHadir <span class="badge badge-primary">Presence Manager</span></h1>
          </div>
          <div class="card-footer bg-whitesmoke text-center">
          <b>Security Computer Network '17</b>
          </div>
        </div>
      </div>  
  </div>
@endsection