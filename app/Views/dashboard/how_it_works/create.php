<?= view('dashboard/layout/header') ?>
<?= view('dashboard/layout/sidebar') ?>
<form action="<?= isset($item) ? base_url('admin/how-it-works/update/' . $item['id']) : base_url('admin/how-it-works/store') ?>" method="post" enctype="multipart/form-data">
 <div class="mb-3">
  <label>Title</label>
  <input type="text" name="title" class="form-control" value="<?= $item['title'] ?? '' ?>">
 </div>
 <div class="mb-3">
  <label>Description</label>
  <textarea name="description" class="form-control"><?= $item['description'] ?? '' ?></textarea>
 </div>
 <div class="mb-3">
  <label>Icon</label>
  <?php if (!empty($item['icon'])): ?>
   <div><img src="<?= base_url($item['icon']) ?>" height="60" class="mb-2"></div>
  <?php endif; ?>
  <input type="file" name="icon" class="form-control">
 </div>
 <button class="btn btn-success">Save</button>
</form>
<?= view('dashboard/layout/footer') ?>