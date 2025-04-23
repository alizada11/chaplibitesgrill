<?= view('dashboard/layout/header') ?>
<?= view('dashboard/layout/sidebar') ?>
<h2>How It Works</h2>
<a href="<?= base_url('admin/how-it-works/create') ?>" class="btn btn-primary mb-3">Add New</a>
<table class="table">
 <thead>
  <tr>
   <th>Icon</th>
   <th>Title</th>
   <th>Actions</th>
  </tr>
 </thead>
 <tbody>
  <?php foreach ($items as $item): ?>
   <tr>
    <td><img src="<?= base_url($item['icon']) ?>" height="50"></td>
    <td><?= esc($item['title']) ?></td>
    <td>
     <a href="<?= base_url('admin/how-it-works/edit/' . $item['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
     <form action="<?= base_url('admin/how-it-works/delete/' . $item['id']) ?>" method="post" style="display:inline;">
      <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
     </form>
    </td>
   </tr>
  <?php endforeach; ?>
 </tbody>
</table>
<?= view('dashboard/layout/footer') ?>