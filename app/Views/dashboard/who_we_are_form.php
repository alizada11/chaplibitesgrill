<?= view('dashboard/layout/header') ?>
<?= view('dashboard/layout/sidebar') ?>

<h2>Who We Are Section</h2>

<?php if (session()->getFlashdata('success')): ?>
 <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<form action="<?= base_url('admin/who-we-are/update') ?>" method="post" enctype="multipart/form-data">
 <div class="mb-3">
  <label>Title</label>
  <input type="text" name="title" class="form-control" value="<?= esc($who['title']) ?>">
 </div>

 <div class="mb-3">
  <label>Description</label>
  <textarea name="description" class="form-control"><?= esc($who['description']) ?></textarea>
 </div>

 <div class="mb-3">
  <label>Image</label><br>
  <?php if (!empty($who['image'])): ?>
   <img src="<?= base_url($who['image']) ?>" alt="Current Image" class="img-fluid mb-2" style="max-height: 120px;">
  <?php endif; ?>
  <input type="file" name="image" class="form-control">
 </div>

 <button class="btn btn-primary">Save</button>
</form>


<?= view('dashboard/layout/footer') ?>