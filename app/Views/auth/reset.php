<!DOCTYPE html>
<html>

<head>
 <title>Admin Login</title>
 <!-- Bootstrap 5 CSS -->
 <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">
 <div class="card p-4" style="min-width: 400px;">
  <h4>Reset Password</h4>
  <form action="/reset-password" method="post">
   <input type="hidden" name="token" value="<?= $token ?>">
   <input type="password" name="password" class="form-control mb-2" placeholder="New Password">
   <input type="password" name="confirm_password" class="form-control mb-2" placeholder="Confirm Password">
   <button class="btn btn-success w-100">Reset Password</button>
  </form>
 </div>
</body>

</html>