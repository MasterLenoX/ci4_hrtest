<div class="modal fade bs-example-modal-lg" id="department-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <form class="modal-content" action="<?= route_to('add-department') ?>" method="post" id="add_dept_form">
      <div class="modal-header">
        <h4 class="modal-title" id="myLargeModalLabel">
          Large modal
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="ci_csrf_data">
        <div class="form-group">
          <label for="">Department ID No.</label>
            <input type="text" name="dept_id_no" class="form-control" placeholder="Enter Department ID No">
          <span class="text-danger error-text dept_id_no_error"></span>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label><b>Department Code</b></label>
              <input type="text" class="form-control" name="dept_code" placeholder="Enter Department Code">
              <span class="text-danger error-text dept_code_error"></span>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <label><b>Department Name</b></label>
              <input type="text" class="form-control" name="dept_name" placeholder="Enter Department Name">
              <span class="text-danger error-text dept_name_error"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary action">
          Save changes
        </button>
      </div>
    </form>

  </div>
</div>