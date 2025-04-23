<?= view('dashboard/layout/header') ?>
<?= view('dashboard/layout/sidebar') ?>

<h2 class="mb-4">Welcome back, <?= esc(session()->get('user')['name']) ?>!</h2>

<div class="row g-4">
 <div class="col-md-4">
  <div class="card bg-primary text-white shadow-sm">
   <div class="card-body d-flex justify-content-between align-items-center">
    <div>
     <h5>Total Pages</h5>
     <h3>12</h3>
    </div>
    <div><i class="fas fa-file-alt card-icon bg-dark"></i></div>
   </div>
  </div>
 </div>
 <div class="col-md-4">
  <div class="card bg-success text-white shadow-sm">
   <div class="card-body d-flex justify-content-between align-items-center">
    <div>
     <h5>Total Posts</h5>
     <h3>35</h3>
    </div>
    <div><i class="fas fa-clipboard-list card-icon bg-dark"></i></div>
   </div>
  </div>
 </div>
 <div class="col-md-4">
  <div class="card bg-warning text-white shadow-sm">
   <div class="card-body d-flex justify-content-between align-items-center">
    <div>
     <h5>Total Banners</h5>
     <h3>5</h3>
    </div>
    <div><i class="fas fa-image card-icon bg-dark"></i></div>
   </div>
  </div>
 </div>
</div>

<?= view('dashboard/layout/footer') ?>