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
          <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
          <img src="vendors/images/photo1.jpg" alt="" class="avatar-photo">
          <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body pd-5">
                  <div class="img-container">
                    <img id="image" src="vendors/images/photo2.jpg" alt="Picture">
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" value="Update" class="btn btn-primary">
                  <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <h5 class="text-center h5 mb-0">Ross C. Lopez</h5>
        <p class="text-center text-muted font-14">
          Lorem ipsum dolor sit amet
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
                    --- profile details
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