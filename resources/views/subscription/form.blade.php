@extends('layouts.main')
@section('title', __('Subscription Add'))
@section('css')
<style type="text/css">
#user_id
{
	color:#494949!important;
}
#payment_mode
{
	color:#494949!important;
}
#payment_status
{
	color:#494949!important;
}
</style>
@endsection
@section('content')

<div class="container">
	<div class="card">
		<div class="card-header">Subscription Add</div>
		<div class="card-body">
			<form method="post" id="subscription_form" action="{{ route('subscribers.store') }}">
    		@csrf
			<div class="row">
				<div class="col-md-4">
					<div class="field-group">
						<label for="User_status">User Name</label> *<br>				
						<select class="form-control" name="user_id" id="user_id">
							<option value="" disabled="" selected="">Select User Name</option>
							@foreach ($users as $user)
								<option value="{{$user->id}}">{{$user->name}}</option>
							@endforeach
						</select>				
						@error('user_id')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div>
				@php
					$maxDays=date('t');
					$currentDayOfMonth=date('j');
				@endphp
				<div class="col-md-4">
					<div class="field-group">
						<label for="email">Month({{date('M')}})</label> *<br>				
						<input class="form-control" placeholder="Enter Days"  class="strlo" name="days" value="{{$maxDays}}" id="days" type="text">	
						@error('days')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div>
				<div class="col-md-4">
					<div class="field-group">
						<label for="User_status">Payment</label> *<br>				
						<select class="form-control" name="payment_status" id="payment_status">
							<option value="" disabled="" selected="">Select Payment Status</option>
							<option value="due">Due</option>
							<option value="paid">Paid</option>
						</select>				
						@error('payment_status')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div>
			</div>
			<div class="row mt-3">				
				<div class="col-md-4">
					<div class="field-group">
						<label for="User_status">Payment Mode</label> *<br>				
						<select class="form-control" name="payment_mode" id="payment_mode">
							<option value="" disabled="" selected="">Select Payment Mode</option>
							<option value="debit">Debit</option>
							<option value="cash">Cash</option>
							<option value="credit">Credit</option>
							<option value="online">Online</option>
						</select>				
						@error('payment_mode')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div>
				<div class="col-md-4">
					<div class="field-group">
						<label for="contact">Notes</label><br>				
						<input type="text" class="form-control" name="notes" id="notes" placeholder="Enter Notes" >
						@error('notes')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div>
			</div>
			<div class="row">
					<div class="col-md-12 mt-4">
						<input  class="btn cbtn btn-info" type="submit" name="submit" value="Save">
						<a href="{{ route('subscribers.index') }}" class="btn cbtn btn-danger"> Cancel </a>
					</div>
				</div>	
		</form>
		</div> 
	</div>

 
</div>

	

@endsection



@section('onPageJs')


<script type="text/javascript">

	$("#subscription_form").validate({
			rules: {
			user_id: {
				required: true,
			},
			days: {
				required: true,
			},
			payment_mode:{
				required: true,
			},
			payment_status:{
				required: true,
			}

		},
		messages: {
		
			user_id: {
				required: "User Name is a required field",
			},
			Days: {
				required: "days is a required field",
			},
			payment_mode:{
				required: "Payment Mode is a required field",
			},
			payment_status:{
				required: "Payment Status is a required field",

			}

		}
	});

</script>


@endsection