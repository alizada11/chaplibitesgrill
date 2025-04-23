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
    <h1>Contact Chaplibites</h1>
    <p class="lead mt-3">We’d love to hear from you! Reach out with questions, feedback, or to place an order.</p>
   </div>
   <div class="col-lg-6 text-center">
    <img src="<?= base_url('uploads/home/home-banner.png') ?>" alt="Chaplibites customer service" class="img-fluid rounded-3">
   </div>
  </div>
 </section>

 <!-- Contact Form and Info Section -->
 <section class="container py-5">
  <div class="row g-4">
   <!-- Contact Form -->
   <div class="col-lg-6">
    <h2>Get in Touch</h2>
    <p class="mt-3">Fill out the form below, and we’ll get back to you as soon as possible.</p>
    <form action="<?= base_url('/contact/submit') ?>" method="POST" class="mt-4">
     <?= csrf_field() ?>
     <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
     </div>
     <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
     </div>
     <div class="mb-3">
      <label for="subject" class="form-label">Subject</label>
      <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
     </div>
     <div class="mb-3">
      <label for="message" class="form-label">Message</label>
      <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your Message" required></textarea>
     </div>
     <button type="submit" class="btn btn-white px-4">Send Message</button>
    </form>
   </div>
   <!-- Contact Info -->
   <div class="col-lg-6">
    <h2>Contact Information</h2>
    <p class="mt-3">We’re here to assist you with your orders, inquiries, or feedback.</p>
    <ul class="list-unstyled mt-4">
     <li class="mb-3">
      <img src="<?= base_url('icons/phone.svg') ?>" alt="Phone icon" class="social-icons me-2">
      <strong>Phone:</strong> +91 123-456-7890
     </li>
     <li class="mb-3">
      <img src="<?= base_url('icons/send.svg') ?>" alt="Email icon" class="social-icons me-2">
      <strong>Email:</strong> <a href="mailto:info@chaplibites.com">info@chaplibites.com</a>
     </li>
     <li class="mb-3">
      <img src="<?= base_url('icons/location.svg') ?>" alt="Location icon" class="social-icons me-2">
      <strong>Address:</strong> 123 Veggie Lane, Food City, Omman
     </li>
    </ul>

   </div>
  </div>
 </section>

 <!-- Map Section -->
 <section class="container py-5 text-center">
  <h2>Find Us</h2>
  <p class="lead mt-3">Visit us at our location or order online for pickup!</p>
  <div class="mt-4">
   <!-- Placeholder for Google Maps or static map image -->
   <!-- <img src="<?= base_url('uploads/contact/map-placeholder.png') ?>" alt="Chaplibites location map" class="img-fluid rounded-3" style="max-height: 400px;"> -->
   <!-- For an embedded Google Map, uncomment the iframe below and replace with your API key -->

   <iframe src="https://www.google.com/maps/embed?pb=YOUR_EMBED_URL" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

  </div>
 </section>

 <!-- Call to Action Section -->
 <section class="shadow text-white text-center py-5">
  <div class="container">
   <h2>Ready to Enjoy Chaplibites?</h2>
   <p class="lead mt-3">Order your fresh, veggie-packed meals today or reach out to join our community!</p>
   <div class="mt-4">
    <a href="<?= base_url('/catering') ?>" class="btn btn-white px-4">Order Now</a>
    <a href="https://www.instagram.com/chaplibites" class="btn btn-outline-light px-4 ms-2">Follow Us</a>
   </div>
  </div>
 </section>
</main>
<?= $this->endSection() ?>