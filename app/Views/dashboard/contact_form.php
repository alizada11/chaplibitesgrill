<?= view('dashboard/layout/header') ?>
<?= view('dashboard/layout/sidebar') ?>

<div class="container mt-4">
 <?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
 <?php endif; ?>
 <?php if (session()->getFlashdata('error')): ?>
  <div class="alert alert-danger"><?= session()->getFlashdata('success') ?></div>
 <?php endif; ?>
 <h2>Edit Contact Page</h2>
 <form method="POST" action="<?= base_url('/admin/contact-page/update') ?>" enctype="multipart/form-data">

  <?= csrf_field() ?>
  <div class="mb-3">
   <label class="form-label">Hero Title</label>
   <input type="text" name="hero_title" class="form-control" value="<?= esc($contact['hero_title'] ?? '') ?>">
  </div>

  <div class="mb-3">
   <label class="form-label">Hero Subtitle</label>
   <textarea name="hero_subtitle" class="form-control"><?= esc($contact['hero_subtitle'] ?? '') ?></textarea>
  </div>

  <div class="mb-3">
   <label class="form-label">Hero Image</label>
   <?php if (!empty($contact['hero_image'])): ?>
    <div class="mb-2">
     <img src="<?= base_url($contact['hero_image']) ?>" alt="Hero Image" style="max-height: 150px;">
    </div>
   <?php endif; ?>
   <input type="file" name="hero_image" class="form-control">
  </div>

  <div class="mb-3">
   <label class="form-label">Heading</label>
   <input type="text" name="heading" class="form-control" value="<?= esc($contact['heading'] ?? '') ?>" required>
  </div>

  <div class="mb-3">
   <label class="form-label">Subheading</label>
   <textarea name="subheading" class="form-control"><?= esc($contact['subheading'] ?? '') ?></textarea>
  </div>

  <div class="mb-3">
   <label class="form-label">Address</label>
   <textarea name="address" class="form-control"><?= esc($contact['address'] ?? '') ?></textarea>
  </div>

  <div class="mb-3">
   <label class="form-label">Phone</label>
   <input type="text" name="phone" class="form-control" value="<?= esc($contact['phone'] ?? '') ?>">
  </div>

  <div class="mb-3">
   <label class="form-label">Email</label>
   <input type="email" name="email" class="form-control" value="<?= esc($contact['email'] ?? '') ?>">
  </div>

  <button class="btn btn-primary">Save</button>
 </form>
</div>

<?= view('dashboard/layout/footer') ?>