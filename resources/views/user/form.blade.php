@extends('layouts.main')
@section('title', __('User Add'))
@section('css')
<style type="text/css">
#email
{
	color:#494949!important;
}
#contact
{
	color:#494949!important;
}
#status
{
	color:#494949!important;
}
#role
{
	color:#494949!important;
}
</style>
@endsection
@section('content')

<div class="container">
	<div class="card">
		<div class="card-header">User Add</div>
		<div class="card-body">
			<form method="post" id="user_form" action="{{ route('user.store') }}">
    		@csrf
			<div class="row">
				<div class="col-md-4">
					<div class="field-group">
						<label for="name">Name</label> *<br>				
						<input class="form-control" onKeyPress="return ValidateAlpha(event);" placeholder="Enter name" maxlength="30" name="name" id="name" type="text">				
						@error('name')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="field-group">
						<label for="email">Email</label> *<br>				
						<input class="form-control" placeholder="Enter email"  class="strlo" name="email" id="email" type="email">				<div class="err"><div class="errorMessage" id="User_email_em_" style="display:none"></div></div>
						@error('email')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="field-group">
						<label for="password">Password</label> <a href="Javascript:void(0);" id="pwd_prompt"><i class="fas fa-eye"></i> Show Password</a> <br>				
						<input class="form-control" placeholder="Enter password" maxlength="50" name="password" id="password" type="password">				
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
						<input type="text" class="form-control" maxlength="10" name="contact" id="contact" placeholder="Enter contact" >
						<div class="err"><div class="errorMessage" id="User_contact_em_" style="display:none"></div></div>
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
							<option value="Active">Active</option>
							<option value="Inactive">Inactive</option>
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
						<select class="form-control" name="role" id="role" >
							<option value="" disabled="" selected="">Select Role</option>
							<option value="agent">Agent</option>
						</select>				<div class="err"><div class="errorMessage" id="User_status_em_" style="display:none"></div></div>
						@error('role')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div>
			</div>

			
			<div class="row mt-5">
				<div class="col-md-12">
					<input  class="btn cbtn btn-info" type="submit" name="submit" value="Save">
					<a href="{{ route('user.index') }}" class="btn cbtn btn-danger">cancel</a>
				</div>
			</div>	
		</form>
		</div> 
	</div>

 
</div>

	

@endsection


@section('onPageJs')
		
<script type="text/javascript">
	$(document).ready(function(){
		
		$("#pwd_prompt").click(function(){
			if($("#password").attr("type")=="password") {
				$("#password").attr("type","text");
				$(this).html('<i class="fas fa-eye-slash"></i> Hide Password');
			} else {
				$("#password").attr("type","password");
				$(this).html('<i class="fas fa-eye"></i> Show Password');
			}
			
		});
	});


	$("#user_form").validate({
		rules: {
			name: {
				required: true
			},
			email :{
				required: true,
	            	email: true
			},
			password:{
				required: true
			},
			contact: {
				minlength: 10,
				maxlength: 10,
				required: true
			},
			status :{
				required:true,
			},
			role :{
				required:true,
			},


		},
		messages: {
			name: {
				required: "Enter your username",
			},
			email:
			{
				required: "Email is a required field",
				email: "Improper email format"
			},
			password :{
				required: "Password is a required field",
			},
			contact: {
				required: "Manager Contact is a required field"
			},
			status :{
				required: "Status is a required field"
			},
			role :{
				required: "Status is a required field"
			}


		}
	});
</script>			

@endsection