@extends('layouts.main')
@section('title', __('Finance Office'))
@section('content')
<div class="main-content">
   <div class="row">
      <div class="col-md-6">
         <h5>Finance Office</h5>
      </div>
      <div class="col-md-6">
         <div class="float-md-right">
           <a class="btn btn-primary btn-sm" href="{{ route('finance-office.create') }}">New Finance Office Add</a>
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
              <th>Finance Company Name</th>
              <th>Branch Code</th>
              <th>Assigned Manager</th>
              <th>Branch Address</th>
              <th>Branch Email</th>
              <th>city</th>
              <th>Branch Contact</th>
              <th>Manage Email</th>
              <th>Manager Contact</th>
              <th>Gst</th>
              <th>Action</th>
         </tr>
         <tbody class="headoffices_table_dynamic">
            @include('headoffices.dynamic_headoffice_table')
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
      url : '{{ route('finance-office.search') }}',
      data: {
              "s":myInput,
            },
      success:function(data){
         $('.headoffices_table_dynamic').html(data.data);
              tableScript();
      }
    });
  })
</script>

@endsection