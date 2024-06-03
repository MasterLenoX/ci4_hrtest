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
    --- Department
  </div>

</div>

<?= $this->endSection() ?>