<?= view('dashboard/layout/header') ?>
<?= view('dashboard/layout/sidebar') ?>
<?= session()->getFlashdata('success') ? '<div class="alert alert-success">' . session()->getFlashdata('success') . '</div>' : '' ?>
<form action="<?= base_url('admin/banner-section/update') ?>" method="post" enctype="multipart/form-data">
 <div class="col">
  <label class="mb-3" for="image">Edit/Add <sub>(1728x957)</sub>:&nbsp;&nbsp;</label>
  <input style="border:1px solid #333; border-radius:5px;" class="mb-2" type="file" name="image" class="form-control">
  <button type="submit" class="btn btn-primary">Save</button>
 </div>

 <div class="form-group mb-3">
  <label for="image">Banner Image</label>
  <?php if (!empty($banner['image'])): ?>
   <div class="row mb-2">
    <img src="<?= base_url($banner['image']) ?>" style="max-height: auto;" class="img-fluid rounded">
   </div>
   <input type="hidden" name="old_image" value="<?= esc($banner['image']) ?>">
  <?php endif; ?>
 </div>
</form>


<?= view('dashboard/layout/footer') ?>