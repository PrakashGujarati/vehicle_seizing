@extends('layouts.main')
@section('title', __('User Edit'))
@section('css')
<style type="text/css">

</style>
@endsection
@section('content')

<div class="container">
	<div class="card">
		<div class="card-header">User Edit</div>
		<div class="card-body">
		<form method="post" action="{{ route('user.update',$UserEdit->id) }}">
	    	@csrf
	    	@method('PUT')
    		<input type="hidden" name="hidden_id" value="{{$UserEdit->id}}" placeholder="">
			<div class="row">
				<div class="col-md-4">
					<div class="field-group">
						<label for="name">Name</label> *<br>				
						<input class="form-control" placeholder="Enter name" maxlength="30" name="name" id="name" value="{{$UserEdit->name}}" type="text">				
						@error('name')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="field-group">
						<label for="username">Email</label> *<br>				
						<input class="form-control" placeholder="Enter email"  class="strlo" name="email" value="{{$UserEdit->email}}" id="email" type="email">				<div class="err"><div class="errorMessage" id="User_email_em_" style="display:none"></div></div>
						@error('email')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="field-group">
						<label for="password">Password :</label> 
						<input type="checkbox" class="pwd_chang" name="pwd_chang" id="pwd_chang" value="0">
						Chang Password  <br>				
						<input class="form-control" placeholder="Enter password" maxlength="50" name="password" id="password"  type="password">				
						<div class="err"><div class="errorMessage" id="password_em_" style="display:none"></div></div>
						@error('password')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div>
			</div>
			<div class="row">
			

				<div class="col-md-4">
					<div class="field-group">
						<label for="contact">Contact</label><br>
						<input type="text" class="form-control" name="contact" id="contact" placeholder="Enter contact" value="{{$UserEdit->contact}}">
	
						@error('contact')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div>
				<div class="col-md-4">
					<div class="field-group">
						<label for="User_status">Status</label> *<br>				
						<select class="form-control" name="status" id="status">
							<option value="" disabled="" selected="">Select Status</option>
							<option @if($UserEdit->status =="Active") {{"selected"}} @endif value="Active">Active</option>
							<option @if($UserEdit->status =="Inactive") {{"selected"}} @endif value="Inactive">Inactive</option>
						</select>				<div class="err"><div class="errorMessage" id="User_status_em_" style="display:none"></div></div>
						@error('status')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div>
				<div class="col-md-4">
					<div class="field-group">
						<label for="User_status">Role</label> *<br>				
						<select class="form-control" name="role" id="role">
							<option value="" disabled="" selected="">Select Role</option>
							<option @if($UserEdit->role =="agent") {{"selected"}} @endif value="agent" value="agent">Agent</option>
						</select>				<div class="err"><div class="errorMessage" id="User_status_em_" style="display:none"></div></div>
						@error('role')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 my-5 text-center">
					<input  class="btn cbtn btn-primary" type="submit" name="submit" value="Save">
				</div>
			</div>	
		</form>
		</div> 
	</div>


</div>

	

@endsection


@section('onPageJs')


<script type="text/javascript">



$(document).ready(function () {
    $('#password').attr('disabled', 'disabled');
});




$(".pwd_chang").click(function () {
    var value = this.value;
    if (value == "0") {
        $('#password').removeAttr('disabled');
        this.value = "1"
    } else {
       	$('#password').attr('disabled', 'disabled');
        this.value = "0"
        
    }
});




</script>


@endsection