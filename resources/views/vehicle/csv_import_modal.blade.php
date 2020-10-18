<div class="modal fade" id="csv_import_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- MODEL TITLE -->
        <h2 class="modal-title"> Import bulk data </h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"> × </span>
        </button>
      </div>

      <form action="{{route('csv.import.store')}}" method="post" enctype="multipart/form-data" id="csv_import_form">
        <!-- MODEL BODY -->
        <div class="modal-body">
          <div id="model_data">
            @csrf

            <div class="form-group">
              <label for="exampleFormControlFile1">Select file</label>
              <input type="file" class="form-control-file" id="csv_file" name="csv_file">
            </div>

            <div class="form-group">
              <label>
                <select class="form-control" name="table_name">
                  <option value="vehicles" selected>Vehicles</option>
                </select>
              </label>
            </div>

          </div>
          <div class="modal-footer">
            <!-- The close button in the bottom of the modal -->
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
              Close
            </button>
            <button type="submit" class="btn btn-sm btn-success" data-dismiss="modal"
                    onclick="document.getElementById('csv_import_form').submit();">
              Start Import
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
