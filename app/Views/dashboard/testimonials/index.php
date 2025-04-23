<?= view('dashboard/layout/header') ?>
<?= view('dashboard/layout/sidebar') ?>
<h2>Testimonials</h2>
<a href="<?= site_url('admin/testimonials/create') ?>" class="btn btn-primary mb-3">Add Testimonial</a>

<table class="table">
 <thead>
  <tr>
   <th>Image</th>
   <th>Name</th>
   <th>Title</th>
   <th>Message</th>
   <th>Actions</th>
  </tr>
 </thead>
 <tbody>
  <?php foreach ($testimonials as $t): ?>
   <tr>
    <td><img src="<?= base_url($t['image']) ?>" width="60"></td>
    <td><?= esc($t['name']) ?></td>
    <td><?= esc($t['title']) ?></td>
    <td><?= esc($t['message']) ?></td>
    <td>
     <a href="<?= site_url('admin/testimonials/edit/' . $t['id']) ?>" class=" text-warning"><i class="fas fa-pencil"></i></a>
     <form action="<?= site_url('admin/testimonials/delete/' . $t['id']) ?>" method="post" style="display:inline;">
      <?= csrf_field() ?>
      <button onclick="return confirm('Delete this?')" class=" text-danger"><i class="fas fa-trash "></i></button>
     </form>
    </td>
   </tr>
  <?php endforeach ?>
 </tbody>
</table>
<?= view('dashboard/layout/footer') ?>