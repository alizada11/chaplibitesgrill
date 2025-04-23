<?php

use CodeIgniter\Database\BaseUtils;
?>
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<main class="container-fluid py-5 main">

  <!-- Hero Banner -->
  <section class="hero container-fluid text-center text-lg-start d-flex flex-column flex-lg-row align-items-center gap-4">
    <div class="col-lg-6 pl-2 hero-intro">
      <div class="row">
        <di class="col-lg-6">
          <?php if (!empty($hero['intro_image'])): ?>
            <img src="<?= base_url($hero['intro_image']) ?>" alt="Intro Image" class="rating-img">
          <?php else: ?>
            <img src="<?= base_url('uploads/home/rating.png') ?>" alt="" class="rating-img">
          <?php endif; ?>
        </di>
        <di class="col-lg-6 text-right intro-vector">
          <img src="<?= base_url('uploads/home/intro-vector.png') ?>" alt="" class="intro-vector">

        </di>
      </div>

      <?php if (!empty($hero['paragraph'])): ?>
        <p class="mb-2"><?= esc($hero['paragraph']) ?></p>
      <?php else: ?>

        <p class="mb-2">Crispy, Crunchy, Veggie Deliciousness!</p>
      <?php endif; ?>


      <?php if (!empty($hero['heading'])): ?>
        <h1><?= esc($hero['heading']) ?></h1>
      <?php else: ?>

        <h1>Get fresh and delicious foods at Chaplibites!</h1>
      <?php endif; ?>
      <div class="d-flex align-items-center mt-4 gap-3">
        <a href="<?= base_url('/catering') ?>" class="btn btn-white px-4">Order Now</a>
      </div>
    </div>
    <div class="col-lg-6 text-center">
      <?php if (!empty($hero['banner_image'])): ?>
        <img src="<?= esc($hero['banner_image']) ?>" alt="Burgers" class="img-fluid">
      <?php else: ?>


        <img src="<?= base_url('uploads/home/home-banner.png') ?>" alt="Burgers" class="img-fluid">
      <?php endif; ?>
    </div>
  </section>

  <!-- Hot Items Section -->
  <section class="hot-items-section text-center">
    <h2 class="mb-3">Hot Items</h2>
    <p>Locally sourced, organic ingredients for a fresh and eco-friendly experience</p>
    <div class="container">
      <?php if (!empty($hotItems)): ?>
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php foreach ($hotItems as $item): ?>
              <!-- Slide 1 -->
              <div class="swiper-slide">
                <div class="card slide-card">
                  <?php if (!empty($item['image'])): ?>
                    <img src="<?= base_url($item['image']) ?>" class="hot-item-img" alt="<?= esc($item['title']) ?>">
                  <?php else: ?>
                    <img src="<?= base_url('uploads/home/gallery1.jpg') ?>" />
                  <?php endif; ?>
                  <h6><?= esc($item['title']) ?></h6>
                  <p>$<?= esc($item['price']) ?></p>
                </div>
              </div>
            <?php endforeach; ?>


          </div>

          <!-- Navigation arrows -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>

          <!-- Pagination dots -->
          <div class="swiper-pagination"></div>
        </div>
      <?php else: ?>
        <p class="text-muted text-center">No hot items available at the moment.</p>
      <?php endif; ?>
    </div>


  </section>
  <!-- Offer -->
  <section>
    <div>
      <?php if (!empty($bannerSection['image'])): ?>
        <section class="my-banner-section">
          <img src="<?= base_url($bannerSection['image']) ?>" class="img-fluid w-100" alt="Banner">
        </section>
      <?php else: ?>
        <img src="<?= base_url('uploads/home/offer.png') ?>" alt="" class="offer-banner">
      <?php endif; ?>
    </div>
  </section>
  <!-- Gallery -->
  <!-- Who We Are -->
  <section class="who-we-are container ">
    <div class="row">
      <?php if (!empty($who)): ?>
        <div class="col-lg-6">
          <h2><?= esc($who['title']) ?></h2>
          <p><?= esc($who['description']) ?></p>
          <span><a class="btn btn-white px-4" href="<?= base_url('/about') ?>">Learn More</a></span>
        </div>

        <div class="col-lg-6">
          <?php if ($who['image']): ?>
            <img src="<?= base_url($who['image']) ?>" alt="Who We Are" class="img-fluid rounded">
          <?php else: ?>
            <img src="<?= base_url('uploads/home/who-r-v.png') ?>" class="img-fluid mt-4" alt="Man with Burger">
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>

  </section>
  <!-- How It Works -->
  <section class="how-it-works text-center">
    <h2>How Does It Work</h2>
    <div class="container mt-7">
      <div class="row g-4">

        <?php
        if ($howItWorks):
          foreach ($howItWorks as $item): ?>
            <div class="col-md-4">
              <div class="p-4 bg-white content rounded-30 shadow">
                <img class='order-icons' src="<?= base_url($item['icon']) ?>" alt="<?= esc($item['title']) ?>">
                <h5><?= esc($item['title']) ?></h5>
                <p><?= esc($item['description']) ?></p>
              </div>
            </div>

        <?php
          endforeach;
        endif; ?>

      </div>
    </div>
  </section>
  <div class="container my-5">
    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php $i = 0; ?>
        <?php foreach ($testimonials as $testimonial): ?>
          <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
            <div class="row">
              <div class="col-md-6 offset-md-3">
                <div class="testimonial-card rounded-50">
                  <div class="quote-icon">“</div>
                  <p><?= esc($testimonial['message']) ?></p>
                  <img src="<?= esc($testimonial['image']); ?>" class="testimonial-icon" alt="">
                  <div class="stars">★★★★★</div>
                  <p><strong><?= esc($testimonial['name']) ?></strong><br><?= esc($testimonial['title']) ?></p>
                </div>
              </div>
            </div>
          </div>
          <?php $i++; ?>
        <?php endforeach; ?>
      </div>

      <!-- Navigation Arrows -->
      <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!-- Gallery -->
  <div class="container py-5">
    <h1 class="text-center mb-4">Photo Gallery</h1>

    <div class="gallery-container">
      <div class="row">
        <?php foreach ($gallery as $item): ?>
          <div class="col-md-3 mb-4 gallery-card">
            <?php if ($item['file_type'] === 'image'): ?>
              <a href="<?= base_url('uploads/gallery/' . $item['file_name']) ?>" class="glightbox" data-gallery="gallery">
                <img src="<?= base_url('uploads/gallery/' . $item['file_name']) ?>" class="img-fluid" />
              </a>
            <?php elseif ($item['file_type'] === 'video'): ?>
              <a
                href="<?= base_url('uploads/gallery/' . $item['file_name']) ?>"
                class="glightbox"
                data-gallery="gallery"
                data-type="video"
                data-source="local">
                <img src="<?= base_url('uploads/gallery/default-thumbnail.jpg') ?>" class="img-fluid" />
              </a>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>

    </div>

    <div class="shadow" id="shadowLayer"></div>

  </div>

</main>
<?= $this->endSection() ?>