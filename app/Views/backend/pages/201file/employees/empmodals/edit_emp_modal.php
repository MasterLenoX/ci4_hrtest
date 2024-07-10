<div class="modal fade bs-example-modal-lg" id="edit-employee-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <form class="modal-content" action="<?= route_to('update-employee') ?>" method="post" id="update_employee_form">
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
        <input type="hidden" name="employee_id">
        <div class="form-group">
          <label for="">Employee ID No.</label>
          <input type="text" name="emp_id_no" class="form-control" placeholder="Enter Employee ID No">
          <span class="text-danger error-text emp_id_no_error"></span>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="form-group">
              <label><b>First Name</b></label>
              <input type="text" class="form-control" name="emp_firstname" placeholder="Enter First Name">
              <span class="text-danger error-text emp_firstname_error"></span>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="form-group">
              <label><b>Middle Name</b></label>
              <input type="text" class="form-control" name="emp_midname" placeholder="Enter Middle Name">
              <span class="text-danger error-text emp_midname_error"></span>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="form-group">
              <label><b>Last Name</b></label>
              <input type="text" class="form-control" name="emp_lastname" placeholder="Enter Last Name">
              <span class="text-danger error-text emp_lastname_error"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="">Date of Birth</label>
          <input type="date" name="emp_dob" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Place of Birth</label>
          <input type="text" name="emp_pob" class="form-control" placeholder="Enter Place of Birth">
          <span class="text-danger error-text emp_pob_error"></span>
        </div>
        <div class="form-group">
          <label for="">Location Address</label>
          <input type="text" name="emp_location_add" class="form-control" placeholder="Enter Location Address">
          <span class="text-danger error-text emp_location_add_error"></span>
        </div>
        <div class="form-group">
          <label for="">Email Address</label>
          <input type="text" name="emp_email_add" class="form-control" placeholder="Enter Email Address">
          <span class="text-danger error-text emp_email_add_error"></span>
        </div>
        <div class="form-group">
          <label for="">Contact No.</label>
          <input type="text" name="emp_contact_no" class="form-control" placeholder="Enter Contact No.">
          <span class="text-danger error-text emp_contact_no_error"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary action">
          Save changes
        </button>
      </div>
    </form>

  </div>
</div>