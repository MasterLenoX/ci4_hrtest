<?= $this->extend('backend/layout/pages-layout') ?>
<?= $this->section('content') ?>

<div class="min-height-200px">
  <div class="page-header">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="title">
          <h4>General User Settings</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= route_to('admin.home') ?>">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Settings
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30">
      <div class="card-box height-100-p overflow-hidden">
        <div class="profile-tab height-100-p">
          <div class="tab height-100-p">
            <ul class="nav nav-tabs customtab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#password" role="tab">Change Password</a>
              </li>
            </ul>
            <div class="tab-content">
              <!-- password Tab start -->
              <div class="tab-pane fade show active" id="password" role="tabpanel">
                <div class="pd-20">
                  <form action="<?= route_to('change-password') ?>" method="post" id="change_password_form">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="ci_csrf_data">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">Current Password</label>
                          <input type="password" class="form-control" placeholder="Enter Current Password" name="current_password">
                          <span class="text-danger error-text current_password_error"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">New Password</label>
                          <input type="password" class="form-control" placeholder="Enter New Password" name="new_password">
                          <span class="text-danger error-text new_password_error"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="">Confirm New Password</label>
                          <input type="password" class="form-control" placeholder="Enter Confirm New Password" name="confirm_new_password">
                          <span class="text-danger error-text confirm_new_password_error"></span>
                        </div>
                      </div>
                    </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                      </div>
                  </form> 
                </div>
              </div>
              <!-- password Tab End -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>