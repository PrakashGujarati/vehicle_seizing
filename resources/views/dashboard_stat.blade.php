@extends('layouts.main')
@section('title', __('Dashboard'))
@section('css')
<style type="text/css" media="screen">
.icon
{
	 font-size: 50px;
}
</style>
@endsection

@section('content')
<div class="">
		<div class="col-md-12">
		<div class="row">
	        @if( Auth::user()->name == "Admin")
			<div class="col-md-4">
				<div class="card">
				  <div class="card-body">
				  	<center>
				  		<a href="{{ route('user.index') }}" >
				  			<i style="color:#0CC27E" class="fas fa-users icon"></i><br>
				    		<b style="color:#0CC27E">Active Agents ({{ isset($UserActiveCount) ? $UserActiveCount:'0' }})</b>
				    	</a>
				    </center>
				  </div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<center>
							<a href="#" >
				  				<i style="color:#FF586B;" class="fas fa-user-times icon"></i><br>
								<b style="color:#FF586B;">Inactive Agents({{ isset($UserInactiveCount) ? $UserInactiveCount:'0' }})</b>
							</a>
						</center>
					</div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="card">
				  <div class="card-body">
				  	<center>
				  		<a href="{{ route('Vehicle.index') }}" >
				  			<i class="fa fa-car icon"></i><br>
				    		<b>Total Vehicles ({{ isset($VehicleCount) ? $VehicleCount:'0' }})</b>
				   		 </a>
				    </center>
				  </div>
				</div>
			</div>

			@endif
	        @if( Auth::user()->role == "agent")
	        	<div class="col-md-4">
				<div class="card">
				  <div class="card-body">
				  	<center>
				  		<a href="{{ route('agentview.index') }}" >
				  			<i class="fa fa-car icon"></i><br>
				    		<b>Total Vehicles ({{ isset($VehicleCount) ? $VehicleCount:'0' }})</b>
				   		 </a>
				    </center>
				  </div>
				</div>
			</div>
			@endif
		</div>
		<div class="row mt-3">
	        @if( Auth::user()->name == "Admin")
	        <div class="col-md-4">
	        	<div class="card">
	        		<div class="card-body">
	        			<center>
	        				<a href="{{ route('finance-office.index') }}" >
	        					<i class="fa fa-building icon"></i><br>
	        					<b>Total Head Office ({{ isset($HeadOfficeCount) ? $HeadOfficeCount:'0' }})</b>
	        				</a>
	        			</center>
	        		</div>
	        	</div>
	        </div>
			@endif
		</div>

		
	</div>
</div>
 @if( Auth::user()->name == "Admin")
<div class="main-content mt-5">
<h2>Agent List</h2>
<hr>

<div class="col-md-12">
	<table class="table table-striped table-bordered"  cellspacing="0" width="100%" id="example">
      <thead>
         <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Role</th>
              <th>Status</th>
         </tr>
         <tbody>
         	@foreach ($Users as $user)
        	 <tr>
          		  <td>{{ isset($user->name) ? $user->name:'' }}</td>
				  <td>{{ isset($user->email) ? $user->email:'' }}</td>
				  <td>{{ isset($user->contact) ? $user->contact:'' }}</td>
				  <td>{{ isset($user->role) ? $user->role:'' }}</td>

			  <td>
			    @if ($user->status=="Active")
			        <span style="background:#0CC27E;color: white;padding: 2px;border-radius: 5px;padding: 5px">Active</span>
			        @else
			        <span style="background:#FF586B;padding: 2px;color: white;border-radius: 5px;padding: 5px">Inactive</span>
			    @endif
			</td>
             </tr>
         	@endforeach
         
        </tbody>
      </thead>
   </table>
	
</div>
</div>
@endif
  
@endsection
@section('onPageJs')
 <script type="text/javascript">
 	$(document).ready(function() {
    $('#example').DataTable();
} );
 </script>

@endsection