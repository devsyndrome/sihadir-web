@extends('layouts.master')
@section('title','STAFF')
@section('user','Arie Arbiansyah')
@push('link-asset')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')
<div class="section-header">
    <h1>Staffs</h1>
  </div>

  <div class="section-body">
    <div class="section-body">
        <div class="card">
          <div class="card-header">
          </div>
          <div class="card-body">
            <div class="text-center">
            <table id="staffs-table" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Birthdate</th>
                  <th>Birthplace</th>
                  <th>Gender</th>
                  <th>Addres</th>
                  <th>Phonenumber</th>
                  <th>E-mail</th>
                  <th>Action</th>
                </tr>
              </thead>
              {{-- <tbody>
                @foreach ($list_staffs as $data)
                    <tr>
                      <td>{{$data->staff_id}}</td>
                      <td>{{$data->staff_name}}</td>
                      <td>{{$data->staff_birthdate}}</td>
                      <td>{{$data->staff_birthplace}}</td>
                      <td>{{$data->staff_gender}}</td>
                      <td>{{$data->staff_address}}</td>
                      <td>{{$data->staff_phonenumber}}</td>
                      <td>{{$data->staff_email}}</td>
                      <td>{{$data->staff_email}}</td>
                    </tr>
                @endforeach
              </tbody> --}}
            </table>
          </div>
        </div>
      </div>  
  </div>
@endsection
@push('page-script')
  
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#staffs-table').DataTable({
        processing : true,
        serverside : true,
        ajax       :{
          url: "{{route('staffs.index')}}",
          type: 'GET'
        },
        columns: [
          {data: 'staff_id', name: 'staff_id'},
          {data: 'staff_name', name: 'staff_name'},
          {data: 'staff_birthdate', name: 'staff_birthdate'},
          {data: 'staff_birthplace', name: 'staff_birthplace'},
          {data: 'staff_gender', name: 'staff_gender'},
          {data: 'staff_address', name: 'staff_address'},
          {data: 'staff_phonenumber', name: 'staff_phonenumber'},
          {data: 'staff_email', name: 'staff_email'},
        ],
        order: [[0, 'asc']]
      });
    } );
  </script>
    
@endpush