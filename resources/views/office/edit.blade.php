@extends('layouts.main')
@section('title', __('Office Add'))
@section('css')
<style type="text/css" media="screen">
#head_office_id
{
	color:#494949!important;
}
#branch_email
{
	color:#494949!important;
}
#branch_contact
{
	color:#494949!important;

}
#manager_contact
{
	color:#494949!important;

}
#manage_email
{
	color:#494949!important;

}
</style>
@endsection
@section('content')

<div class="container">
	<div class="card">
		<div class="card-header">Branch Office Edit</div>
		<div class="card-body">
			<form method="post" id="Officeform" action="{{ route('office.update',$OfficeEdit->id) }}">
	    	@csrf
	    	@method('PUT')
	    	<input type="hidden" name="hidden_id" value="{{$OfficeEdit->id}}" placeholder="">

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="contact_person">Finance Office Name</label> *	
							<select class="form-control" name="head_office_id" id="head_office_id">
							<option value="" disabled="">Select head Office</option>
							@foreach ($headOfficesname as $hOfficesname)
								<option @if($hOfficesname->id == $OfficeEdit->head_office_id) {{"selected"}} @endif value="{{$hOfficesname->id}}">{{$hOfficesname->finance_company_name}} Branch Code -{{$hOfficesname->branch_code}}</option>
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
							<input class="form-control" placeholder="Enter Branch code" maxlength="30" value="{{ $OfficeEdit->branch_code }}" name="branch_code" id="branch_code" type="text">
							@error('branch_code')
							<span style="color:#dc3545">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="branch_contact">Branch Contact Number</label>			<input type="text" class="form-control" placeholder="Enter contact" maxlength="10" name="branch_contact" value="{{ $OfficeEdit->branch_contact }}" onkeypress="return isNumberKey(event)" id="branch_contact">	

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
							<input type="text" class="form-control" placeholder="Enter Branch Email" maxlength="200" name="branch_email" value="{{ $OfficeEdit->branch_email }}" id="branch_email">	
							@error('branch_email')
							<span style="color:#dc3545">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="city">Branch City</label> *				
							<input class="form-control"  placeholder="Enter city" maxlength="20" name="city" value="{{ $OfficeEdit->city }}" id="city" type="text">				
							@error('city')
							<span style="color:#dc3545">
								<strong>{{ $message }}</strong>
							</span>
							@enderror	
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="branch_address">Branch Address</label>				
							<textarea class="form-control" placeholder="Branch Address" maxlength="200"  rows="2" name="branch_address" id="branch_address"> {{ $OfficeEdit->branch_address }}</textarea>
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
							<input class="form-control" placeholder="Enter Assigned Manager" maxlength="50" name="assigned_manager" id="assigned_manager" value="{{ $OfficeEdit->assigned_manager }}" type="text">
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
							<input class="form-control" placeholder="Enter Manager Contact" value="{{ $OfficeEdit->manager_contact }}" maxlength="10" onkeypress="return isNumberKey(event)" name="manager_contact" id="manager_contact" type="text">
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
							<input class="form-control" placeholder="Enter Manage Email" maxlength="50" name="manage_email" id="manage_email" value="{{ $OfficeEdit->manage_email }}" type="text">
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
						<input class="form-control" placeholder="Enter gstno" maxlength="50" value="{{ $OfficeEdit->gst }}" rows="4" name="gst" id="gst" type="text">
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

	$("#Officeform").validate({
			rules: {
			head_office_id: {
				required: true,

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
		
			head_office_id: {
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

		}
	});


</script>


@endsection