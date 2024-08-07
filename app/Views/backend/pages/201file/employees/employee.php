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
                <th scope="col">Employeee Firstname</th>
                <th scope="col">Employeee Middle Initial</th>
                <th scope="col">Employeee Lastname</th>
                <!-- <th scope="col">Date of Birth</th>
                <th scope="col">Place of Birth</th> -->
                <!-- <th scope="col">Employee Address</th> -->
                <th scope="col">Employee Email</th>
                <!-- <th scope="col">Employee Contact</th> -->
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

<?php include('empmodals/add_emp_modal.php') ?>
<?php include('empmodals/edit_emp_modal.php') ?>
<?php include('empmodals/view_emp_modal.php') ?>

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
    processing: true,
    serverSide: true,
    ajax: "<?= route_to('get-employees') ?>",
    dom: "Brtip",
    info: true,
    fnCreatedRow: function(row, data, index) {
      $('td', row).eq(0).html(index + 1);
    },
    columnDefs: [{
        orderable: false,
        targets: [0, 1, 2, 3, 4, 5, 6]
      },
      {
        visible: false,
        targets: 7
      }
    ],
    order: [
      [7, 'asc']
    ]
  });

  //update employee modal
  $(document).on('click', '.editEmployeeBtn', function(e) {
    e.preventDefault();
    var employee_id = $(this).data('id');
    // alert(employee_id);
    var url = "<?= route_to('get-employee') ?>";
    $.get(url, {employee_id: employee_id}, function(response) {
      var modal_title = 'Edit Employee';
      var modal_btn_text = 'Update Info';
      var modal = $('body').find('div#edit-employee-modal');
      modal.find('form').find('input[type="hidden"][name="employee_id"]').val(employee_id);
      modal.find('.modal-title').html(modal_title);
      modal.find('.modal-footer > button.action').html(modal_btn_text);
      modal.find('input[type="text"][name="emp_id_no"]').val(response.data.emp_id_no);
      modal.find('input[type="text"][name="emp_firstname"]').val(response.data.emp_firstname);
      modal.find('input[type="text"][name="emp_midname"]').val(response.data.emp_midname);
      modal.find('input[type="text"][name="emp_lastname"]').val(response.data.emp_lastname);
      modal.find('input[type="date"][name="emp_dob"]').val(response.data.emp_dob);
      modal.find('input[type="text"][name="emp_pob"]').val(response.data.emp_pob);
      modal.find('input[type="text"][name="emp_location_add"]').val(response.data.emp_location_add);
      modal.find('input[type="text"][name="emp_email_add"]').val(response.data.emp_email_add);
      modal.find('input[type="text"][name="emp_contact_no"]').val(response.data.emp_contact_no);
      modal.find('span.error-text').html('');
      modal.modal('show');
    }, 'json');
  });

  // Update Employee Modal form
  $('#update_employee_form').on('submit', function(e) {
    e.preventDefault();
    // alert('Employee Updated Successfully...');
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

// Delete Button
  $(document).on('click','.deleteEmployeeBtn', function(e){
    e.preventDefault();
    var employee_id = $(this).data('id');
    var url = "<?= route_to('delete-employee') ?>";
    // alert('Are you sure you want to delete this employee? '+ employee_id);
    swal.fire({
      title: 'Are you sure?',
      html: 'You want to delete this employee',
      showCloseButton: true,
      showCancelButton: true,
      cancelButtonText: 'Cancel',
      confirmButtonText: 'Yes, Delete This',
      cancelButtonColor: '#d32',
      confirmButtonColor: '#3085d6',
      width: 400,
      allowOutsideClick: false
    }).then(function(result){
      if(result.value){
        // alert('Employee is Now DELETED');
        $.get(url, { employee_id:employee_id}, function(response){
          if ( response.status == 1 ) {
            employees_DT.ajax.reload(null, false);
            toastr.success(response.msg);
          } else {
            toastr.error(response.msg);
          }
        }, 'json');
      }
    });
  });

  // View List Button
  $(document).on('click', '.viewEmployeeBtn', function(e){
    e.preventDefault();
    var employee_id = $(this).data('id');
    var url = "<?= route_to('get-employee') ?>";
    $.get(url, {
      employee_id: employee_id
    }, function(response){
      // variables
      var modal_title = 'Employee No. ' +  '<span class="text-danger"> FFI - ' + response.data.emp_id_no + '</span>';
      var modal = $('body').find('div#view-employee-modal');
      var h4_empdob = 'Date of Birth: ' + '<p><span class="text-dark font-weight-normal">' + response.data.emp_dob + '</span></p>';
      var h3_empname = 'Full Name: ' + '<p><span class="text-dark font-weight-normal"><span class="text-uppercase">'+ response.data.emp_lastname + ',</span> ' + response.data.emp_firstname + ' ' + response.data.emp_midname[0] + '. </span></p>'; 
      var h3_emppob = 'Place of Birth: ' + '<p><span class="text-dark font-weight-normal">' + response.data.emp_pob + '</span></p>'; 
      var h3_emplocation = 'Location Address: ' + '<p><span class="text-dark font-weight-normal">' + response.data.emp_location_add + '</span></p>';
      var h3_empemail = 'Email Address: ' + '<p><span class="text-dark font-weight-normal">' + response.data.emp_email_add + '</span></p>';
      var h3_empphone = 'Contact No. :' + '<p><span class="text-dark font-weight-normal">' + response.data.emp_contact_no + '</span></p>';

      // modal find
      modal.find('.modal-title').html(modal_title);
      modal.find('#text-emp_fullname').html(h3_empname);
      modal.find('#text-emp_dob').html(h4_empdob);
      modal.find('#text-emp_pob').html(h3_emppob);
      modal.find('#text-emp_location').html(h3_emplocation);
      modal.find('#text-emp_email').html(h3_empemail);
      modal.find('#text-emp_phone').html(h3_empphone);
      modal.modal('show');
    },'json');
  });

</script>
<?= $this->endSection() ?>