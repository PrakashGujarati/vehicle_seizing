@extends('layouts.main')
@section('title', __('Vehicle Search List'))
@section('content')
<div class="main-content">
   <div class="row">
      <div class="col-md-6">
         <h5>Vehicle Search List</h5>
      </div>
   </div>
    <hr>
  

   
 
   <table id="example" class="table table-striped table-bordered datatable"  cellspacing="0" width="100%" id="data">
      <thead>
         <tr>
              <th>Name</th>
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
                "url" : "{{ route('VehicleSearchlist.datatables') }}",
                "type": "get",
            },
              columns: [
                  
                  {data: 'name', name: 'name'},
                  {data: 'action', name: 'action'},
              ]
          });

        
    });

  
</script>



@endsection