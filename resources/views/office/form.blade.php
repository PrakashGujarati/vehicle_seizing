@extends('layouts.main')
@section('title', __('Branch Office Add'))
@section('css')
<style type="text/css" media="screen">
#head_office_id
{
	color:#494949!important;
}
#contact
{
	color:#494949!important;
}	
#contact_person
{
	color:#494949!important;
	
}
</style>
@endsection
@section('content')

<div class="container">
	<div class="card">
		<div class="card-header">Branch Office Add</div>
		<div class="card-body">
			<form method="post" id="Officeform" action="{{ route('office.store') }}">
				@csrf

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="contact_person">Finance Office Name</label> *	
							<select class="form-control"  name="head_office_id" id="head_office_id" >
								<option value="" disabled="" selected="">Select head Office</option>
								@foreach ($headOfficesname as $hOfficesname)
								<option value="{{$hOfficesname->id}}">{{$hOfficesname->finance_company_name}} Branch Code -{{$hOfficesname->branch_code}}</option>
								@endforeach
							</select>			
							@error('head_office_id')
							<span class="validation-msg">
								{{ $message }}
							</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="branch_code">Branch Code</label> *				
							<input class="form-control" placeholder="Enter Branch code" maxlength="30" value="{{ old('branch_code') }}" name="branch_code" id="branch_code" type="text">
							@error('branch_code')
							<span style="color:#dc3545">
								<strong>{{ $message }}</strong>
							</span>
							@enderror	
						</div>
					</div>
					<div class="col-md-4">
							<div class="form-group">
							<label for="name">Branch Name</label>*				
							<input placeholder="Enter  office name" onKeyPress="return ValidateAlpha(event);"  maxlength="100" class="form-control" name="name"  value="{{ old('finance_company_name') }}"  id="name"   type="text">				
							<div class="err"></div>
							@error('name')
							<span class="validation-msg">
								{{ $message }}
							</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="branch_contact">Branch Contact Number</label>			<input type="text" class="form-control" placeholder="Enter contact" maxlength="10" name="branch_contact" value="{{ old('branch_contact') }}" onkeypress="return isNumberKey(event)" id="branch_contact">	

							@error('branch_contact')
							<span style="color:#dc3545">
								<strong>{{ $message }}</strong>
							</span>
							@enderror	
						</div>
					</div>
				</div>	
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="branch_email">Branch Email</label>
							<input type="text" class="form-control" placeholder="Enter Branch Email" maxlength="200" name="branch_email" value="{{ old('branch_email') }}" id="branch_email">	
							@error('branch_email')
							<span style="color:#dc3545">
								<strong>{{ $message }}</strong>

							<div class="form-group">
								<label for="contact">Contact</label>				
								<input type="text"  class="form-control" placeholder="Enter contact"  rows="4" maxlength="10" name="contact" value="{{ old('contact') }}" id="contact" onkeypress="return isNumberKey(event)">
								@error('contact')
								<span class="validation-msg">
									{{ $message }}
								</span>
								@enderror
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
								<label for="city">Branch City</label> *				
								<input class="form-control"  placeholder="Enter city" maxlength="20" name="city" value="{{ old('city') }}" id="city" type="text">				
								@error('city')
								<span style="color:#dc3545">
									<strong>{{ $message }}</strong>
								<div class="form-group">
								<label for="contact_person">Contact Person</label> *				
								<input class="form-control" placeholder="Enter contact person"  name="contact_person" maxlength="10" value="{{ old('contact_person') }}" id="contact_person" type="text" onkeypress="return isNumberKey(event)">
								@error('contact_person')
								<span class="validation-msg">
									{{ $message }}
								</span>
								@enderror	
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="branch_address">Branch Address</label>				
							<textarea class="form-control" placeholder="Branch Address" maxlength="200" value="{{ old('branch_address') }}" rows="2" name="branch_address" id="branch_address"></textarea>
							@error('branch_address')
							<span style="color:#dc3545">
								<strong>{{ $message }}</strong>
							</span>
							@enderror		
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="assigned_manager">Assigned Manager</label> *
							<input class="form-control" placeholder="Enter Assigned Manager" maxlength="50" name="assigned_manager" id="assigned_manager" value="{{ old('assigned_manager') }}" type="text">
							@error('assigned_manager')
							<span style="color:#dc3545">
								<strong>{{ $message }}</strong>
							</span>
							@enderror	
							<div class="err"></div>
						</div>		
					</div>	
					<div class="col-md-4">
						<div class="form-group">
							<label for="manager_contact">Manager Contact</label> *
							<input class="form-control" placeholder="Enter Manager Contact" value="{{ old('manager_contact') }}" maxlength="10" onkeypress="return isNumberKey(event)" name="manager_contact" id="manager_contact" type="text">
							@error('manager_contact')
							<span style="color:#dc3545">
								<strong>{{ $message }}</strong>
							</span>
							@enderror	
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="manage_email">Manage Email</label> *
							<input class="form-control" placeholder="Enter Manage Email" maxlength="50" name="manage_email" id="manage_email" value="{{ old('manage_email') }}" type="text">
							@error('manage_email')
							<span style="color:#dc3545">
								<strong>{{ $message }}</strong>
							</span>
							@enderror	
						</div>		
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label for="gst">GST No</label>	
						<input class="form-control" placeholder="Enter gstno" maxlength="50" value="{{ old('gst') }}" rows="4" name="gst" id="gst" type="text">
						@error('gst')
						<span style="color:#dc3545">
							<strong>{{ $message }}</strong>
						</span>
						@enderror		
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-md-12">
						<input  class="btn cbtn btn-info" type="submit" name="submit" value="Save">
						<a href="{{ route('office.index') }}" class="btn cbtn btn-danger">cancel</a>
					</div>
				</div>	
			</form>
		</div> 
	</div>
