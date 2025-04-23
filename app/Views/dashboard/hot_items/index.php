<?= view('dashboard/layout/header') ?>
<?= view('dashboard/layout/sidebar') ?>

<a href="<?= base_url('/admin/hot-items/create') ?>" class="btn btn-primary mb-3 text-right">Add Hot Item</a>

<table class="table table-bordered">
 <thead>
  <tr>
   <th>Image</th>
   <th>Title</th>
   <th>Description</th>
   <th>Price</th>
   <th>Actions</th>
  </tr>
 </thead>
 <tbody>
  <?php foreach ($items as $item): ?>
   <tr>
    <td><img src="<?= base_url($item['image']) ?>" height="50"></td>
    <td><?= esc($item['title']) ?></td>
    <td><?= esc($item['description']) ?></td>
    <td><?= esc($item['price']) ?></td>
    <td>
     <a href="<?= base_url('/admin/hot-items/edit/' . $item['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
     <a href="<?= base_url('/admin/hot-items/delete/' . $item['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
    </td>
   </tr>
  <?php endforeach; ?>
 </tbody>
</table>

<?= view('dashboard/layout/footer') ?>