<!DOCTYPE html>
<html>

<head>
 <title>Register</title>
 <!-- Bootstrap 5 CSS -->
 <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
 <link rel="icon" type="image/x-icon" href="<?= base_url('favicon.png') ?>">

</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">
 <div class="card p-4" style="min-width: 400px;">
  <h4 class="mb-3">Register</h4>
  <?php if (session()->getFlashdata('error')): ?>
   <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>
  <form action="/register" method="post">
   <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
   </div>
   <div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control" required>
   </div>
   <div class="mb-3">
    <label>Confirm Password</label>
    <input type="password" name="confirm_password" class="form-control" required>
   </div>
   <button class="btn btn-primary w-100">Register</button>
  </form>
  <div class="text-center py-4">
   <span>Already have account? <a href="<?= base_url('/login') ?>">Login</a></span>
  </div>
 </div>
</body>

</html>