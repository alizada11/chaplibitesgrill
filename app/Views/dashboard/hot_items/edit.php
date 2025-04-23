<?= view('dashboard/layout/header') ?>
<?= view('dashboard/layout/sidebar') ?>

<form action="<?= isset($item) ? base_url('/admin/hot-items/update/' . $item['id']) : base_url('/admin/hot-items/store') ?>" method="post" enctype="multipart/form-data">
 <div class="mb-3">
  <label>Title</label>
  <input type="text" name="title" class="form-control" value="<?= old('title', $item['title'] ?? '') ?>" required>
 </div>
 <div class="mb-3">
  <label>Description</label>
  <textarea name="description" class="form-control" required><?= old('description', $item['description'] ?? '') ?></textarea>
 </div>
 <div class="mb-3">
  <label>Price</label>
  <input type="number" name="price" class="form-control" value="<?= old('price', $item['price'] ?? '') ?>" required>
 </div>
 <div class="mb-3">
  <label>Image</label>
  <?php if (!empty($item['image'])): ?>
   <div><img src="<?= base_url($item['image']) ?>" height="100"></div>
  <?php endif; ?>
  <input type="file" name="image" class="form-control">
 </div>
 <button class="btn btn-success">Save</button>
</form>

<?= view('dashboard/layout/footer') ?>