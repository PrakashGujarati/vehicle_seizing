@extends('layouts.main')
@section('title', __('Vehicle Add'))
@section('css')
<style type="text/css">
.input-group-text
{
	background: transparent!important;
	border: transparent!important;
	width: 170px!important;
	font-family: "Roboto",sans-serif!important;
}
.checkbox
{
	/*border-top: transparent!important;
	border-right: transparent!important;
	border-left: transparent!important;
	border-bottom: 1px solid #4285f4!important;
	max-width: 200px!important;*/
}
input[type="checkbox"]:focus {
	box-shadow: 0 1px 0 0 #4285f4!important;
}
.card
{
	border-left: 3.5px solid #ffc107!important;
}
.card-header
{
	background: white!important;
}
.card-footer
{
	background: white!important;
}

</style>
@endsection
@section('content')

<div class="container">
	<form method="post" action="{{ route('agent-view-permission.store') }}">
    	@csrf
    	<input type="hidden" name="hidden_id"  value="{{ isset($getagentdata->id) ? $getagentdata->id:0 }}">
  <div class="card">
    <div class="card-header">View Fields</div>
    <div class="card-body">
    	<div class="row">
    		<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Agreement No</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="agreement_no"  value="agreement_no"
				 @if(!empty($getagentdata->agreement_no)) @if($getagentdata->agreement_no) checked="" @endif @endif
				>
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Vehicle Maker</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="make"  value="make"
				@if(!empty($getagentdata->make)) @if($getagentdata->make) checked="" @endif @endif>
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Engine No</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="engine_num" value="engine_num"
				@if(!empty($getagentdata->engine_num)) @if($getagentdata->engine_num) checked="" @endif @endif>
			</div>
    		<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Prod No</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="prod_n" value="prod_n"
				@if(!empty($getagentdata->prod_n)) @if($getagentdata->prod_n) checked="" @endif @endif>
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Region Area</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="region_area" value="region_area"
				@if(!empty($getagentdata->region_area)) @if($getagentdata->region_area) checked="" @endif @endif>
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Office</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="Office" value="Office"
				@if(!empty($getagentdata->Office)) @if($getagentdata->Office) checked="" @endif @endif>
			</div>
		</div>
		<div class="row">
    		<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Branch</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="branch" value="branch"
				@if(!empty($getagentdata->branch)) @if($getagentdata->branch) checked="" @endif @endif>
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Customer Name</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="customer_name" value="customer_name"
				@if(!empty($getagentdata->customer_name)) @if($getagentdata->customer_name) checked="" @endif @endif>
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Cycle</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="cycle" value="cycle"
				@if(!empty($getagentdata->cycle)) @if($getagentdata->cycle) checked="" @endif @endif>
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Paymode</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="paymode" value="paymode"
				@if(!empty($getagentdata->paymode)) @if($getagentdata->paymode) checked="" @endif @endif>
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Emi</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="emi" value="emi"
				@if(!empty($getagentdata->emi)) @if($getagentdata->emi) checked="" @endif @endif>
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Tet</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="tet" value="tet"
				@if(!empty($getagentdata->tet)) @if($getagentdata->tet) checked="" @endif @endif>
			</div>
		</div>
		<div class="row">
    		<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Noi</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="noi" value="noi"
				@if(!empty($getagentdata->noi)) @if($getagentdata->noi) checked="" @endif @endif>
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Allocation Month Grp</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="allocation_month_grp" value="allocation_month_grp"
				@if(!empty($getagentdata->allocation_month_grp)) @if($getagentdata->allocation_month_grp) checked="" @endif @endif>
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Charges</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="charges" value="charges"
				@if(!empty($getagentdata->charges)) @if($getagentdata->charges) checked="" @endif @endif>
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Gv</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="gv" value="gv"
				@if(!empty($getagentdata->gv)) @if($getagentdata->gv) checked="" @endif @endif>
			</div>
		</div>
		<div class="row">
    		<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Model</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="model" value="model"
				@if(!empty($getagentdata->model)) @if($getagentdata->model) checked="" @endif @endif>
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Regd No</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="regd_num" value="regd_num"
				@if(!empty($getagentdata->regd_num)) @if($getagentdata->regd_num) checked="" @endif @endif>
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Chasis Num</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="chasis_num" value="chasis_num"
				@if(!empty($getagentdata->chasis_num)) @if($getagentdata->chasis_num) checked="" @endif @endif>
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Rrm Name No</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="rrm_name_no" value="rrm_name_no"
				@if(!empty($getagentdata->rrm_name_no)) @if($getagentdata->rrm_name_no) checked="" @endif @endif>
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Rrm Mail Id</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="rrm_mail_id" value="rrm_mail_id"
				@if(!empty($getagentdata->rrm_mail_id)) @if($getagentdata->rrm_mail_id) checked="" @endif @endif>
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Coordinator Mail Id</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="coordinator_mail_id" value="coordinator_mail_id"
				@if(!empty($getagentdata->coordinator_mail_id)) @if($getagentdata->coordinator_mail_id) checked="" @endif @endif>
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Tenor Over</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="tenor_over" value="tenor_over"
				@if(!empty($getagentdata->tenor_over)) @if($getagentdata->tenor_over) checked="" @endif @endif>
			</div>
    		<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Letter Refernce</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="letter_refernce" value="letter_refernce"
				@if(!empty($getagentdata->letter_refernce)) @if($getagentdata->letter_refernce) checked="" @endif @endif>
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Dispatch Date</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="dispatch_date" value="dispatch_date"
				@if(!empty($getagentdata->dispatch_date)) @if($getagentdata->dispatch_date) checked="" @endif @endif>
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Letter Date</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="letter_date" value="letter_date"
				@if(!empty($getagentdata->letter_date)) @if($getagentdata->letter_date) checked="" @endif @endif>
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Valid Date</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="valid_date" value="valid_date"
				@if(!empty($getagentdata->valid_date)) @if($getagentdata->valid_date) checked="" @endif @endif>
			</div>
			
		</div>
    </div> 
     <div class="card-footer">
    		<button type="submit" class="btn btn-primary">Submit</button>
		<a href="{{ route('Vehicle.index') }}" class="btn btn-danger">cancel</a>
    </div>
  </div>

 