</div>
@endsection


@section('onPageJs')

<script type="text/javascript">

	$(function() {
		$("#Officeform").validate({
			rules: {
				name: {
					required: true
				},
			contact_person: {
				required: true,
				minlength: 10,
				maxlength: 10
			},
			branch_code:{
				required: true	
			},
			branch_contact: {
				minlength: 10,
				maxlength: 10,
				required: true
			},
			branch_email :{
				required: true,
	            	email: true
			},
			city:{
				required: true	
			},
			branch_address:{
				required: true
			},
			assigned_manager:{
				required :true
			},
			manager_contact: {
				minlength: 10,
				maxlength: 10,
				required: true
			},
			manage_email :{
				required:true,
				email: true
			},
			gst :{
				required:true,
			},
		},
		messages: {
		
			finance_company_name: {
				required: "Finance Company Name is a required field",
			},
			contact_person: {
				required: "Person Contact is a required field"
			},
			branch_code: {
				required: "Branch Code is a required field"
			},
			branch_contact: {
				required: "Contact is a required field"
			},
			branch_email:
			{
				required: "Branch Email is a required field",
				email: "Improper email format"
			},
			city:{
				required: "City is a required field"
			},
			branch_address: {
				required: "Branch Address is a required field"
			},
			assigned_manager :{
				required: "Assigned Manager is a required field"
			},
			manager_contact: {
				required: "Manager Contact is a required field"
			},
			manage_email : {
				required: "Manage Email is a required field",
				email: "Improper email format"
			},
			gst : {
				required: "Gst is a required field"
			}


	$("#Officeform").validate({
		rules: {
			name: {
				required: true
			},
			contact_person: {
				required: true,
				minlength: 10,
				maxlength: 10
			},
			head_office_id:{
				required: true	
			},
			branch_code:{
				required: true	
			},
			contact: {
				minlength: 10,
				maxlength: 10,
				required: true
			},
			city:{
				required: true	
			},
			branch :{
				required: true	
			},
			address1:{
				required: true
			}

		},
		messages: {
			name: {
				required: "Enter your username",
			},
			contact_person: {
				required: "Person Contact is a required field"
			},
			head_office_id:{
				required: "Head Office Name is a required field"
			},
			branch_code: {
				required: "Branch Code is a required field"
			},
			contact: {
				required: "Contact is a required field"
			},
			city:{
				required: "City is a required field"
			},
			branch:{
				required: "Branch is a required field"
			},

			address1: {
				required: "Address is a required field"
			},

		}
	});

</script>


@endsection