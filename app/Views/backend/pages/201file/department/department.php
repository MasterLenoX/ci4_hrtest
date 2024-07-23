<?= $this->extend('backend/layout/pages-layout') ?>
<?= $this->section('content') ?>

<div class="min-height-200px">

  <div class="page-header">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="title">
          <h4>Department Page</h4>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= route_to('admin.home') ?>">Home</a>
            </li>
            <li class="breadcrumb-item">
              201 File
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Department
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card card-box">
        <div class="card-header">
          <div class="clearfix">
            <div class="pull-left">
              DEPARTMENT LIST
            </div>
            <div class="pull-right">
              <a href="" class="btn btn-primary rounded-1 btn-sm p-2" role="button" id="add_dept_btn">
                <i class="fa fa-plus-circle"></i> Add Department
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-sm table-borderless table-hover table-striped" id="department-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Department ID</th>
                <th scope="col">Department Code</th>
                <th scope="col">Department Name</th>
                <th scope="col">Action</th>
                <th scope="col">Ordering</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

<?php include('deptmodals/add_dept_modal.php') ?>
<?php include('deptmodals/view_dept_modal.php') ?>
<?php include('deptmodals/edit_dept_modal.php') ?>

<?= $this->endSection() ?>

<?= $this->section('stylesheets') ?>
<link rel="stylesheet" href="/backend/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/backend/src/plugins/datatables/css/responsive.bootstrap4.min.css">
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="/backend/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="/backend/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="/backend/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="/backend/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script>

  $(document).on('click','#add_dept_btn', function(e){
    e.preventDefault();
    // alert('Department Modal appears');
    var modal = $('body').find('div#department-modal');
    var modal_title = 'Add Department';
    var modal_btn_text = 'Create';
    modal.find('.modal-title').html(modal_title);
    modal.find('.modal-footer > button.action').html(modal_btn_text);
    modal.find('input.error_text').html('');
    modal.find('input[type="text"]').val('');
    modal.modal('show');
  });

  $('#add_dept_form').on('submit', function(e){
    e.preventDefault();
    // alert('Department Added Successfully');
    var csrfName = $('.ci_csrf_data').attr('name');
    var csrfHash = $('.ci_csrf_data').val();
    var form = this;
    var modal = $('body').find('div#department-modal');
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
        // Update csrf Hash
        $('.ci_csrf_data').val(response.token);

        if ( $.isEmptyObject(response.error) ) {
          if ( response.status == 1 ) {
            $(form)[0].reset();
            modal.modal('hide');
            toastr.success(response.msg);
            department_DT.ajax.reload(null, false);
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

  //Retrieve Department Table
  var department_DT = $('#department-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "<?= route_to('get-department') ?>",
    dom: "Brtip",
    info: true,
    fnCreatedRow: function(row, data, index) {
      $('td', row).eq(0).html(index + 1);
    },
    columnDefs: [{
        orderable: false,
        targets: [0, 1, 2, 3, 4, 5]
      },
      {
        visible: false,
        targets: 6
      }
    ],
    order: [
      [6, 'asc']
    ]
  });




  
</script>
<?= $this->endSection() ?>
