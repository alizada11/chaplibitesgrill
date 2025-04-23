<?php

use CodeIgniter\Database\BaseUtils;
?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<main class="container py-5 main">
 <h1>Our Gallery</h1>
 <div class="container py-5">

  <div class="gallery-container">
   <div class="row">
    <?php foreach ($gallery as $item): ?>
     <div class="col-md-3 mb-4 gallery-card">
      <?php if ($item['file_type'] === 'image'): ?>
       <a href="<?= base_url('uploads/gallery/' . $item['file_name']) ?>" class="glightbox" data-gallery="gallery">
        <img src="<?= base_url('uploads/gallery/' . $item['file_name']) ?>" class="img-fluid" />
       </a>
      <?php elseif ($item['file_type'] === 'video'): ?>
       <a
        href="<?= base_url('uploads/gallery/' . $item['file_name']) ?>"
        class="glightbox"
        data-gallery="gallery"
        data-type="video"
        data-source="local">
        <img src="<?= base_url('uploads/gallery/default-thumbnail.jpg') ?>" class="img-fluid" />
       </a>
      <?php endif; ?>
     </div>
    <?php endforeach; ?>
   </div>
   <div class="row mt-4 text-center">
    <?= $pager->links('bootstrap_pagination') ?>
   </div>


  </div>

  <div class="shadow" id="shadowLayer"></div>

 </div>
</main>
<?= $this->endSection() ?>