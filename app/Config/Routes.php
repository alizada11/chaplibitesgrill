<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::home');
$routes->match(['GET', 'POST'], 'catering', 'Pages::catering');
$routes->match(['GET', 'POST'], 'contact', 'Pages::contact');
$routes->get('about', 'Pages::about');
$routes->get('/login', 'Auth::login');
$routes->get('/gallery', 'Pages::gallery');
$routes->post('/login', 'Auth::loginPost');
$routes->get('/logout', 'Auth::logout');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::registerPost');
$routes->get('/forgot-password', 'Auth::forgotPassword');
$routes->post('/forgot-password', 'Auth::sendResetLink');
// reset
$routes->get('/reset-password/(:any)', 'Auth::resetPassword/$1');
$routes->post('/reset-password', 'Auth::resetPasswordPost');

// admin routesح
$routes->group(
 'admin',
 ['filter' => 'authGuard'],
 function ($routes) {
  $routes->get('about', 'Admin\AboutController::index');
  $routes->post('about/update', 'Admin\AboutController::update');
  // hero
  $routes->get('hero-section', 'Admin\HeroSectionController::index');
  $routes->post('hero-section/update', 'Admin\HeroSectionController::update');
  //hot items
  $routes->get('hot-items', 'Admin\HotItemsController::index');
  $routes->get('hot-items/create', 'Admin\HotItemsController::create');
  $routes->post('hot-items/store', 'Admin\HotItemsController::store');
  $routes->get('hot-items/edit/(:num)', 'Admin\HotItemsController::edit/$1');
  $routes->post('hot-items/update/(:num)', 'Admin\HotItemsController::update/$1');
  $routes->get('hot-items/delete/(:num)', 'Admin\HotItemsController::delete/$1');
  //banner
  $routes->get('banner-section', 'Admin\BannerSectionController::index');
  $routes->post('banner-section/update', 'Admin\BannerSectionController::update');

  $routes->get('who-we-are', 'Admin\WhoWeAreController::index');
  $routes->post('who-we-are/update', 'Admin\WhoWeAreController::update');

  // how it works
  $routes->get('how-it-works', 'Admin\HowItWorksController::index');
  $routes->get('how-it-works/create', 'Admin\HowItWorksController::create');
  $routes->post('how-it-works/store', 'Admin\HowItWorksController::store');
  $routes->get('how-it-works/edit/(:num)', 'Admin\HowItWorksController::edit/$1');
  $routes->post('how-it-works/update/(:num)', 'Admin\HowItWorksController::update/$1');
  $routes->post('how-it-works/delete/(:num)', 'Admin\HowItWorksController::delete/$1');
  // testimonials
  $routes->get('testimonials', 'Admin\TestimonialController::index');
  $routes->get('testimonials/create', 'Admin\TestimonialController::create');
  $routes->post('testimonials/store', 'Admin\TestimonialController::store');
  $routes->get('testimonials/edit/(:num)', 'Admin\TestimonialController::edit/$1');
  $routes->post('testimonials/update/(:num)', 'Admin\TestimonialController::update/$1');
  $routes->post('testimonials/delete/(:num)', 'Admin\TestimonialController::delete/$1');
  // gallery
  $routes->get('gallery', 'Admin\GalleryController::index');
  $routes->post('gallery/upload', 'Admin\GalleryController::upload');
  $routes->get('gallery/delete/(:num)', 'Admin\GalleryController::delete/$1');
 }
);

$routes->get('/dashboard', 'Dashboard::index');
