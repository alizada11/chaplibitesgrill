<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title><?= esc($title ?? 'Fast Food') ?></title>
 <!-- Bootstrap 5 CSS -->
 <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
 <!-- Swiper CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
 <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">

 <!-- GLightbox CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />

 <link rel="icon" type="image/x-icon" href="<?= base_url('favicon.png') ?>">




 <style>

 </style>
</head>

<body class="<?= isset($body_class) ? $body_class : 'main'; ?>">

 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-transparent px-4">
  <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url('uploads/home/logo.jpg') ?>" class="logo rounded-circle" alt="Chaplibites"></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
   <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
   <ul class="navbar-nav ms-auto">
    <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="<?= base_url('catering') ?>">Catering</a></li>
    <li class="nav-item"><a class="nav-link" href="<?= base_url('gallery') ?>">Gallery</a></li>
    <li class="nav-item"><a class="nav-link" href="<?= base_url('about') ?>">About</a></li>
    <li class="nav-item"><a class="nav-link" href="<?= base_url('contact') ?>">Contact</a></li>
   </ul>
  </div>
 </nav>



 <!-- Page Content -->

 <?= $this->renderSection('content') ?>

 <!-- Footer -->

 <!-- Footer -->
 <footer class="footer mt-5">
  <div class="container">
   <div class="row">
    <div class="col-md-4 mb-3">
     <div class="row footer-logo">
      <div class="col-md-2">
       <img src="<?= base_url('uploads/home/logo.jpg') ?>" height="50px" width="50px" alt="">
      </div>
      <div class="col-md-10">
       <h4>CHAPLIBITES</h4>
      </div>
     </div>
     <p>Get fresh and delicious foods at Chaplibites, we catter, we ship, we collect your orders.</p>
    </div>
    <div class="col-md-2 mb-3">
     <h6>Service</h6>
     <ul class="list-unstyled">
      <li><a href="<?= base_url() ?>">Home</a></li>
      <li><a href="<?= base_url('/catering') ?>">Catering</a></li>
      <li><a href="<?= base_url('/contact') ?>">Contact</a></li>
      <li><a href="<?= base_url('/about') ?>">About</a></li>
     </ul>
    </div>
    <div class="col-md-2 mb-3">
     <h6>Follow Us</h6>
     <ul class="list-unstyled">
      <li><a href="#">Facebook</a></li>
      <li><a href="#">Instagram</a></li>
      <li><a href="#">LinkedIn</a></li>
      <li><a href="#">WhatsApp</a></li>
     </ul>
    </div>
    <div class="col-md-4">
     <h6>Subscribe For New Offer Updates!</h6>
     <form class="d-flex mt-3">
      <input type="email" class="form-control me-2" placeholder="Enter Email...">
      <button class="btn btn-orange">→</button>
     </form>
    </div>
   </div>
  </div>
  <div class="text-center mt-4">
   <small>All Rights Reserved | &#169; 2025</small>
  </div>
 </footer>


 <!-- Bootstrap 5 JS -->
 <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>


 <!-- GLightbox JS -->
 <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
 <script>
  const swiper = new Swiper('.mySwiper', {
   slidesPerView: 1, // Default for mobile <576px
   spaceBetween: 25,
   loop: true,
   slidesPerGroup: 1,
   pagination: {
    el: '.swiper-pagination',
    clickable: true,
   },
   navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
   },
   breakpoints: {
    576: {
     slidesPerView: 2,
    },
    768: {
     slidesPerView: 3,
    },
    992: {
     slidesPerView: 3,
    },
    1200: {
     slidesPerView: 4,
    },
   },
  });
 </script>
 <script>
  const lightbox = GLightbox({
   selector: '.glightbox',
   touchNavigation: true,
   loop: true,
   zoomable: true,
   autoplayVideos: true,
   plyr: {
    css: 'https://cdn.plyr.io/3.7.8/plyr.css',
    js: 'https://cdn.plyr.io/3.7.8/plyr.polyfilled.js'
   }
  });
 </script>


</body>

</html>