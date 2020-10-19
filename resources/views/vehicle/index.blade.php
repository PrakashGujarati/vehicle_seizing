@extends('layouts.main')
@section('title', __('Vehicle List'))

{{-- Css --}}
@includeIf('vehicle._partials.style')

@section('content')
  <div class="main-content">
    <div class="row">
      <div class="col-md-6">
        <h5>Vehicle List</h5>
      </div>
      <div class="col-md-6">
        <div class="float-md-right">
          <a href="{{ route('Vehicle.create') }}" class="btn btn-sm text-success"> +Add </a>
          <a type="button" href="{{ route('vehicles.create') }}" class="btn btn-sm btn-outline-primary <!--rounded-pill-->">
            <i class=""> </i> Export
          </a>
          <a type="button" href="#" class="btn btn-sm btn-outline-warning {{--rounded-pill--}}"
             data-toggle='modal' data-target='#csv_import_modal'>
            <i class=""> </i> Import
          </a>
        </div>
      </div>
    </div>
    <br>

    <div class="row">
      <div class="col-12 form-inline">
        <div class="form-group">
          <label><strong>Finance Company :</strong></label>
          <label>
            <select id="finance_office" class="form-control finance_office">
              <option value="">--Select Finance--</option>
              @foreach (@$finance_offices as $office)
                <option value="{{$office->finance_company_name}}">{{$office->finance_company_name}}</option>
              @endforeach
            </select>
          </label>
        </div>

        <div class="form-group ml-4">
          <a type="button" href="#" class="btn btn-sm btn-outline-success assign_vehicle_btn"
             data-toggle='modal' data-target='#assign_vehicle'>
            <i class=""> </i> + Assign Vehicles
          </a>
        </div>
      </div>

      <div class="col-12">
          <div class="table-responsive">
            <table class="table  <!--table-bordered-->" id="vehicles-table">
              <thead>
              <tr style="position:sticky;">
                <th>#</th>
                <th>Action</th>
                <th>Status</th>
                <th>Id</th>
                <th>Vehicle No</th>
                <th>Make</th>
                <th>Customer Name</th>
                <th>Agreement No</th>
                <th>Prod N</th>
                <th>Region Area</th>
                <th>Office</th>
                <th>Branch</th>
                <th>Cycle</th>
                <th>Paymode</th>
                <th>Emi</th>
                <th>Tet</th>
                <th>Noi</th>
                <th>Allocation Month Grp</th>
                <th>Tenor Over</th>
                <th>Charges</th>
                <th>Gv</th>
                <th>Model</th>
                <th>Chasis Num</th>
                <th>Engine Num</th>
                <th>Rrm Name No</th>
                <th>Rrm Mail Id</th>
                <th>Coordinator mail</th>
                <th>Letter Refernce</th>
                <th>Dispatch Date</th>
                <th>Letter Date</th>
                <th>Valid Date</th>
                <th>Finance Companys</th>
              </tr>
              </thead>
            </table>
          </div>
      </div>
    </div>
  </div>

  {{-- Modals --}}
  @includeIf('vehicle._partials.vehicle_show_modal', ['modal_title'=> "Detail",]);
  @includeIf('vehicle._partials.csv_import_modal', ['modal_title'=> "Import bulk data",]);
  @includeIf('vehicle._partials.assign_vehicle', ['modal_title'=> " Assign Vehicles",]);

  {{-- Script  --}}
  @includeIf('vehicle._partials.javascript');

@endsection