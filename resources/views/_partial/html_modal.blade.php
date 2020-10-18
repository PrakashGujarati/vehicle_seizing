{{-- Example: @includeIf('_partial.html_modal', ['modal_title'=> "Detail",]); --}}
<div class="modal fade" id="vehicle_show_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- MODEL TITLE -->
        <h2 class="modal-title"> {{ @$modal_title  }} </h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"> × </span>
        </button>
      </div>
      <!-- MODEL BODY -->
      <div class="modal-body">
        <div id="model_data"></div>
        <div class="modal-footer">
          <!-- The close button in the bottom of the modal -->
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
</div>