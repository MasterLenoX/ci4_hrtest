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
                <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Timeline</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tasks" role="tab">Tasks</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a>
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
                          <div class="task-time">09:30 am</div>
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
                          <div class="task-time">09:30 am</div>
                        </li>
                        <li>
                          <div class="date">10 Aug</div>
                          <div class="task-name">
                            <i class="ion-ios-clock"></i> Event Added
                          </div>
                          <p>
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit.
                          </p>
                          <div class="task-time">09:30 am</div>
                        </li>
                        <li>
                          <div class="date">10 Aug</div>
                          <div class="task-name">
                            <i class="ion-ios-clock"></i> Event Added
                          </div>
                          <p>
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit.
                          </p>
                          <div class="task-time">09:30 am</div>
                        </li>
                      </ul>
                    </div>
                    <div class="timeline-month">
                      <h5>July, 2020</h5>
                    </div>
                    <div class="profile-timeline-list">
                      <ul>
                        <li>
                          <div class="date">12 July</div>
                          <div class="task-name">
                            <i class="ion-android-alarm-clock"></i> Task
                            Added
                          </div>
                          <p>
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit.
                          </p>
                          <div class="task-time">09:30 am</div>
                        </li>
                        <li>
                          <div class="date">10 July</div>
                          <div class="task-name">
                            <i class="ion-ios-chatboxes"></i> Task Added
                          </div>
                          <p>
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit.
                          </p>
                          <div class="task-time">09:30 am</div>
                        </li>
                      </ul>
                    </div>
                    <div class="timeline-month">
                      <h5>June, 2020</h5>
                    </div>
                    <div class="profile-timeline-list">
                      <ul>
                        <li>
                          <div class="date">12 June</div>
                          <div class="task-name">
                            <i class="ion-android-alarm-clock"></i> Task
                            Added
                          </div>
                          <p>
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit.
                          </p>
                          <div class="task-time">09:30 am</div>
                        </li>
                        <li>
                          <div class="date">10 June</div>
                          <div class="task-name">
                            <i class="ion-ios-chatboxes"></i> Task Added
                          </div>
                          <p>
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit.
                          </p>
                          <div class="task-time">09:30 am</div>
                        </li>
                        <li>
                          <div class="date">10 June</div>
                          <div class="task-name">
                            <i class="ion-ios-clock"></i> Event Added
                          </div>
                          <p>
                            Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit.
                          </p>
                          <div class="task-time">09:30 am</div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Timeline Tab End -->
              <!-- Tasks Tab start -->
              <div class="tab-pane fade" id="tasks" role="tabpanel">
                <div class="pd-20 profile-task-wrap">
                  <div class="container pd-0">
                    <!-- Open Task start -->
                    <div class="task-title row align-items-center">
                      <div class="col-md-8 col-sm-12">
                        <h5>Open Tasks (4 Left)</h5>
                      </div>
                      <div class="col-md-4 col-sm-12 text-right">
                        <a href="task-add" data-toggle="modal" data-target="#task-add" class="bg-light-blue btn text-blue weight-500"><i class="ion-plus-round"></i> Add</a>
                      </div>
                    </div>
                    <div class="profile-task-list pb-30">
                      <ul>
                        <li>
                          <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" class="custom-control-input" id="task-1">
                            <label class="custom-control-label" for="task-1"></label>
                          </div>
                          <div class="task-type">Email</div>
                          Lorem ipsum dolor sit amet, consectetur
                          adipisicing elit. Id ea earum.
                          <div class="task-assign">
                            Assigned to Ferdinand M.
                            <div class="due-date">
                              due date <span>22 February 2019</span>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" class="custom-control-input" id="task-2">
                            <label class="custom-control-label" for="task-2"></label>
                          </div>
                          <div class="task-type">Email</div>
                          Lorem ipsum dolor sit amet.
                          <div class="task-assign">
                            Assigned to Ferdinand M.
                            <div class="due-date">
                              due date <span>22 February 2019</span>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" class="custom-control-input" id="task-3">
                            <label class="custom-control-label" for="task-3"></label>
                          </div>
                          <div class="task-type">Email</div>
                          Lorem ipsum dolor sit amet, consectetur
                          adipisicing elit.
                          <div class="task-assign">
                            Assigned to Ferdinand M.
                            <div class="due-date">
                              due date <span>22 February 2019</span>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" class="custom-control-input" id="task-4">
                            <label class="custom-control-label" for="task-4"></label>
                          </div>
                          <div class="task-type">Email</div>
                          Lorem ipsum dolor sit amet. Id ea earum.
                          <div class="task-assign">
                            Assigned to Ferdinand M.
                            <div class="due-date">
                              due date <span>22 February 2019</span>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <!-- Open Task End -->
                    <!-- Close Task start -->
                    <div class="task-title row align-items-center">
                      <div class="col-md-12 col-sm-12">
                        <h5>Closed Tasks</h5>
                      </div>
                    </div>
                    <div class="profile-task-list close-tasks">
                      <ul>
                        <li>
                          <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" class="custom-control-input" id="task-close-1" checked="" disabled="">
                            <label class="custom-control-label" for="task-close-1"></label>
                          </div>
                          <div class="task-type">Email</div>
                          Lorem ipsum dolor sit amet, consectetur
                          adipisicing elit. Id ea earum.
                          <div class="task-assign">
                            Assigned to Ferdinand M.
                            <div class="due-date">
                              due date <span>22 February 2018</span>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" class="custom-control-input" id="task-close-2" checked="" disabled="">
                            <label class="custom-control-label" for="task-close-2"></label>
                          </div>
                          <div class="task-type">Email</div>
                          Lorem ipsum dolor sit amet.
                          <div class="task-assign">
                            Assigned to Ferdinand M.
                            <div class="due-date">
                              due date <span>22 February 2018</span>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" class="custom-control-input" id="task-close-3" checked="" disabled="">
                            <label class="custom-control-label" for="task-close-3"></label>
                          </div>
                          <div class="task-type">Email</div>
                          Lorem ipsum dolor sit amet, consectetur
                          adipisicing elit.
                          <div class="task-assign">
                            Assigned to Ferdinand M.
                            <div class="due-date">
                              due date <span>22 February 2018</span>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" class="custom-control-input" id="task-close-4" checked="" disabled="">
                            <label class="custom-control-label" for="task-close-4"></label>
                          </div>
                          <div class="task-type">Email</div>
                          Lorem ipsum dolor sit amet. Id ea earum.
                          <div class="task-assign">
                            Assigned to Ferdinand M.
                            <div class="due-date">
                              due date <span>22 February 2018</span>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <!-- Close Task start -->
                    <!-- add task popup start -->
                    <div class="modal fade customscroll mCustomScrollbar _mCS_4 mCS_no_scrollbar" id="task-add" tabindex="-1" role="dialog" style="">
                      <div id="mCSB_4" class="mCustomScrollBox mCS-dark-2 mCSB_vertical mCSB_inside" style="max-height: none;" tabindex="0">
                        <div id="mCSB_4_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                  Tasks Add
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Close Modal">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body pd-0">
                                <div class="task-list-form">
                                  <ul>
                                    <li>
                                      <form>
                                        <div class="form-group row">
                                          <label class="col-md-4">Task Type</label>
                                          <div class="col-md-8">
                                            <input type="text" class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label class="col-md-4">Task Message</label>
                                          <div class="col-md-8">
                                            <textarea class="form-control"></textarea>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label class="col-md-4">Assigned to</label>
                                          <div class="col-md-8">
                                            <div class="dropdown bootstrap-select show-tick form-control"><select class="selectpicker form-control" data-style="btn-outline-primary" title="Not Chosen" multiple="" data-selected-text-format="count" data-count-selected-text="{0} people selected" tabindex="-98">
                                                <option>Ferdinand M.</option>
                                                <option>Don H. Rabon</option>
                                                <option>Ann P. Harris</option>
                                                <option>
                                                  Katie D. Verdin
                                                </option>
                                                <option>
                                                  Christopher S. Fulghum
                                                </option>
                                                <option>
                                                  Matthew C. Porter
                                                </option>
                                              </select><button type="button" class="btn dropdown-toggle btn-outline-primary bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-1" aria-haspopup="listbox" aria-expanded="false" title="Not Chosen">
                                                <div class="filter-option">
                                                  <div class="filter-option-inner">
                                                    <div class="filter-option-inner-inner">Not Chosen</div>
                                                  </div>
                                                </div>
                                              </button>
                                              <div class="dropdown-menu ">
                                                <div class="inner show" role="listbox" id="bs-select-1" tabindex="-1" aria-multiselectable="true">
                                                  <ul class="dropdown-menu inner show" role="presentation"></ul>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                          <label class="col-md-4">Due Date</label>
                                          <div class="col-md-8">
                                            <input type="text" class="form-control date-picker">
                                          </div>
                                        </div>
                                      </form>
                                    </li>
                                    <li>
                                      <a href="javascript:;" class="remove-task" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Remove Task"><i class="ion-minus-circled"></i></a>
                                      <form>
                                        <div class="form-group row">
                                          <label class="col-md-4">Task Type</label>
                                          <div class="col-md-8">
                                            <input type="text" class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label class="col-md-4">Task Message</label>
                                          <div class="col-md-8">
                                            <textarea class="form-control"></textarea>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label class="col-md-4">Assigned to</label>
                                          <div class="col-md-8">
                                            <div class="dropdown bootstrap-select show-tick form-control"><select class="selectpicker form-control" data-style="btn-outline-primary" title="Not Chosen" multiple="" data-selected-text-format="count" data-count-selected-text="{0} people selected" tabindex="-98">
                                                <option>Ferdinand M.</option>
                                                <option>Don H. Rabon</option>
                                                <option>Ann P. Harris</option>
                                                <option>
                                                  Katie D. Verdin
                                                </option>
                                                <option>
                                                  Christopher S. Fulghum
                                                </option>
                                                <option>
                                                  Matthew C. Porter
                                                </option>
                                              </select><button type="button" class="btn dropdown-toggle btn-outline-primary bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-2" aria-haspopup="listbox" aria-expanded="false" title="Not Chosen">
                                                <div class="filter-option">
                                                  <div class="filter-option-inner">
                                                    <div class="filter-option-inner-inner">Not Chosen</div>
                                                  </div>
                                                </div>
                                              </button>
                                              <div class="dropdown-menu ">
                                                <div class="inner show" role="listbox" id="bs-select-2" tabindex="-1" aria-multiselectable="true">
                                                  <ul class="dropdown-menu inner show" role="presentation"></ul>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                          <label class="col-md-4">Due Date</label>
                                          <div class="col-md-8">
                                            <input type="text" class="form-control date-picker">
                                          </div>
                                        </div>
                                      </form>
                                    </li>
                                  </ul>
                                </div>
                                <div class="add-more-task">
                                  <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add Task"><i class="ion-plus-circled"></i> Add
                                    More Task</a>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary">
                                  Add
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                  Close
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="mCSB_4_scrollbar_vertical" class="mCSB_scrollTools mCSB_4_scrollbar mCS-dark-2 mCSB_scrollTools_vertical mCSB_scrollTools_onDrag_expand" style="display: none;">
                          <div class="mCSB_draggerContainer">
                            <div id="mCSB_4_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px;">
                              <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                            </div>
                            <div class="mCSB_draggerRail"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- add task popup End -->
                  </div>
                </div>
              </div>
              <!-- Tasks Tab End -->
              <!-- Setting Tab start -->
              <div class="tab-pane fade height-100-p" id="setting" role="tabpanel">
                <div class="profile-setting">
                  <form>
                    <ul class="profile-edit-list row">
                      <li class="weight-500 col-md-6">
                        <h4 class="text-blue h5 mb-20">
                          Edit Your Personal Setting
                        </h4>
                        <div class="form-group">
                          <label>Full Name</label>
                          <input class="form-control form-control-lg" type="text">
                        </div>
                        <div class="form-group">
                          <label>Title</label>
                          <input class="form-control form-control-lg" type="text">
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input class="form-control form-control-lg" type="email">
                        </div>
                        <div class="form-group">
                          <label>Date of birth</label>
                          <input class="form-control form-control-lg date-picker" type="text">
                        </div>
                        <div class="form-group">
                          <label>Gender</label>
                          <div class="d-flex">
                            <div class="custom-control custom-radio mb-5 mr-20">
                              <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                              <label class="custom-control-label weight-400" for="customRadio4">Male</label>
                            </div>
                            <div class="custom-control custom-radio mb-5">
                              <input type="radio" id="customRadio5" name="customRadio" class="custom-control-input">
                              <label class="custom-control-label weight-400" for="customRadio5">Female</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Country</label>
                          <div class="dropdown bootstrap-select form-control form-control-lg"><select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen" tabindex="-98">
                              <option class="bs-title-option" value=""></option>
                              <option>United States</option>
                              <option>India</option>
                              <option>United Kingdom</option>
                            </select><button type="button" class="btn dropdown-toggle btn-outline-secondary btn-lg bs-placeholder" data-toggle="dropdown" role="combobox" aria-owns="bs-select-3" aria-haspopup="listbox" aria-expanded="false" title="Not Chosen">
                              <div class="filter-option">
                                <div class="filter-option-inner">
                                  <div class="filter-option-inner-inner">Not Chosen</div>
                                </div>
                              </div>
                            </button>
                            <div class="dropdown-menu ">
                              <div class="inner show" role="listbox" id="bs-select-3" tabindex="-1">
                                <ul class="dropdown-menu inner show" role="presentation"></ul>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>State/Province/Region</label>
                          <input class="form-control form-control-lg" type="text">
                        </div>
                        <div class="form-group">
                          <label>Postal Code</label>
                          <input class="form-control form-control-lg" type="text">
                        </div>
                        <div class="form-group">
                          <label>Phone Number</label>
                          <input class="form-control form-control-lg" type="text">
                        </div>
                        <div class="form-group">
                          <label>Address</label>
                          <textarea class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                          <label>Visa Card Number</label>
                          <input class="form-control form-control-lg" type="text">
                        </div>
                        <div class="form-group">
                          <label>Paypal ID</label>
                          <input class="form-control form-control-lg" type="text">
                        </div>
                        <div class="form-group">
                          <div class="custom-control custom-checkbox mb-5">
                            <input type="checkbox" class="custom-control-input" id="customCheck1-1">
                            <label class="custom-control-label weight-400" for="customCheck1-1">I agree to receive notification
                              emails</label>
                          </div>
                        </div>
                        <div class="form-group mb-0">
                          <input type="submit" class="btn btn-primary" value="Update Information">
                        </div>
                      </li>
                      <li class="weight-500 col-md-6">
                        <h4 class="text-blue h5 mb-20">
                          Edit Social Media links
                        </h4>
                        <div class="form-group">
                          <label>Facebook URL:</label>
                          <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                        </div>
                        <div class="form-group">
                          <label>Twitter URL:</label>
                          <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                        </div>
                        <div class="form-group">
                          <label>Linkedin URL:</label>
                          <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                        </div>
                        <div class="form-group">
                          <label>Instagram URL:</label>
                          <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                        </div>
                        <div class="form-group">
                          <label>Dribbble URL:</label>
                          <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                        </div>
                        <div class="form-group">
                          <label>Dropbox URL:</label>
                          <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                        </div>
                        <div class="form-group">
                          <label>Google-plus URL:</label>
                          <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                        </div>
                        <div class="form-group">
                          <label>Pinterest URL:</label>
                          <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                        </div>
                        <div class="form-group">
                          <label>Skype URL:</label>
                          <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                        </div>
                        <div class="form-group">
                          <label>Vine URL:</label>
                          <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                        </div>
                        <div class="form-group mb-0">
                          <input type="submit" class="btn btn-primary" value="Save &amp; Update">
                        </div>
                      </li>
                    </ul>
                  </form>
                </div>
              </div>
              <!-- Setting Tab End -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>