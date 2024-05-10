<?= $this->extend('backend/layout/pages-layout') ?>
<?= $this->section('content') ?>

<div class="min-height-200px">
  <div class="page-header">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="title">
          <h4>Profile</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= route_to('admin.home') ?>">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Profile
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
      <div class="pd-20 card-box height-100-p">
        <div class="profile-photo">
          <!-- <a href="javascript:;" onclick="event.preventDefault();document.getElementById('user_profile_file').click();" class="edit-avatar"><i class="fa fa-pencil"></i></a> -->
          <a href="#" class="btn-block edit-avatar" data-toggle="modal" data-target="#small-modal" type="button">
            <i class="fa fa-pencil"></i>
          </a>
          <img src="<?= get_user()->picture == null ? '/images/users/8man-user.jpg' : '/images/users/' . get_user()->picture ?>" alt="" class="avatar-photo ci-avatar-photo">

          <div class="modal fade" id="small-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myLargeModalLabel">
                    Large modal
                  </h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                  </button>
                </div>
                <div class="modal-body">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing
                    elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary"> Save Changes </button>
                  <button type="button" class="btn btn-dark" data-dismiss="modal">
                    Close
                  </button>
                </div>
              </div>
            </div>
          </div>



          <!-- <img src="/images/users/leo-users.jpg" alt="" class="avatar-photo ci-avatar-photo"> -->
        </div>
        <h5 class="text-center h5 mb-0 ci-user-name"><?= get_user()->name ?></h5>
        <p class="text-center text-muted font-14">
          <?= get_user()->email ?>
        </p>
        <hr class="featurette-divider">
      </div>
    </div>
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
      <div class="card-box height-100-p overflow-hidden">
        <div class="profile-tab height-100-p">
          <div class="tab height-100-p">
            <ul class="nav nav-tabs customtab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Timeline</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#personal_detail" role="tab">Personal Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#social_media" role="tab">Social Media</a>
              </li>
            </ul>
            <div class="tab-content">
              <!-- Timeline Tab start -->
              <div class="tab-pane fade show active" id="timeline" role="tabpanel">
                <div class="pd-20">
                  <div class="profile-timeline">
                    <div class="timeline-month">
                      <h5>August, 2020</h5>
                    </div>
                    <div class="profile-timeline-list">
                      <ul>
                        <li>
                          <div class="date">12 Aug</div>
                          <div class="task-name">
                            <i class="ion-android-alarm-clock"></i> Task
                            Added
                          </div>
                          <p>
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit.
                          </p>
                        </li>
                        <li>
                          <div class="date">10 Aug</div>
                          <div class="task-name">
                            <i class="ion-ios-chatboxes"></i> Task Added
                          </div>
                          <p>
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit.
                          </p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Timeline Tab End -->
              <!-- personal details Tab start -->
              <div class="tab-pane fade height-100-p" id="personal_detail" role="tabpanel">
                <div class="profile-setting">
                  <div class="pd-20">
                    <form action="<?= route_to('update-personal-details') ?>" method="POST" id="personal_details_from">
                      <?= csrf_field(); ?>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Full Name" value="<?= get_user()->name ?>">
                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Userame</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter Username" value="<?= get_user()->username ?>">
                            <span class="text-danger error-text username_error"></span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Bio</label>
                        <textarea name="bio" id="" cols="30" class="form-control" placeholder="Enter Bio..."><?= get_user()->bio ?></textarea>
                        <span class="text-danger error-text bio_error"></span>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- personal details Tab End -->
              <!-- Social Media Tab start -->
              <div class="tab-pane fade height-100-p" id="social_media" role="tabpanel">
                <div class="profile-setting">
                  <div class="pd-20">
                    --- Social Media
                  </div>
                </div>
              </div>
              <!-- personal details Tab End -->
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
  $('#personal_details_from').on('submit', function(e) {
    e.preventDefault();
    // alert('Personal Details Change');
    var form = this;
    var formData = new FormData(form);

    $.ajax({
      url: $(form).attr('action'),
      method: $(form).attr('method'),
      data: formData,
      processData: false,
      dataType: 'json',
      contentType: false,
      beforeSend: function() {
        toastr.remove();
        $(form).find('span.error-text').text('');
      },
      success: function(response) {
        if ($.isEmptyObject(response.error)) {
          if (response.status == 1) {
            $('.ci-user-name').each(function() {
              $(this).html(response.user_info.name);
            });
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