@extends('layouts.main')
@section('title', __('Finance Office'))

@section('content')

<div class="alert alert-success successmessage"></div>
<div class="alert alert-danger dangermessage"></div>


<div class="main-content">
   <div class="row">
      <div class="col-md-6">
         <h5>Finance Office</h5>
      </div>
      <div class="col-md-6">
         <div class="float-md-right">
           <a class="btn btn-primary btn-sm" href="{{ route('finance-office.create') }}">Add New Finance Office</a>
         </div>
      </div>
   </div>
    <hr>
  
   
  <div class="table-responsive">
 
   <table class="table table-striped table-bordered datatable" cellspacing="0" width="100%" id="data">
      <thead>
         <tr>
              <th>Finance Company Name</th>
              <th>Branch Code</th>
              <th>Assigned Manager</th>
              <th>Branch Address</th>
              <th>Branch Email</th>
              <th>city</th>
              <th>Branch Contact</th>
              <th>Manage Email</th>
              <th>Manager Contact</th>
              <th>Gst</th>
              <th>Action</th>
         </tr>
         
      </thead>
   </table>
 </div>
</div>
  
@endsection
@section('onPageJs')

 
<script type="text/javascript">
  




$(document).ready(function() {
    $('.successmessage').css('display','none');
     $('.dangermessage').css('display','none');
   $('.datatable').DataTable({
              processing: true,
              serverSide: true,
                "ajax": {
                "url" : "{{ route('finance-office.datatables') }}",
                "type": "get",
            },
              columns: [
                  {data: 'finance_company_name', name: 'finance_company_name'},
                  {data: 'branch_code', name: 'branch_code'},
                  {data: 'assigned_manager', name: 'assigned_manager'},
                  {data: 'branch_address', name: 'branch_address'},
                  {data: 'branch_email', name: 'branch_email'},
                  {data: 'city', name: 'city'},
                  {data: 'branch_contact', name: 'branch_contact'},
                  {data: 'manage_email', name: 'manage_email'},
                  {data: 'manager_contact', name: 'manager_contact'},
                  {data: 'gst', name: 'gst'},
                  {data: 'action', name: 'action'},
              ]
          });

        
    });


   $(document).on('click','.vehicleDelete',function(){
    
    var id=$(this).data('headofficesid');

    bootbox.confirm({
    message: "Are you sure you want to delete this Finance Office?",
    buttons: {
        confirm: {
            label: 'Yes',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
            if(result)
                {
                    $.ajax({
                        type: "GET",
                        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{ route('delete.financeoffice') }}",
                        data: {
                            "id":id,
                            "_method":'DELETE'
                        },              
                        success: function (data)
                        {
                          if(data.success)
                          {
                            $('.successmessage').css('display','block');
                            $('.successmessage').html(data.success);
                            $('.successmessage').delay(5000).fadeOut(800);
                          }
                          else
                          {
                            
                            $('.dangermessage').css('display','block');
                            $('.dangermessage').html(data.error);
                            $('.dangermessage').delay(5000).fadeOut(800);
                          }
                            
                            //location.reload();
                         $('.datatable').DataTable().draw();

                        }
                    });
                }
            }
        });

    });


</script>

@endsection