@extends('layouts.main')
@section('title', __('Subscription Edit'))
@section('css')
<style type="text/css">

</style>
@endsection
@section('content')

<div class="container">
	<div class="card">
		<div class="card-header">Subscription Edit</div>
		<div class="card-body">
			<form method="post" id="Officeform" action="{{ route('subscribe.update',$subscriptionEdit->id) }}">
	    	@csrf
	    	@method('PUT')
	    	<input type="hidden" name="hidden_id" value="{{$subscriptionEdit->id}}" placeholder="">
			<div class="row">
				<div class="col-md-4">
					<div class="field-group">
						<label for="User_status">User Name</label> *<br>				
						<select class="form-control" name="user_id" id="user_id">
							<option value="" disabled="" selected="">Select User Name</option>
							@foreach ($users as $user)
								<option @if($user->id == $subscriptionEdit->user_id) {{"selected"}} @endif value="{{$user->id}}">{{$user->name}}</option>
							@endforeach
						</select>				
						@error('user_id')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div>

				<div class="col-md-4">
					<div class="field-group">
						<label for="email">Days</label> *<br>				
						<input class="form-control" placeholder="Enter Days" value="{{$subscriptionEdit->days}}"  class="strlo" name="days" id="days" type="text" required="">	
						@error('days')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div>
{{-- 
				<div class="col-md-4">
					<div class="field-group">
						<label for="email">Amount</label> *<br>				
						<input class="form-control" placeholder="Amount Days"  class="strlo" name="amount" id="amount" type="text">	
						@error('amount')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div> --}}
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="field-group">
						<label for="User_status">Payment</label> *<br>				
						<select class="form-control" name="payment_status" id="payment_status">
							<option  value="" disabled="" selected="">Select Payment Status</option>
							<option @if($subscriptionEdit->payment_status =="due" ) {{"selected"}} @endif value="due">Due</option>
							<option @if($subscriptionEdit->payment_status =="paid" ) {{"selected"}} @endif value="paid">Paid</option>
						</select>				
						@error('payment_status')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
					</div>
				</div>
				<div class="col-md-4">
					<div class="field-group">
						<label for="User_status">Payment Mode</label> *<br>				
						<select class="form-control" name="payment_mode" id="payment_mode">
							<option value="" disabled="" selected="">Select Payment Mode</option>
							<option  @if($subscriptionEdit->payment_mode =="payment_mode" ) {{"selected"}} @endif  value="debit">Debit</option>
							<option @if($subscriptionEdit->payment_mode =="cash" ) {{"selected"}} @endif value="cash">Cash</option>
							<option @if($subscriptionEdit->payment_mode =="credit" ) {{"selected"}} @endif value="credit">Credit</option>
							<option @if($subscriptionEdit->payment_mode =="online" ) {{"selected"}} @endif value="online">Online</option>
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
						<input type="text" class="form-control" value="{{$subscriptionEdit->notes}}" name="notes" id="notes" placeholder="Enter Notes" >
						@error('notes')
                            <span style="color:#dc3545">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
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


@section('onPageJs')
		
<script type="text/javascript">
	
</script>			

@endsection