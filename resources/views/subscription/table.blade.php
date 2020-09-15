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
  
  <div class="row">
      <div class="col-md-12">
         <div class="float-md-right">
          <div class="input-group ">
               <input type="text" class="searchString form-control" name="s" id="search"  placeholder="Search..." id="myInput"  autocompelete="false"> 
            </div><br>
         </div>
      </div>
   </div>
   
 
   <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="data">
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
         <tbody class="subscription_table_dynamic">
            @include('subscription.dynamic_subscription_table')
        </tbody>
      </thead>
   </table>
</div>
  
@endsection
@section('onPageJs')
 
<script type="text/javascript">
  
$('#search').on('keyup',function(){
    var myInput=$(this).val();
    $.ajax({
      type : 'get',
      url : '{{ route('subscription.search') }}',
      data: {
              "s":myInput,
            },
      success:function(data){
         $('.subscription_table_dynamic').html(data.data);
              tableScript();
      }
    });
  })
</script>

@endsection