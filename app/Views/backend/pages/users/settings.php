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
            <li class="breadcrumb-item" aria-current="page">
              Profile
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

              <!-- General Settings Tab start -->
              <div class="tab-pane fade height-100-p" id="general_settings" role="tabpanel">
                <div class="profile-setting">
                  <div class="pd-20">
                    <form action="<?= route_to('update-general-settings') ?>" method="post" id="general_settings_form">
                      <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_token() ?>" class="ci_csrf_data">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Blog Title</label>
                            <input type="text" name="blog_title" value="<?= get_settings()->blog_title ?>" class="form-control" placeholder="Enter Blog Title">
                            <span class="text-danger error-text blog_title_error"></span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Blog Email</label>
                            <input type="text" name="blog_email" value="<?= get_settings()->blog_email ?>" class="form-control" placeholder="Enter Blog Email">
                            <span class="text-danger error-text blog_email_error"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Blog Phone No.</label>
                            <input type="text" name="blog_phone" value="<?= get_settings()->blog_phone ?>" class="form-control" placeholder="Enter Blog Phone">
                            <span class="text-danger error-text blog_phone_error"></span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Blog Meta Keywords</label>
                            <input type="text" name="blog_meta_keywords" value="<?= get_settings()->blog_meta_keywords ?>" class="form-control" placeholder="Enter Blog Meta Keywords">
                            <span class="text-danger error-text blog_meta_keywords_error"></span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Blog Meta Description</label>
                        <textarea name="blog_meta_desc" id="" cols="4" rows="3" value="<?= get_settings()->blog_meta_desc ?>" class="form-control" placeholder="Write Blog Meta Description"></textarea>
                        <span class="text-danger error-text blog_meta_desc_error"></span>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- General Settings Tab End -->

              <!-- Logp & Favicon Tab start -->
              <div class="tab-pane fade height-100-p" id="logo_favicon" role="tabpanel">
                <div class="profile-setting">
                  <div class="pd-20">
                    <div class="row">
                      <div class="col-md-6">
                        <h5>Set Logo</h5>
                        <div class="mb2 mt-1" style="max-width:200px;">
                          <img src="" alt="" class="img-thumbnail" id="logo-image-preview" data-ijabo-default-img="/images/blog/<?= get_settings()->blog_logo ?>">
                        </div>
                        <form action="<?= route_to('update-logo') ?>" method="post" enctype="multipart/form-data" id="changeLogoForm">
                          <div class="mb-2">
                            <input type="file" name="blog_logo" id="" class="form-control">
                            <span class="text-danger error-text"></span>
                          </div>
                          <button type="submit" class="btn btn-primary">Change Logo</button>
                        </form>
                      </div>
                      <div class="col-md-6">
                        <h5>Set Favicon</h5>
                        <div class="mb2 mt-1" style="max-width:100px;">
                          <img src="" alt="" class="img-thumbnail" id="favicon-image-preview" data-ijabo-default-img="/images/blog/<?= get_settings()->blog_favicon ?>">
                        </div>
                        <form action="<?= route_to('update-favicon') ?>" method="post" enctype="multipart/form-data" id="changeFaviconForm">
                          <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" class="ci_csrf_data">
                          <div class="mb-2">
                            <input type="file" name="blog_favicon" id="" class="form-control">
                            <span class="text-danger error-text"></span>
                          </div>
                          <button type="submit" class="btn btn-primary"> Change Favicon </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Logo & Favicon Tab End -->

              <!-- Social Media Tab start -->
              <div class="tab-pane fade height-100-p" id="social_media" role="tabpanel">
                <div class="profile-setting">
                  <div class="pd-20">
                    <form action="<?= route_to('update-social-media') ?>" method="post" id="social_media_form">
                      <input type="hidden" name="<?= csrf_token() ?>" value="<? csrf_hash()?>" class="ci_csrf_data">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for=""><span class="text-primary micon bi bi-facebook h5"></span> Facebook</label>
                            <input type="text" name="facebook_url" placeholder="Enter Facebook Link" class="form-control">
                            <span class="text-danger error-text facebook_url_error"></span>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for=""><span class="micon bi bi-twitter h5" data-color="#4A8FC4"></span> Twitter</label>
                            <input type="text" name="twitter_url"  placeholder="Enter Twitter Link" class="form-control">
                            <span class="text-danger error-text twitter_url_error"></span>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for=""><span class="micon bi bi-instagram text-light-purple h5" data-color="#9D489A"></span> Instagram</label>
                            <input type="text" name="instagram_url"  placeholder="Enter Instagram Link" class="form-control">
                            <span class="text-danger error-text instagram_url_error"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for=""><span class="text-danger micon bi bi-youtube h5"></span> YouTube</label>
                            <input type="text" name="youtube_url"  placeholder="Enter YouTube Link" class="form-control">
                            <span class="text-danger error-text youtube_url_error"></span>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for=""><span class="micon bi bi-github h5"></span> GitHub</label>
                            <input type="text" name="github_url" placeholder="Enter GitHub Link" class="form-control">
                            <span class="text-danger error-text github_url_error"></span>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for=""><span class="micon bi bi-linkedin h5" data-color="#2C75C3"></span> LinkedIn</label>
                            <input type="text" name="linkedin_url" value="<?= get_socmed()->linkedin_url ?>" placeholder="Enter LinkedIn Link" class="form-control">
                            <span class="text-danger error-text linkedin_url_error"></span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form>
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

  $('#general_settings_form').on('submit', function(e){
    e.preventDefault();
    // alert('Submit....');
    var csrfName = $('.ci_csrf_data').attr('name');
    var csrfHash = $('.ci_csrf_data').val();
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
      beforeSend: function(){
        toastr.remove();
        $(form).find('span.error-text').text('');
      },
      success: function(response){
        //Update CSRF Hash
        $('.ci_csrf_data').val(response.token);

        if ($.isEmptyObject(response.error)){
          if ( response.status == 1 ) {
            $(form)[0].reset();
            toastr.success(response.msg);
          } else {
            toastr.error(response.msg);
          }
        }else{
          $.each(response.error, function(prefix, val){
            $(form).find('span.'+prefix+'_error').text(val);
          });
        }
      }
    });
  });

  //Logo Uploading
  $('input[type="file"][name="blog_logo"]').ijaboViewer({
    preview: '#logo-image-preview',
    imageShape: 'rectangular',
    allowedExtensions:['jpg','jpeg','png'],
    onErrorShape:function(message, element){
      alert(message);
    },
    onInvalidType:function(message, element){
      alert(message);
    },
    onSuccess:function(message, element){

    }    
  });

  $('#changeLogoForm').on('submit', function(e){
    e.preventDefault();
    var csrfName = $('.ci_csrf_data').attr('name');
    var csrfHash = $('.ci_csrf_data').val();
    var form = this;
    var formdata = new FormData(form);
        formdata.append(csrfName, csrfHash);
    
    var inputFileVal = $(form).find('input[type="file"][name="blog_logo"]').val();
    
    if ( inputFileVal.length > 0 ) {
      $.ajax({
        url: $(form).attr('action'),
        method: $(form).attr('method'),
        data:formdata,
        processData: false,
        dataType: 'json',
        contentType: false,
        beforeSend:function(){
          toastr.remove();
          $(form).find('span.error-text').text('');
        },
        success: function(response){
          //update CSRF hash
          $('.ci_csrf_data').val(response.token);

          if ( response.status == 1 ) {
            toastr.success(response.msg);
            $(form)[0].reset();
          } else {
            toastr.error(response.msg);
          }
        }
      });  
    } else {
      $(form).find('span.error-text').text('Please, Select Logo image file. PNG file type is recommended.');
    }
  });

  //Favicon Uploading
  $('input[type="file"][name="blog_favicon"]').ijaboViewer({
    preview: '#favicon-image-preview',
    imageShape: 'square',
    allowedExtensions:['png'],
    onErrorShape:function(message, element){
      alert(message);
    },
    onInvalidType: function(message, element){
      alert(message);
    },
    onSuccess: function(message, element){

    }
  });

  $('#changeFaviconForm').on('submit', function(e){
    e.preventDefault();
    // alert('Favicon Updated Successfully...');
    var csrfName = $('.ci_csrf_data').attr('name');
    var csrfHash = $('.ci_csrf_data').val();
    var form = this;
    var formdata = new FormData(form);
        formdata.append(csrfName, csrfHash);
    
    var inputFileVal = $(form).find('input[type="file"][name="blog_favicon"]').val();
    
    if ( inputFileVal.length > 0 ) {
      $.ajax({
        url: $(form).attr('action'),
        method: $(form).attr('method'),
        data: formdata,
        processData: false,
        dataType: 'json',
        contentType: false,
        beforeSend:function(){
          toastr.remove();
          $(form).find('span.error-text').text('');
        },
        success: function(response){
          //update CSRF hash
          $('.ci_csrf_data').val(response.token);

          if ( response.status == 1 ) {
            toastr.success(response.msg);
            $(form)[0].reset();
          } else {
            toastr.error(response.msg);
          }
        }
      });
    } else {
      $(form).find('span.error-text').text('Please, Select Favicon image file. PNG file type is recommended.');
    }
    
  });

  $('#social_media_form').on('submit', function(e){
    e.preventDefault();
    var csrfName = $('.ci_csrf_data').attr('name');
    var csrfHash = $('.ci_csrf_data').val();
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
      beforeSend: function(){
        toastr.remove();
        $(form).find('span.error-text').text('');
      },
      success: function(response){
        $('.ci_csrf_data').val(response.token);

        if ( $.isEmptyObject(response.error) ) {
          if ( response.status == 1 ) {
            toastr.success(response.msg);
          } else {
            toastr.error(response.msg);
          }
        } else {
          $.each(response.error, function(prefix, val){
            $(form).find('span.'+prefix+'_error').text(val);
          });          
        }
      }
    });


  });

</script>
<?= $this->endSection() ?>