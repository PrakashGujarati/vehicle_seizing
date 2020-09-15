@extends('layouts.main')
@section('title', __('HeadOffice Add'))
@section('css')
<style type="text/css">

</style>
@endsection
@section('content')

<div class="container">
	<div class="card">
		<div class="card-header">HeadOffice</div>
		<div class="card-body">
			<form method="post" action="{{ route('headoffice.store') }}">
    		@csrf
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Name</label>*				
						<input placeholder="Enter head office name" maxlength="100" class="form-control" name="name" id="name"
						 type="text">
						 @error('name')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
						<div class="err"></div>
					</div>

					<div class="form-group">
						<label for="vendor_code">Vendor Code</label> *				
						<input class="form-control" placeholder="Enter vendor code" maxlength="30" name="vendor_code" id="vendor_code" type="text">
						@error('vendor_code')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
										<div class="err"></div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="address1">Address 1</label>				
						<textarea class="form-control" placeholder="Enter address 1" maxlength="200" rows="4" name="address1" id="address1"></textarea>
								
						@error('address1')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror		<div class="err"></div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="address2">Address 2</label>				
						<textarea class="form-control" placeholder="Enter address 2" maxlength="200" rows="4" name="address2" id="address2"></textarea>
						@error('address2')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
										<div class="err"></div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="city">City</label> *				
						<input class="form-control"  placeholder="Enter city" maxlength="20" name="city" id="city" type="text">				
						@error('city')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror	
						<div class
						="err"></div>
					</div>

					<div class="form-group">
						<label for="contact_person">Contact Person</label> *				
						<input class="form-control" placeholder="Enter contact person" maxlength="50" name="contact_person" id="contact_person" type="text">
							@error('contact_person')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror	
										<div class="err"></div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="contact">Contact</label>				
						<textarea class="form-control" placeholder="Enter contact" maxlength="100" rows="4" name="contact" id="contact"></textarea>
								
								@error('contact')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror		<div class="err"></div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="gst">GST No</label>				
						<textarea class="form-control" placeholder="Enter gstno" maxlength="50" rows="4" name=" gst" id="gst"></textarea>
								
								@error('gst')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror		<div class="err"></div>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-md-12 my-5 text-center">
					<input  class="btn cbtn btn-primary" type="submit" name="submit" value="Create">
				</div>
			</div>	
		</form>
		</div> 
	</div>

 
</div>

	

@endsection


@section('innerPageJS')


@endsection