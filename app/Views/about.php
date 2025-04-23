<?php

use CodeIgniter\Database\BaseUtils;
?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<main class="container-fluid py-5 main">
 <!-- Hero Section -->
 <section class="container-fluid text-center text-lg-start py-5">
  <div class="row align-items-center">
   <div class="col-lg-6">
    <h1><?= esc($about['title']) ?></h1>
    <p class="lead mt-3"><?= esc($about['description']) ?></p>
   </div>
   <div class="col-lg-6 text-center">
    <?php
    if (!$about['banner_image']) {
    ?>
     <img src="<?= base_url('uploads/home/home-banner.png') ?>" alt="Chaplibites fresh ingredients" class="img-fluid rounded-3">
    <?php } else { ?>
     <img src="<?= base_url($about['banner_image']) ?>" alt="Banner" class="img-fluid rounded-3">
    <?php }
    ?>

   </div>
  </div>
 </section>

 <!-- Our Story Section -->
 <section class="container py-5">
  <div class="row g-4">
   <div class="col-lg-6 order-lg-2">
    <?php
    if (!$about['story_image']) {
    ?>
     <img src="<?= base_url('uploads/home/story1.jpg') ?>" alt="Chaplibites kitchen" class="img-fluid rounded-3">
    <?php } else { ?>
     <img src="<?= base_url($about['story_image']) ?>" alt="Story Image" class="img-fluid rounded-3">

    <?php } ?>
   </div>
   <div class="col-lg-6 order-lg-1">
    <h2>Our Story</h2>
    <p class="mt-3"><?= esc($about['story']) ?></p>

   </div>
  </div>
 </section>

 <!-- Our Mission Section -->
 <section class=" py-5 text-center">
  <div class="container">
   <h2>Our Mission</h2>
   <p class="lead mt-3"><?= esc($about['mission']) ?></p>
   <div class="row g-4 mt-4">
    <div class="col-md-4">
     <div class="p-4  rounded-3 shadow">
      <?php
      if (!$about['sustainability_icon']) {
      ?>
       <img src="<?= base_url('icons/sustainability.svg') ?>" alt="Sustainability icon" class="order-icons mb-3">
      <?php } else { ?>
       <img src="<?= base_url($about['sustainability_icon']) ?>" alt="Sustainability icon" class="order-icons mb-3">
      <?php } ?>
      <h5>Sustainability</h5>
      <p><?= esc($about['sustainability_text']) ?></p>
     </div>
    </div>
    <div class="col-md-4">
     <div class="p-4  rounded-3 shadow">
      <?php
      if (!$about['community_icon']) {
      ?>
       <img src="<?= base_url('icons/community.svg') ?>" alt="Community icon" class="order-icons mb-3">

      <?php } else { ?>
       <img src="<?= base_url($about['community_icon']) ?>" alt="Community icon" class="order-icons mb-3">
      <?php } ?>
      <h5>Community</h5>
      <p><?= esc($about['community_text']) ?></p>
     </div>
    </div>
    <div class="col-md-4">
     <div class="p-4  rounded-3 shadow">
      <?php
      if (!$about['quality_icon']) {
      ?>
       <img src="<?= base_url('icons/quality.svg') ?>" alt="Quality icon" class="order-icons mb-3">

      <?php } else { ?>
       <img src="<?= base_url($about['quality_icon']) ?>" alt="Quality icon" class="order-icons mb-3">
      <?php } ?>
      <h5>Quality</h5>
      <p><?= esc($about['quality_text']) ?></p>
     </div>
    </div>
   </div>
  </div>
 </section>

 <!-- Our Team Section -->

 <!-- Call to Action Section -->
 <section class="shadow text-white text-center py-5">
  <div class="container">
   <h2><?= esc($about['cta_title']) ?></h2>
   <p class="lead mt-3"><?= esc($about['cta_text']) ?></p>
   <div class="mt-4">
    <a href="<?= base_url('/catering') ?>" class="btn btn-white px-4">Order Now</a>
    <a href="https://www.instagram.com/chaplibites" class="btn btn-outline-light px-4 ms-2">Follow Us</a>
   </div>
  </div>
 </section>
</main>
<?= $this->endSection() ?>