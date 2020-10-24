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
.textbox
{
	border-top: transparent!important;
	border-right: transparent!important;
	border-left: transparent!important;
	border-bottom: 1px solid #4285f4!important;
	max-width: 200px!important;
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
	<form method="post" action="{{ route('Vehicle.store') }}">
    	@csrf
  <div class="card">
    <div class="card-header">Add Vehicle</div>
    <div class="card-body">
    	<div class="row">
    		<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Agreement No</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="agreement_no">
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Vehicle Maker</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="make">
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Engine No</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="engine_num">
			</div>
    		<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Prod No</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="prod_n">
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Region Area</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="region_area">
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Office</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="Office">
			</div>
		</div>
		<div class="row">
    		<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Branch</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="branch">
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Customer Name</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="customer_name">
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Cycle</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="cycle">
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Paymode</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="paymode">
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Emi</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="emi">
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Tet</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="tet">
			</div>
		</div>
		<div class="row">
    		<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Noi</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="noi">
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Allocation Month Grp</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="allocation_month_grp">
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Tenor Over</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="tenor_over">
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Charges</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="charges">
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Gv</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="gv">
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Model</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="model">
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Regd No</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="regd_num">
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Chasis Num</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="chasis_num">
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Rrm Name No</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="rrm_name_no">
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Rrm Mail Id</span>
				</div>
				<input type="email" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="rrm_mail_id">
			</div>
		</div>
		<div class="row">
		
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Coordinator Mail Id</span>
				</div>
				<input type="email" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="coordinator_mail_id">
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Letter Refernce</span>
				</div>
				<input type="text" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="letter_refernce">
			</div>

		</div>
		<div class="row">
    	
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Dispatch Date</span>
				</div>
				<input type="date" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="dispatch_date">
			</div>
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Letter Date </span>
				</div>
				<input type="date" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="letter_date ">
			</div>
		</div>
		<div class="row">
			<div class="input-group col-md-6">
				<div class="text-border">
					<span class="input-group-text" id="inputGroup-sizing-default">Valid Date</span>
				</div>
				<input type="date" class="form-control textbox" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="valid_date">
			</div>
		</div>
    </div> 
     <div class="card-footer">
    		<button type="submit" class="btn btn-primary">Submit</button>
		<a href="{{ url('vehicles') }}" class="btn btn-danger">cancel</a>
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