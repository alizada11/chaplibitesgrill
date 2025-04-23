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
  <h4>Forgot Password</h4>
  <form action="/forgot-password" method="post">
   <input type="email" name="email" class="form-control mb-2" placeholder="Your Email">
   <button class="btn btn-warning w-100">Send Reset Link</button>
  </form>
 </div>
</body>

</html>