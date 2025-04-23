<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <title>Admin Dashboard | Chaplibites Grill</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <!-- Font Awesome -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
 <!-- GLightbox CSS + JS -->
 <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet" />

 <link rel="icon" type="image/x-icon" href="<?= base_url('favicon.png') ?>">


 <link rel="stylesheet" href="<?= base_url('assets/css/admin-style.css') ?>">
</head>

<body>

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
  <a class="navbar-brand" href="/dashboard"><i class="fas fa-utensils me-2"></i>Chaplibites Grill</a>
  <div class="ms-auto">
   <a class="navbar-brand" href="/"><i class="fas fa-eye me-1"></i>Visit Site</a>
   <a href="/logout" class="btn btn-outline-light btn-sm"><i class="fas fa-sign-out-alt me-1"></i>Logout</a>
  </div>
 </nav>

 <div class="container-fluid">
  <div class="row">
