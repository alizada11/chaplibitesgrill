<!DOCTYPE html>
<html>

<head>
 <title>Admin Login</title>
 <!-- Bootstrap 5 CSS -->
 <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
 <link rel="icon" type="image/x-icon" href="<?= base_url('favicon.png') ?>">

</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">
 <div class="card p-4" style="min-width: 400px;">

  <h4 class="mb-3">Admin Login</h4>
  <?php if (session()->getFlashdata('error')): ?>
   <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('success')): ?>
   <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>
  <form action="/login" method="post">
   <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
   </div>
   <div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control" required>
   </div>
   <button class="btn btn-primary w-100">Login</button>
   <div class="text-center py-4">

    <span>Don't have account? <a href="<?= base_url('/register') ?>">Register</a></span>
    <?php if (session()->getFlashdata('error')): ?>
     <p>Forgot your password? <a href="<?= base_url('/forgot-password') ?>">Reset it</a></p>
    <?php endif; ?>
   </div>
  </form>
 </div>
</body>

</html>