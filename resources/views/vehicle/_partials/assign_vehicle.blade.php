<div class="modal fade" id="assign_vehicle" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- MODEL TITLE -->
        <h2 class="modal-title">  {{ @$modal_title  }} </h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"> × </span>
        </button>
      </div>

      <form action="{{route('vehicles.assign')}}" method="post" enctype="multipart/form-data" id="assign_vehicle_form">
        <!-- MODEL BODY -->
        <div class="modal-body">
          <div id="model_data">
            @csrf
            <div class="row">
              <label class="col-12">
                <select class="form-control" name="agent_id">
                  @if(@$agents)
                    <option value=""> Select Agent</option>
                    @foreach($agents as $i)
                      <option value="{{ $i->id }}">
                        {{ $i->name }}
                      </option>
                    @endforeach
                  @endif
                </select>
              </label>
            </div>
            <br>
            <div class="row">
              <div class="col-12">
                <input type="hidden" name="vehicles" id="input_vehicles">
                <ul id="ul_selected_rows" class="list-group"></ul>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <!-- The close button in the bottom of the modal -->
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
              Cancel
            </button>
            <button type="submit" class="btn btn-sm btn-success" data-dismiss="modal"
                    onclick="document.getElementById('assign_vehicle_form').submit();"
            >
              Process
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
