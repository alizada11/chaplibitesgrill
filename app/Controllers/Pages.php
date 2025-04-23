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
        return view('catering');
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
            $email = \Config\Services::email();

            $name = $this->request->getPost('name');
            $senderEmail = $this->request->getPost('email');
            $message = $this->request->getPost('message');

            $email->setTo('jawadalizada1@gmail.com');
            $email->setFrom($senderEmail, $name);
            $email->setSubject('New Catering Request');
            $email->setMessage("
            <h2>New Catering Inquiry</h2>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$senderEmail}</p>
            <p><strong>Message:</strong><br>{$message}</p>
        ");

            if ($email->send()) {
                return redirect()->back()->with('success', 'Your request has been sent successfully!');
            } else {
                // Show detailed email error
                $debugger = $email->printDebugger(['headers', 'subject', 'body']);
                echo "<pre>";
                print_r($debugger);
                echo "</pre>";
                exit; // Stop script to view the debugger output
            }
        }

        return view('contact');
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
