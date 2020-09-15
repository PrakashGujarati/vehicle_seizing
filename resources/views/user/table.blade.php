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
              <th>Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Role</th>
              <th>Status</th>
              <th>Action</th>
         </tr>
         <tbody class="user_table_dynamic">
            @include('user.dynamic_user_table')
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
      url : '{{ route('user.search') }}',
      data: {
              "s":myInput,
            },
      success:function(data){
         $('.user_table_dynamic').html(data.data);
              tableScript();
      }
    });
  })
</script>

@endsection