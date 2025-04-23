<?= view('dashboard/layout/header') ?>
<?= view('dashboard/layout/sidebar') ?>

<div class="container py-5">
 <h2>Edit Hero Section</h2>

 <?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
 <?php endif; ?>

 <form action="<?= base_url('admin/hero-section/update') ?>" method="post" enctype="multipart/form-data">

  <div class="mb-3">
   <label>Paragraph</label>
   <textarea name="paragraph" class="form-control" rows="4"><?= esc($hero['paragraph']) ?></textarea>
  </div>
  <div class="mb-3">
   <label>Heading</label>
   <input type="text" name="heading" class="form-control" value="<?= esc($hero['heading']) ?>">
  </div>

  <div class="mb-3">
   <label>Intro Image</label><br>
   <?php if (!empty($hero['intro_image'])): ?>
    <img src="<?= base_url($hero['intro_image']) ?>" class="img-thumbnail mb-2" style="max-width: 200px;">
   <?php endif; ?>
   <input type="file" name="intro_image" class="form-control">
  </div>

  <div class="mb-3">
   <label>Banner Image</label><br>
   <?php if (!empty($hero['banner_image'])): ?>
    <img src="<?= base_url($hero['banner_image']) ?>" class="img-thumbnail mb-2" style="max-width: 200px;">
   <?php endif; ?>
   <input type="file" name="banner_image" class="form-control">
  </div>

  <button type="submit" class="btn btn-primary">Update Hero Section</button>
 </form>
</div>
<?= view('dashboard/layout/footer') ?>