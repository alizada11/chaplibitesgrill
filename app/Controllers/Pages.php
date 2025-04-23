<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\AboutModel;
use App\Models\HotItemsModel;
use App\Models\HeroSectionModel;
use App\Models\BannerSectionModel;
use App\Models\WhoWeAreModel;
use App\Models\HowItWorksModel;
use App\Models\TestimonialModel;
use App\Models\GalleryModel;

class Pages extends BaseController
{
    public function home()
    {
        // hero section data
        $heroModel = new HeroSectionModel();
        $data['hero'] = $heroModel->first(); // or ->find(1) if you know it's a single row
        //  hot items section data
        $hotItemModel = new HotItemsModel();
        $data['hotItems'] = $hotItemModel->findAll();
        // homepage banner
        $bannerModel = new BannerSectionModel();
        $data['bannerSection'] = $bannerModel->first();

        // who we are 
        // Load Who We Are data
        $whoModel = new WhoWeAreModel();
        $data['who'] = $whoModel->first();
        // how it works
        $howItWorksModel = new HowItWorksModel();
        $data['howItWorks'] = $howItWorksModel->findAll();
        // testimonials
        $tesmodel = new TestimonialModel();
        $data['testimonials'] = $tesmodel->findAll();
        // gallery
        $Gmodel = new GalleryModel();
        $data['gallery'] = $Gmodel->limit(6)->find();


        $data['body_class'] = 'homepage';
        $data['content_view'] = 'home';
        return view('home', $data);
    }

    public function catering()
    {
        if ($this->request->getMethod() === 'POST') {

            $form = $this->request->getPost('form_fields');

            $email = \Config\Services::email();

            $email->setTo('notification@chaplibitesgrill.com
');
            $email->setFrom('noreply@yourdomain.com', 'Catering Website');

            $email->setSubject('New Catering Request');

            $message = '
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <style>
    body {
      font-family: "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
      background-color: #f8f9fa;
      color: #212529;
      padding: 20px;
    }
    .email-container {
      max-width: 600px;
      margin: auto;
      background: #fff;
      border-radius: 6px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    h2 {
      color: #0d6efd;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #dee2e6;
    }
    th {
      background-color: #f1f1f1;
    }
  </style>
</head>
<body>
  <div class="email-container">
  

    <h2>New Catering Request</h2>
    <p>You received a new catering form submission. Here are the details:</p>
    <table>
      <tr><th>Field</th><th>Value</th></tr>';

            foreach ($form as $key => $value) {
                $fieldName = ucfirst(str_replace('_', ' ', $key));
                $message .= '<tr><td>' . esc($fieldName) . '</td><td>' . esc($value) . '</td></tr>';
            }

            $message .= '
    </table>
    <p style="margin-top: 20px;">Regards,<br><strong>Chapli Bites Grill</strong></p>
  </div>
</body>
</html>';


            $email->setMessage($message);

            if ($email->send()) {

                return redirect()->to('/catering')->with('success', 'Thank you! Your catering request has been submitted.');
            } else {
                return redirect()->back()->with('error', 'Email could not be sent.');
            }
        }
        if ($this->request->getMethod() === 'GET') {

            return view('catering');
        }
    }
    public function gallery()
    {
        $model = new GalleryModel();

        $perPage = 8;
        $data['gallery'] = $model->paginate($perPage);
        $data['pager'] = $model->pager;

        return view('gallery', $data);
    }
    public function contact()
    {
        if ($this->request->getMethod() === 'POST') {
            $data = $this->request->getPost();

            $email = \Config\Services::email();

            // Setup email
            $email->setTo('notification@chaplibitesgrill.com');
            $email->setFrom('notification@chaplibitesgrill.com', 'Chapli Bites Grill Website');

            $email->setSubject('📬 New Contact Message - ' . esc($data['subject']));

            // Format email content nicely
            $message = '
<html>
<head>
  <style>
    body {
      font-family: "Segoe UI", Roboto, sans-serif;
      background-color: #f8f9fa;
      padding: 30px;
      color: #212529;
    }
    .card {
      background-color: #ffffff;
      border: 1px solid #dee2e6;
      border-radius: 0.5rem;
      padding: 20px;
      max-width: 600px;
      margin: auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    .card h2 {
      color: #d9230f;
      margin-bottom: 20px;
      font-size: 24px;
      border-bottom: 1px solid #dee2e6;
      padding-bottom: 10px;
    }
    .info-group {
      margin-bottom: 15px;
    }
    .label {
      font-weight: 600;
      color: #495057;
    }
    .value {
      margin: 5px 0 0 0;
    }
    .footer {
      font-size: 12px;
      color: #6c757d;
      margin-top: 30px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>New Contact Form Submission</h2>
    
    <div class="info-group">
      <div class="label">Name:</div>
      <div class="value">' . esc($data['name']) . '</div>
    </div>

    <div class="info-group">
      <div class="label">Email:</div>
      <div class="value">' . esc($data['email']) . '</div>
    </div>

    <div class="info-group">
      <div class="label">Subject:</div>
      <div class="value">' . esc($data['subject']) . '</div>
    </div>

    <div class="info-group">
      <div class="label">Message:</div>
      <div class="value">' . nl2br(esc($data['message'])) . '</div>
    </div>

    <div class="footer">
      Sent from the Chapli Bites Grill website contact form
    </div>
  </div>
</body>
</html>';


            $email->setMessage($message);
            $email->setMailType('html');

            // Send
            if ($email->send()) {
                return redirect()->to('/contact')->with('success', 'Thanks! Your message was sent.');
            } else {
                return redirect()->to('/contact')->with('error', 'Oops! We couldn’t send your message.');
            }
        }

        return view('contact');
        // 
        // return redirect()->back();
    }


    public function about()
    {

        $aboutModel = new AboutModel();
        $about = $aboutModel->first(); // We assume one row
        if (!$about) {

            return view('about', ['about' => [
                'title' => 'About Chaplibites',
                'description' => 'Discover the story behind our passion for fresh, delicious, and eco-friendly veggie delights.',
                'story' => 'Founded in 2020, Chaplibites started as a small family-run eatery with a big dream: to make veggie burgers that are as delicious as they are sustainable. Inspired by local farms and fresh ingredients, we crafted a menu that celebrates flavor and community.

Today, we’re proud to serve crispy, crunchy, and veggie-packed meals that bring people together, all while staying true to our eco-friendly roots.',
                'mission' => 'To create mouthwatering veggie meals using locally sourced, organic ingredients, while fostering a sustainable and community-driven food culture.',
                'banner_image' => 'uploads/home/home-banner.png',
                'story_image' => 'uploads/home/story1.jpg',
                'sustainability_text' => 'We partner with local farms to reduce our carbon footprint and ensure fresh, organic ingredients.',
                'community_text' => 'We support local initiatives and engage with our customers to build a vibrant food community.',
                'quality_text' => 'Every bite is crafted with care, ensuring delicious flavors and nutritional value.

',

                'sustainability_icon' => 'icons/sustainability.svg',
                'community_icon' => 'icons/community.svg',
                'quality_icon' => 'icons/quality.svg',
                'cta_title' => 'Join the Chaplibites Community
',
                'cta_text' => 'Ready to enjoy fresh, veggie-packed meals? Order now or connect with us on social media!

'
            ]]);
        } else {

            return view('about', ['about' => $about]);
        }
    }
}
