@extends('layouts.main')
@section('title', __('User List'))
@section('content')
<div class="main-content">
   <div class="row">
      <div class="col-md-6">
         <h5>Subscription List</h5>
      </div>
      <div class="col-md-6">
         <div class="float-md-right">
           <a class="btn btn-primary btn-sm" href="{{ route('subscribers.create') }}">New Subscription Add</a>
         </div>
      </div>
   </div>
    <hr>
  
   
 
   <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%" id="data">
      <thead>
         <tr>
              <th>User Name</th>
              <th>Days</th>
              <th>Amount</th>
              <th>Payment Status</th>
              <th>Payment Mode</th>
              <th>Notes</th>
             {{--  <th>Action</th> --}}
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
                "url" : "{{ route('subscribers.datatables') }}",
                "type": "get",
            },
              columns: [
                  {data: 'user_id', name: 'user_id'},
                  {data: 'days', name: 'days'},
                  {data: 'amount', name: 'amount'},
                  {data: 'payment_status', name: 'payment_status'},
                  {data: 'payment_mode', name: 'payment_mode'},
                  {data: 'notes', name: 'notes'},
                 
              ]
          });

        
    });
</script>

@endsection