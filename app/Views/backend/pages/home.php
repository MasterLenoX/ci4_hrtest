<?= $this->extend('backend/layout/pages-layout') ?>
<?= $this->section('content') ?>

<div class="card-box pd-20 height-100-p mb-30">
  <div class="row align-items-center">
    <div class="col-md-4">
      <img src="/backend/vendors/images/banner-img.png" alt="">
    </div>
    <div class="col-md-8">
      <h3 class="font-18 weight-600 mb-10 text-capitalize">
        Welcome back,
        <div class="weight-700 font-30 text-primary"><?= get_user()->username ?>!!</div>
      </h3>
      <p class="font-16 max-width-700 font-italic">
        <?= get_settings()->blog_meta_desc ?>
      </p>
    </div>
  </div>
</div>

<?= $this->endSection() ?>