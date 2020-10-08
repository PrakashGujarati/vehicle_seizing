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
  

   
 
   <table id="example" class="table table-striped table-bordered"  cellspacing="0" width="100%" id="data">
      <thead>
         <tr>
              <th>Agent Name</th>
              <th>Registration Number</th>
              <th>image</th>
              <th>Action</th>
         </tr>
         <tbody>
           @foreach ($Vehicles as $Vehicle)
           <tr>
             <td>
                  {{ isset($Vehicle->agentname->name) ? $Vehicle->agentname->name:'' }}
             </td>
             <td>
              {{ isset($Vehicle->regd_num) ? $Vehicle->regd_num:'' }}
             </td>
             <td>
              @if($Vehicle->image)
                 <center>
                    <img src="{{asset('uploads/vehicle')}}/{{$Vehicle->image}}" style="height:50px;">
                </center>
              @endif
             </td>
             <td>
              <a title="Edit" href="{{ route('vehicle.map',$Vehicle->id) }}">
                <i class="fa fa-map-marker"></i>
              </a>
            </td>

          </tr>
         @endforeach
        </tbody>
      </thead>
   </table>
</div>
  
@endsection
@section('onPageJs')
 
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
  
</script>

@endsection