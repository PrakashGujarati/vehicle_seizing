@extends('layouts.main')
@section('title', __('User List'))
@section('content')
<div class="main-content">
   <div class="row">
      <div class="col-md-6">
         <h5>User List</h5>
      </div>
      <div class="col-md-6">
         <div class="float-md-right">
           <a class="btn btn-primary btn-sm" href="{{ route('user.create') }}">New User Add</a>
         </div>
      </div>
   </div>
    <hr>

 
   <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%" id="data">
      <thead>
         <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Imei</th>
              <th>Role</th>
              <th>Status</th>
              <th>Action</th>
         </tr>
         
      </thead>
   </table>
</div>
  
@endsection
@section('onPageJs')
 
<script type="text/javascript">
  


$(document).ready(function() {
    $('.successmessage').css('display','none');
     $('.dangermessage').css('display','none');
   $('.datatable').DataTable({
              processing: true,
              serverSide: true,
                "ajax": {
                "url" : "{{ route('user.datatables') }}",
                "type": "get",
            },
              columns: [
                  {data: 'name', name: 'name'},
                  {data: 'email', name: 'email'},
                  {data: 'contact', name: 'contact'},
                  {data: 'imei', name: 'imei'},
                  {data: 'role', name: 'role'},
                  {data: 'status', name: 'status'},
                  {data: 'action', name: 'action'},
              ]
          });

        
    });


</script>

@endsection