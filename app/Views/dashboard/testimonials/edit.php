<?= view('dashboard/layout/header') ?>
<?= view('dashboard/layout/sidebar') ?>
<h2><?= isset($testimonial) ? 'Edit' : 'Add' ?> Testimonial</h2>

<form action="<?= isset($testimonial) ? site_url('admin/testimonials/update/' . $testimonial['id']) : site_url('admin/testimonials/store') ?>" method="post" enctype="multipart/form-data">
 <?= csrf_field() ?>

 <div class="mb-3">
  <label>Name</label>
  <input type="text" name="name" class="form-control" value="<?= old('name', $testimonial['name'] ?? '') ?>">
 </div>

 <div class="mb-3">
  <label>Title</label>
  <input type="text" name="title" class="form-control" value="<?= old('title', $testimonial['title'] ?? '') ?>">
 </div>

 <div class="mb-3">
  <label>Message</label>
  <textarea name="message" class="form-control"><?= old('message', $testimonial['message'] ?? '') ?></textarea>
 </div>

 <div class="mb-3">
  <label>Image</label>
  <?php if (!empty($testimonial['image'])): ?>
   <div class="mb-2">
    <img src="<?= base_url($testimonial['image']) ?>" width="80" class="rounded">
   </div>
  <?php endif; ?>
  <input type="file" name="image" class="form-control">
 </div>

 <button class="btn btn-success">Save</button>
</form>
<?= view('dashboard/layout/footer') ?>