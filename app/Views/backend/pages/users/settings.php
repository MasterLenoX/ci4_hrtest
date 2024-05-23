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
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#general_settings" role="tab">General Settings</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#logo_favicon" role="tab">Logo & Favicon</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#social_media" role="tab">Social Media</a>
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
              <!-- Logp & Favicon Tab start -->
              <div class="tab-pane fade height-100-p" id="general_settings" role="tabpanel">
                <div class="profile-setting">
                  <div class="pd-20">
                    <form action="" method="post" id="general_settings_form">
                      
                    </form>
                  </div>
                </div>
              </div>
              <!-- Logo & Favicon Tab End -->

              <!-- Logp & Favicon Tab start -->
              <div class="tab-pane fade height-100-p" id="logo_favicon" role="tabpanel">
                <div class="profile-setting">
                  <div class="pd-20">
                    --- Logo & Favicon
                  </div>
                </div>
              </div>
              <!-- Logo & Favicon Tab End -->

              <!-- Social Media Tab start -->
              <div class="tab-pane fade height-100-p" id="social_media" role="tabpanel">
                <div class="profile-setting">
                  <div class="pd-20">
                    --- Social Media
                  </div>
                </div>
              </div>
              <!-- Social Media Tab End -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script>
  $('#change_password_form').on('submit', function(e) {
    e.preventDefault();
    // alert('Submit...');
    var csrfName = $('.ci_csrf_name').attr('name');
    var csrfHash = $('.ci_csrf_hash').val();
    var form = this;
    var formData = new FormData(form);
    formData.append(csrfName, csrfHash);

    $.ajax({
      url: $(form).attr('action'),
      method: $(form).attr('method'),
      data: formData,
      processData: false,
      dataType: 'json',
      contentType: false,
      cache: false,
      beforeSend: function() {
        toastr.remove();
        $(form).find('span.error-text').text('');
      },
      success: function(response) {
        //Update CSRF Hash
        $('.ci_csrf_data').val(response.token);

        if ($.isEmptyObject(response.error)) {
          if (response.status == 1) {
            $(form)[0].reset();
            toastr.success(response.msg);
          } else {
            toastr.error(response.msg);
          }
        } else {
          $.each(response.error, function(prefix, val) {
            $(form).find('span.' + prefix + '_error').text(val);
          });
        }
      }
    });

  });
</script>
<?= $this->endSection() ?>