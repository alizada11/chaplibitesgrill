<!-- app/Views/admin/about_form.php -->
<?= view('dashboard/layout/header') ?>
<?= view('dashboard/layout/sidebar') ?>

<div class="container py-5">
 <h2>Edit About Page</h2>

 <?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
 <?php endif; ?>
 <form action="<?= base_url('/admin/about/update') ?>" method="post" enctype="multipart/form-data">
  <?= csrf_field() ?>

  <!-- Title -->

  <div class="row">
   <div class="col-lg-6">
    <div class="mb-3">
     <label for="title" class="form-label">Page Title</label>
     <input type="text" name="title" class="form-control" value="<?= esc($about['title'] ?? '') ?>">
    </div>
   </div>
   <div class="col-lg-6">
    <!-- Description -->
    <div class="mb-3">
     <label for="description" class="form-label">Intro Description</label>
     <textarea name="description" class="form-control" rows="3"><?= esc($about['description'] ?? '') ?></textarea>
    </div>
   </div>
  </div>
  <div class="row">
   <div class="col-lg-6">
    <!-- Story -->
    <div class="mb-3">
     <label for="story" class="form-label">Our Story</label>
     <textarea name="story" class="form-control" rows="4"><?= esc($about['story'] ?? '') ?></textarea>
    </div>
   </div>
   <div class="col-lg-6">
    <!-- Mission -->
    <div class="mb-3">
     <label for="mission" class="form-label">Our Mission</label>
     <textarea name="mission" class="form-control" rows="3"><?= esc($about['mission'] ?? '') ?></textarea>
    </div>
   </div>
  </div>


  <!-- Text Sections -->
  <div class="row">
   <div class="col-md-4 mb-3">
    <label>Sustainability Text</label>
    <textarea name="sustainability_text" class="form-control"><?= esc($about['sustainability_text'] ?? '') ?></textarea>
   </div>
   <div class="col-md-4 mb-3">
    <label>Community Text</label>
    <textarea name="community_text" class="form-control"><?= esc($about['community_text'] ?? '') ?></textarea>
   </div>
   <div class="col-md-4 mb-3">
    <label>Quality Text</label>
    <textarea name="quality_text" class="form-control"><?= esc($about['quality_text'] ?? '') ?></textarea>
   </div>
  </div>

  <div class="row">
   <div class="col-lg-6">
    <!-- CTA -->
    <div class="mb-3">
     <label>CTA Title</label>
     <input type="text" name="cta_title" class="form-control" value="<?= esc($about['cta_title'] ?? '') ?>">
    </div>
   </div>
   <div class="col-lg-6">
    <div class="mb-3">
     <label>CTA Text</label>
     <textarea name="cta_text" class="form-control"><?= esc($about['cta_text'] ?? '') ?></textarea>
    </div>
   </div>
  </div>


  <!-- Image Uploads -->
  <?php
  $images = [
   'banner_image' => 'Banner Image',
   'story_image' => 'Story Image',
   'sustainability_icon' => 'Sustainability Icon',
   'community_icon' => 'Community Icon',
   'quality_icon' => 'Quality Icon',
  ];
  ?>
  <div class="row">
   <?php foreach ($images as $key => $label): ?>
    <div class="col-md-4 mb-3">
     <label><?= $label ?></label>
     <?php if (!empty($about[$key])): ?>
      <div class="mb-2">
       <img src="<?= base_url($about[$key]) ?>" alt="<?= $label ?>" class="img-fluid rounded" style="max-height: 100px;">
      </div>
     <?php endif; ?>
     <input type="file" name="<?= $key ?>" class="form-control">
     <!-- Hidden input for old image -->
     <input type="hidden" name="old_<?= $key ?>" value="<?= esc($about[$key]) ?>">
    </div>
   <?php endforeach; ?>
  </div>

  <!-- Submit -->
  <div class="text-end">
   <button type="submit" class="btn btn-primary px-4">Update About Page</button>
  </div>
 </form>
</div>


<?= view('dashboard/layout/footer') ?>