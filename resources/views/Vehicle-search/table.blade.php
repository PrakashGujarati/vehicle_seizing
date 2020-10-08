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
  

   
 
   <table id="example" class="table table-striped table-bordered"  cellspacing="0" width="100%" id="data">
      <thead>
         <tr>
              <th>Name</th>
              <th>Action</th>
         </tr>
         <tbody>
           @foreach ($userdata as $user)
           <tr>
             <td>
                <a title="Vehicle Search List" href="{{ route('vehicle-searchlist.show',$user->id) }}">
                  {{ isset($user->name) ? $user->name:'' }}
                </a>
             </td>
             <td>
              <a title="Vehicle Search List" href="{{ route('vehicle-searchlist.show',$user->id) }}">
                <i class="fas fa-eye"></i>
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