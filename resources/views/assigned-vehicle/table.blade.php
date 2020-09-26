@extends('layouts.main')
@section('title', __('Vehicle List'))
@section('content')
<div class="main-content">
<div class="alert alert-success successmessage"></div>
<div class="alert alert-danger dangermessage"></div>
<div class="row">
    <div class="col-md-12">
        @if(Session::has('message-success'))
        <div class="alert alert-success">{{Session::get('message-success')}}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @if(Session::has('message-danger'))
        <div class="alert alert-danger">{{Session::get('message-danger')}}</div>
        @endif
    </div>
</div>

   <div class="row">
      <div class="col-md-6">
         <h5>Assigned Vehicle List</h5>
      </div>
   </div>
    <hr>
    {{--  <div class="row">
      <div class="col-md-12">
         <div class="float-md-right">
          <div class="input-group ">
               <input type="text" class="searchString form-control" name="s" id="search"  placeholder="Search..." id="myInput"  autocompelete="false"> 
            </div><br>
         </div>
      </di1v>
   </div>
   --}}



   <div class="row d-flex">
      <div class="col-md-4 text-right d-flex">
        <select name="user_id" id="user_id" class="form-control user_id">
          <option value="" disabled="" selected="">Select User</option>
          @foreach ($userdata as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <br>
    <div class="vehicle_table_dynamic">
             @include('assigned-vehicle.dynamic_vehicle_table')
    </div>
    
    
</div>
  
@endsection
@section('onPageJs')
 
<script type="text/javascript">

$(document).ready(function() {
        /*$('#myTable').DataTable();*/
        $('.successmessage').css('display','none');
        $('.dangermessage').css('display','none');

        
    });

$('.user_id').change(function() {    
        var user_id = $(this).children("option:selected").val();

          if(user_id)
          {
                $.ajax({
                  url: "{{ route('assigned-vehicle-display') }}",
                  type:"POST",
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  data:{
                      "user_id":user_id,
                  },
                  cache: false,
                  success: function(data){

                    if(data.msg)
                    {
                         $('.vehicle_table_dynamic').html(data.data);
                         $('.dangermessage').css('display','block');
                          $('.dangermessage').html(data.msg);
                          $('.dangermessage').delay(5000).fadeOut(800);
                    }
                    else
                    {
                      $('.vehicle_table_dynamic').html(data.data);
                    }
                
                }
            });
          }
          else
          {
            alert("no");
          }
});


</script>


@endsection