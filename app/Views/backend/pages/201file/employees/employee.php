<?= $this->extend('backend/layout/pages-layout') ?>
<?= $this->section('content') ?>

<div class="min-height-200px">
  <div class="page-header">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="title">
          <h4>Employee Page</h4>
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
              Employee
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
              EMPLOYEE LIST
            </div>
            <div class="pull-right">
              <a href="" class="btn btn-primary rounded-1 btn-sm p-2" role="button" id="add_employee_btn">
                <i class="fa fa-plus-circle"></i> Add Employee
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-sm table-borderless table-hover table-striped" id="employee-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Employee ID</th>
                <!-- <th scope="col" colspan="3">Employee Name</th> -->
                <th scope="col">Firstname</th>
                <th scope="col">Middlename</th>
                <th scope="col">Lastname</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Place of Birth</th>
                <th scope="col">Employee Address</th>
                <th scope="col">Employee Email</th>
                <th scope="col">Employee Contact</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('empmodals/add_emp_modal.php') ?>


<?= $this->endSection() ?>
<?= $this->section('stylesheets') ?>
  <link rel="stylesheet" href="/backend/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/backend/src/plugins/datatables/css/responsive.bootstrap4.min.css">
<?= $this->endSection()?>
<?= $this->section('scripts') ?>
<script src="/backend/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="/backend/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="/backend/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="/backend/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script>
  $(document).on('click', '#add_employee_btn', function(e) {
    e.preventDefault();
    // alert('Employee Created Successfully....');
    var modal = $('body').find('div#employee-modal');
    var modal_title = 'Add Employee';
    var modal_btn_text = 'Create';
    modal.find('.modal-title').html(modal_title);
    modal.find('.modal-footer > button.action').html(modal_btn_text);
    modal.find('input.error_text').html('');
    modal.find('input[type="text"]').val('');
    modal.modal('show');
  });

  $('#add_employee_form').on('submit', function(e) {
    e.preventDefault();
    // alert('Employee Created Successfully....');
    var csrfName = $('.ci_csrf_data').attr('name');
    var csrfHash = $('.ci_csrf_data').val();
    var form = this;
    var modal = $('body').find('div#employee-modal');
    var formData = new FormData(form);
    formData.append(csrfName, csrfHash);

    // $.ajax({
    //   url: $(form).attr('action'),
    //   method: $(form).attr('method'),
    //   data: formData,
    //   processData: false,
    //   dataType: 'json',
    //   contentType: false,
    //   cache: false,
    //   beforeSend:function(){
    //     toastr.remove();
    //     $(form).find('span.error-text').text('');
    //   },     
    //   success: function(response){
    //     //Update CSRF Hash
    //     $('.ci_csrf_data').val(response.token);

    //     if ( $.isEmptyObject(response.error) ) {
    //       if(response.status == 1){
    //         $(form)[0].reset();
    //         modal.modal(hide);
    //         toastr.success(response.msg);
    //       }else{
    //         toastr.error(response.msg);
    //       }
    //     } else {
    //       $.each(response.error, function(prefix, val){
    //         $(form).find('span.'+prefix+'_error').text(val);
    //       });
    //     }
    //   }
    // });

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
          if ( response.status == 1) {
            $(form)[0].reset();
            modal.modal('hide');
            toastr.success(response.msg);
            employees_DT.ajax.reload(null, false);
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

  //Retrieve Employee Table
  var employees_DT = $('#employee-table').DataTable({
    processing:true,
    serverSide:true,
    ajax:"<?= route_to('get-employees') ?>",
    dom: "Brtip",
    info: true,
    fnCreatedRow:function(row, data, index){
      $('td', row).eq(0).html(index+1);
    },
    columnDefs:[
      { orderable:false, targets:[0,1,2,3,4,5,6,7,8,9,10] },
      { visible:false, targets: 11 }
    ],
    order: [[11, 'asc']]
  });
  
</script>
<?= $this->endSection() ?>