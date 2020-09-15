@extends('layouts.main')
@section('title', __('form.customers'))
@section('content')
<div class="main-content">
   <div class="row">
      <div class="col-md-6">
         <h5>HeadOffice</h5>
      </div>
      <div class="col-md-6">
         <div class="float-md-right">
           <a class="btn btn-primary btn-sm" href="{{ route('headoffice.create') }}">New HeadOffice Add</a>
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
              <th>Vendor Code</th>
              <th>City</th>
              <th>Contact Person</th>
              <th>Address 1</th>
              <th>Address 2</th>
              <th>Contact</th>
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
      url : '{{ route('headoffice.search') }}',
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