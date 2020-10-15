@extends('layouts.main')
@section('title', __('Finance Office Add'))
@section('css')
<style type="text/css">

</style>
@endsection
@section('content')

<div class="container">
	<div class="card">
		<div class="card-header">Finance Office</div>
		<div class="card-body">
			<form method="post" action="{{ route('finance-office.store') }}">
				@csrf
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="finance_company_name">Finance Company Name</label>*				
							<input placeholder="Enter head office name" maxlength="100" class="form-control" name="finance_company_name" value="{{ old('finance_company_name') }}" id="finance_company_name"
							type="text">
							@error('finance_company_name')
							<span style="color:#dc3545">
								<strong>{{ $message }}</strong>
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
							</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="city">Branch City</label> *				
							<input class="form-control"  placeholder="Enter city" maxlength="20" name="city" value="{{ old('city') }}" id="city" type="text">				
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

				<div class="row">
					<div class="col-md-12 my-5">
						<input  class="btn cbtn btn-info" type="submit" name="submit" value="Save">
						<a href="{{ route('finance-office.index') }}" class="btn cbtn btn-danger"> Cancel </a>
					</div>
				</div>	
			</form>
		</div> 
	</div>


</div>



@endsection


@section('innerPageJS')


@endsection