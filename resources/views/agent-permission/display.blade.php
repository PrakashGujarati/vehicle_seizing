@extends('layouts.main')
@section('title', __('Vehicle Details'))
@section('css')
<style type="text/css">
.input-group-text
{
	background: transparent!important;
	border: transparent!important;
	width: 170px!important;
	font-family: "Roboto",sans-serif!important;
}
.textbox
{
	border-top: transparent!important;
	border-right: transparent!important;
	border-left: transparent!important;
	border-bottom: 1px solid #4285f4!important;
	max-width: 200px!important;
	background-color: white!important;
}
input[type="text"]:focus {
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
	<form method="post" >
  <div class="card">
    <div class="card-header">Identify Five Vehicles</div>
    <div class="card-body">
    	<div class="row">
    		<div class="input-group col-md-6">
                @if($agentviewdata->agreement_no)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Agreement No</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->agreement_no}}" disabled=""  name="agreement_no" >
                @endif
			</div>
			<div class="input-group col-md-6">
                @if($agentviewdata->make)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Vehicle Maker</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->make}}" disabled="" name="make">
                @endif
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
                @if($agentviewdata->engine_num)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Engine No</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->engine_num}}" disabled="" name="engine_num">
                @endif

			</div>
    		<div class="input-group col-md-6">
                @if($agentviewdata->prod_n)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Prod No</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->prod_n}}" disabled="" name="prod_n">
                @endif

			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
                @if($agentviewdata->region_area)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Region Area</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->region_area}}" disabled="" name="region_area">
                @endif
			</div>
			<div class="input-group col-md-6">
                @if($agentviewdata->office)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Office</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->Office}}" disabled="" name="Office">
			@endif
			</div>
		</div>
		<div class="row">
    		<div class="input-group col-md-6">
                @if($agentviewdata->branch)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Branch</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->branch}}" disabled="" name="branch">
				@endif
			</div>
			<div class="input-group col-md-6">
                @if($agentviewdata->customer_name)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Customer Name</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->customer_name}}" disabled="" name="customer_name">
				@endif
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
                @if($agentviewdata->cycle)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Cycle</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->cycle}}" disabled="" name="cycle">
				@endif
			</div>
			<div class="input-group col-md-6">
                @if($agentviewdata->paymode)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Paymode</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->paymode}}" disabled="" name="paymode">
                @endif

			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
                @if($agentviewdata->emi)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Emi</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->emi}}" disabled="" name="emi">
                @endif
			</div>
			<div class="input-group col-md-6">
                @if($agentviewdata->tet)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Tet</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->tet}}" disabled="" name="tet">
                @endif
			</div>
		</div>
		<div class="row">
    		<div class="input-group col-md-6">
                @if($agentviewdata->noi)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Noi</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->noi}}" disabled="" name="noi">
                @endif
			</div>
			<div class="input-group col-md-6">
                @if($agentviewdata->allocation_month_grp)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Allocation Month Grp</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->allocation_month_grp}}" disabled="" name="allocation_month_grp">
                @endif
			</div>
		</div>
		
		<div class="row">
			<div class="input-group col-md-6">
                @if($agentviewdata->charges)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Charges</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->charges}}" disabled="" name="charges">
                @endif
			</div>
			<div class="input-group col-md-6">
                @if($agentviewdata->gv)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Gv</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->gv}}" disabled="" name="gv">
                @endif
			</div>
		</div>
		<div class="row">
    		<div class="input-group col-md-6">
                @if($agentviewdata->model)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Model</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->model}}" disabled="" name="model">
                @endif
			</div>
			<div class="input-group col-md-6">
                @if($agentviewdata->regd_num)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Regd No</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->regd_num}}" disabled="" name="regd_num">
                @endif
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
                @if($agentviewdata->chasis_num)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Chasis Num</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->chasis_num}}" disabled="" name="chasis_num">
                @endif
			</div>
			<div class="input-group col-md-6">
                @if($agentviewdata->rrm_name_no)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Rrm Name No</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->rrm_name_no}}" disabled="" name="rrm_name_no">
                @endif
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
                @if($agentviewdata->rrm_mail_id)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Rrm Mail Id</span>
				</div>
				<input type="email" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->rrm_mail_id}}" disabled="" name="rrm_mail_id">
                @endif
			</div>
			<div class="input-group col-md-6">
                @if($agentviewdata->coordinator_mail_id)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Coordinator Mail Id</span>
				</div>
				<input type="email" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->coordinator_mail_id}}" disabled="" name="coordinator_mail_id">
                @endif
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
                @if($agentviewdata->tenor_over)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Tenor Over</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->tenor_over}}" disabled="" name="tenor">
                @endif
			</div>

    		<div class="input-group col-md-6">
                @if($agentviewdata->letter_refernce)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Letter Refernce</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->letter_refernce}}" disabled="" name="letter_refernce">
				@endif
			</div>
			
		</div>
		<div class="row">
			<div class="input-group col-md-6">
                @if($agentviewdata->dispatch_date)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Dispatch Date</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->dispatch_date}}" disabled="" name="dispatch_date">
				@endif
			</div>
			<div class="input-group col-md-6">
                @if($agentviewdata->letter_date)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Letter Date</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->letter_date}}" disabled="" name="letter_date">
				@endif
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
                @if($agentviewdata->valid_date)
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Valid Date</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{$vehicledata->valid_date}}" disabled="" name="valid_date">
				@endif
			</div>
		</div>
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
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default">
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