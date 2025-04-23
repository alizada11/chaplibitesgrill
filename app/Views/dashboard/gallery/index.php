<?= view('dashboard/layout/header') ?>
<?= view('dashboard/layout/sidebar') ?>

<div class="container mt-5">
 <h2 class="mb-4">Manage Gallery</h2>

 <?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
 <?php endif; ?>
 <?php if (session()->getFlashdata('error')): ?>
  <div class="alert alert-danger"><?= session()->getFlashdata('success') ?></div>
 <?php endif; ?>

 <form action="<?= site_url('admin/gallery/upload') ?>" method="post" enctype="multipart/form-data">
  <?= csrf_field() ?>
  <input type="file" name="media[]" multiple accept="image/*,video/*" required>

  <button type="submit">Upload</button>
 </form>




 <hr class="my-4">
 <div class="gallery-container py-4">
  <h2>Media Gallery (Admin)</h2>

  <div class="row">
   <?php foreach ($gallery as $item): ?>
    <div class="col-md-3 mb-4 gallery-card">
     <?php if ($item['file_type'] === 'image'): ?>
      <a href="<?= base_url('uploads/gallery/' . $item['file_name']) ?>" class="glightbox" data-gallery="admin-gallery">
       <img src="<?= base_url('uploads/gallery/' . $item['file_name']) ?>" class="img-fluid rounded shadow" />
      </a>
     <?php elseif ($item['file_type'] === 'video'): ?>
      <a href="<?= base_url('uploads/gallery/' . $item['file_name']) ?>" class="glightbox" data-gallery="admin-gallery" data-type="video">
       <video class="img-fluid rounded shadow" muted>
        <source src="<?= base_url('uploads/gallery/' . $item['file_name']) ?>" type="video/mp4">
       </video>
      </a>
     <?php endif; ?>

     <div class="text-center mt-2">
      <a href="<?= site_url('admin/gallery/delete/' . $item['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this item?')">Delete</a>
     </div>
    </div>
   <?php endforeach; ?>
  </div>

  <!-- Pagination -->
  <div class=" row mt-4 text-center">
   <?= $pager->links() ?>
  </div>
 </div>



</div>
<?= view('dashboard/layout/footer') ?>