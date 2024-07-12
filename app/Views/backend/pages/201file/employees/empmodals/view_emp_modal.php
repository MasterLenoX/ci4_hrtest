<div class="modal fade bs-example-modal-lg" id="view-employee-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myLargeModalLabel">
          Modal Title
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          ×
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="employee_id">
        <div class="profile-photo">
          <!-- <a href="javascript:;" onclick="event.preventDefault();document.getElementById('user_profile_file').click();" class="edit-avatar">
            <i class="fa fa-pencil"></i>
          </a> -->
          <!-- <input type="file" name="user_profile_file" id="user_profile_file" class="d-none" style="opacity: 0;"> -->
          <img src="<?= get_user()->picture == null ? '/images/users/aidenpearce.jpg' : '/images/users/' . get_user()->picture ?>" alt="" class="avatar-photo ci-avatar-photo">
        </div>
        <div class="row p-2">
          <div class="col-sm-4 p-4 my-1">
            <h5 class="text-primary" id="text-emp_fullname"></h5>
          </div>
          <div class="col-sm-4 p-4 my-1">
            <h5 class="text-primary" id="text-emp_dob"></h5>
          </div>
          <div class="col-sm-4 p-4 my-1">
            <h5 class="text-primary" id="text-emp_pob"></h5>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-sm-8 p-4">
            <h5 class="text-primary" id="text-emp_location"></h5>
          </div>
          <div class="col-sm-4 p-4">
            <h5 class="text-primary" id="text-emp_email"></h5>
            <h5 class="text-primary" id="text-emp_phone"></h5>
          </div>
        </div> -->
        <div class="row p-2">
          <div class="col-sm p-4 my-1">
            <h5 class="text-primary" id="text-emp_location"></h5>
          </div>
          <div class="col-sm p-4 my-1">
            <h5 class="text-primary" id="text-emp_email"></h5>
          </div>
          <div class="col-sm p-4 my-1">
            <h5 class="text-primary" id="text-emp_phone"></h5>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Close
        </button>
      </div>
    </div>

  </div>
</div>