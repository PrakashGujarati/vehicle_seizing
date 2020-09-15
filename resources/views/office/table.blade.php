@extends('layouts.main')
@section('title', __('Office'))
@section('content')
<div class="main-content">
   <div class="row">
      <div class="col-md-6">
         <h5>Office</h5>
      </div>
      <div class="col-md-6">
         <div class="float-md-right">
           <a class="btn btn-primary btn-sm" href="{{ route('office.create') }}">New Office Add</a>
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
              <th>Head Office Name</th>
              <th>Name</th>
              <th>Contact Person</th>
              <th>Contact</th>
              <th>Address</th>
              <th>City</th>
              <th>Branch Code</th>
              <th>Branch</th>
              <th>Action</th>
         </tr>
         
          <tbody class=".office.dynamic_office_table">
            @include('office.dynamic_office_table')
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
      url : '{{ route('office.search') }}',
      data: {
              "s":myInput,
            },
      success:function(data){
         $('.dynamic_office_table').html(data.data);
              tableScript();
      }
    });
  })


</script>


@endsection