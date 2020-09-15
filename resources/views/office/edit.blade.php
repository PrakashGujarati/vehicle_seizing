@extends('layouts.main')
@section('title', __('Office Add'))
@section('css')
<style type="text/css">

</style>
@endsection
@section('content')

<div class="container">
	<div class="card">
		<div class="card-header">Office Edit</div>
		<div class="card-body">
			<form method="post" id="Officeform" action="{{ route('office.update',$OfficeEdit->id) }}">
	    	@csrf
	    	@method('PUT')
	    	<input type="hidden" name="hidden_id" value="{{$OfficeEdit->id}}" placeholder="">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Name</label>*				
						<input placeholder="Enter office name" maxlength="100" class="form-control" name="name" id="name" value="{{$OfficeEdit->name}}"  type="text">		
						@error('name')
                            <span class="validation-msg">
                                {{ $message }}
                            </span>
                         @enderror
								<div class="err"></div>
					</div>

					<div class="form-group">
						<label for="contact_person">Contact Person</label> *				
						<input class="form-control" onkeypress="return isNumberKey(event)" placeholder="Enter contact person" maxlength="50" name="contact_person" value="{{$OfficeEdit->contact_person}}" id="contact_person" type="text">
						@error('contact_person')
                            <span class="validation-msg">
                                {{ $message }}
                            </span>
                         @enderror				<div class="err"></div>
					</div>

				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="contact">Contact</label>				
						<textarea class="form-control" onkeypress="return isNumberKey(event)" placeholder="Enter contact" maxlength="100" rows="4" name="contact" id="contact">{{$OfficeEdit->contact}}</textarea>				
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
						<label for="address">Address</label>				
						<textarea class="form-control" placeholder="Enter address" maxlength="200" rows="4" name="address1" id="address1">{{$OfficeEdit->address1}}</textarea>
						@error('address1')
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
						<input class="form-control"  placeholder="Enter city" maxlength="20" value="{{$OfficeEdit->city}}" name="city" id="city" type="text">				
						@error('city')
                            <span class="validation-msg">
                                {{ $message }}
                            </span>
                         @enderror
						<div class="err"></div>
					</div>

					<div class="form-group">
						<label for="contact_person">head Office Name</label> *	
						<select class="form-control" name="head_office_id" id="head_office_id">
							<option value="" disabled="">Select head Office</option>
							@foreach ($headOfficesname as $hOfficesname)
								<option @if($hOfficesname->id == $OfficeEdit->head_office_id) {{"selected"}} @endif value="{{$hOfficesname->id}}">{{$hOfficesname->name}}</option>
							@endforeach
						</select>	
						@error('head_office_id')
                            <span class="validation-msg">
                                {{ $message }}
                            </span>
                         @enderror		
						<div class="err"></div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="contact">Branch Code</label>	
						<input placeholder="Enter Branch Code" maxlength="100" class="form-control" name="branch_code" value="{{$OfficeEdit->branch_code}}" id="branch_code" type="text">
						@error('branch_code')
                            <span class="validation-msg">
                                {{ $message }}
                            </span>
                         @enderror
						<div class="err"></div>	
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="contact">Branch</label>	
						<input placeholder="Enter Branch" maxlength="100" class="form-control" value="{{$OfficeEdit->branch}}" name="branch" id="branch" type="text">
						@error('branch')
                            <span class="validation-msg">
                                {{ $message }}
                            </span>
                         @enderror
						<div class="err"></div>	
					</div>
				</div>
				

			</div>

			<div class="row">
				<div class="col-md-12 my-5 text-center">
					<input  class="btn cbtn btn-primary" type="submit" name="submit" value="Create">
					<a href="{{ route('office.index') }}" class="btn btn-danger">cancel</a>

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
				contact: {
					minlength: 10,
		     		maxlength: 10,
					required: true
				},
				address1:{
					required: true
				},
				city:{
					required: true	
				},
				
				branch_code:{
					required: true	
				},
				branch :{
					required: true	
				},
				head_office_id:{
					required: true	
				}

			},
			messages: {
				name: {
					required: "Name is a required field"
				},
				contact_person: {
					required: "Person Contact is a required field"
					
				},
				contact: {
					required: "Contact is a required field"
				},
				address1: {
					required: "Address is a required field"
				},
				city:{
					required: "City is a required field"
				},
				branch_code: {
					required: "Branch Code is a required field"
				},
				branch:{
					required: "Branch is a required field"
				}
				head_office_id:{
					required: "Head Office Name is a required field"
				}
			}
		});
	});
</script>


@endsection