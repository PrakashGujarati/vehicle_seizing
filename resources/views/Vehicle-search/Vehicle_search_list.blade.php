@extends('layouts.main')
@section('title', __('Vehicle Search List'))
@section('content')
<div class="main-content">
   <div class="row">
      <div class="col-md-6">
         <h5>Vehicle Search List</h5>
      </div>
      <div class="col-md-6">
         <div class="float-md-right">
           <a class="btn btn-primary btn-sm" href="{{ route('vehicle-searchlist.index') }}">Back</a>
         </div>
      </div>
   </div>
    <hr>
  

   
 
   <table id="example" class="table table-striped table-bordered datatable"   cellspacing="0" width="100%" id="data">
      <thead>
         <tr>
              <th>Agent Name</th>
              <th>Registration Number</th>
              <th>image</th>
              <th>Action</th>
         </tr>
        
   </table>
</div>

<input type="hidden" name="id" value="{{$GetID}}">

  
@endsection
@section('onPageJs')
 
<script type="text/javascript">
 
$(document).ready(function() {
var id = {{$GetID}};
 
    $('.successmessage').css('display','none');
     $('.dangermessage').css('display','none');
     
   $('.datatable').DataTable({
              processing: true,
              serverSide: true,
                "ajax": {
                "url" : "{{ route('VehicleSearchlistShow.datatables') }}",
                "type": "get",
                "data": {user_id: id},
            },
              columns: [
                  
                  {data: 'user_id', name: 'user_id'},
                  {data: 'regd_num', name: 'regd_num'},
                  {data: 'map', name: 'map'},
                  {data: 'image', name: 'image'},
              ]
          });

        
    });
  
</script>

@endsection