@extends('layouts.main')
@section('title', __('Office Add'))
@section('css')
<style type="text/css">
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
							<label for="name">Branch Name</label>*				
							<input placeholder="Enter  office name"  maxlength="100" class="form-control" name="name" value="{{$OfficeEdit->name}}"  id="name"   type="text">				
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
							<label for="contact">Branch Code</label>	
							<input placeholder="Enter Branch Code" maxlength="100" class="form-control" name="branch_code" value="{{ $OfficeEdit->branch_code }}" id="branch_code" type="text">
							@error('branch_code')
							<span class="validation-msg">
								{{ $message }}
							</span>
							@enderror
							<div class="err"></div>	
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
							<div class="form-group">
							<label for="contact">Contact</label>				
							<input type="text" maxlength="10" class="form-control" placeholder="Enter contact"  rows="4" name="contact" value="{{ $OfficeEdit->contact }}" id="contact" onkeypress="return isNumberKey(event)">
							@error('contact')
							<span class="validation-msg">
								{{ $message }}
							</span>
							@enderror			
							<div class="err"></div>
						</div>
					</div>
					<div class="col-md-4">
							<div class="form-group">
							<label for="contact_person">Contact Person</label> *				
							<input class="form-control" placeholder="Enter contact person"  name="contact_person" maxlength="10" value="{{ $OfficeEdit->contact_person }}" id="contact_person" type="text" onkeypress="return isNumberKey(event)">
							@error('contact_person')
							<span class="validation-msg">
								{{ $message }}
							</span>
							@enderror			
								<div class="err"></div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="city">City</label> *				
							<input class="form-control"  placeholder="Enter city" maxlength="20" name="city" value="{{ $OfficeEdit->city }}" id="city" type="text">	
							@error('city')
							<span class="validation-msg">
								{{ $message }}
							</span>
							@enderror			
							<div class="err"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="contact">Branch</label>	
							<input placeholder="Enter Branch" class="form-control" name="branch" value="{{ $OfficeEdit->branch }}" id="branch" type="text">
							@error('branch')
							<span class="validation-msg">
								{{ $message }}
							</span>
							@enderror
							<div class="err"></div>	
						</div>
					</div>
					<div class="col-md-4">
							<div class="form-group">
							<label for="address">Address</label>				
							<textarea class="form-control" placeholder="Enter address" maxlength="
							200" rows="2" name="address1" id="address1">{{ $OfficeEdit->address1 }}</textarea>				
							@error('address1')
							<span class="validation-msg">
								{{ $message }}
							</span>
							@enderror
							<div class="err"></div>
						</div>
					</div>
				</div>
			

				<div class="row">
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