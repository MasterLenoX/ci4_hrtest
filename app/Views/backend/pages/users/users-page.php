<?= $this->extend('backend/layout/pages-layout') ?>
<?= $this->section('content') ?>

<div class="page-header">
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <div class="title">
        <h4>Users List</h4>
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
            Users List
          </li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<?= $this->endSection() ?>