</form>
</div>


{{-- 
<div class="main-content">




<div class="input-group col-md-3">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Default</span>
				</div>
				<input type="checkbox" class="checkbox" aria-label="Default" aria-describedby="inputGroup-sizing-default">
			</div>

    
</div> --}}

@endsection


@section('innerPageJS')

   {{--  <script>
        $(function(){


        $('#fa-eye').click(function(e){
                e.preventDefault();
                var field_type = ($("#password").attr('type') == 'password') ? 'text' : 'password';
                $("#password").attr('type', field_type );
            });

        $('#fa-sync').click(function(e){
            e.preventDefault();
            $("#password").val("");
        });

        

            $("#shipping_is_same_as_billing").click(function (e) {

                var inputLists = [
                    { 'name' : 'address', 'type' : 'textarea' },
                    { 'name' : 'city', 'type' : 'input' },
                    { 'name' : 'state', 'type' : 'input' },
                    { 'name' : 'zip_code', 'type' : 'input' },
                    { 'name' : 'country_id', 'type' : 'select' }

                ];


                if(this.checked)
                {

                    $.each(inputLists, function( key, row ) {

                        var selected_value = $(row.type +'[name=' + row.name + ']').val();
                        //$copied = $(row.type +'[name=' + row.name + ']').val();

                        if(row.type == 'select')
                        {
                             

                            var target_select = $(row.type +'[name=shipping_' + row.name + ']');    
                            var options = target_select.data('select2').options.options;

                            target_select.select2(options).val(selected_value).attr("disabled", "disabled");
                        }
                        else
                        {
                            $(row.type +'[name=shipping_' + row.name + ']').val(selected_value).attr("disabled", "disabled");
                        }

                        

                    });
                }
                else
                {
                    $.each(inputLists, function( key, row ) {

                        $(row.type +'[name=shipping_' + row.name + ']').removeAttr("disabled");

                        if(row.type == 'select')
                        {
                          
                            var target_select = $(row.type +'[name=shipping_' + row.name + ']');    
                            var options = target_select.data('select2').options.options;
                            target_select.select2(options).val(null).removeAttr("disabled");
                        }

                    });
                }

            });

        });
    </script> --}}

@endsection