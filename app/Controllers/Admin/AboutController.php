<?php
// app/Controllers/Admin/AboutPageController.php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AboutModel;


class AboutController extends BaseController
{
    public function index()
    {
        $aboutModel = new AboutModel();
        $about = $aboutModel->first(); // We assume one row
        if (!$about) {

            return view('dashboard/about_form', ['about' => [
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
        }

        return view('dashboard/about_form', ['about' => $about]);
    }

    public function update()
    {

        helper(['form']);

        $aboutModel = new \App\Models\AboutModel();

        // Get the existing record
        $about = $aboutModel->first();

        if (!$about) {
            // Insert first row if it doesn't exist
            $id = $aboutModel->insert([
                'title' => '',
                'description' => '',
                'story' => '',
                'mission' => '',
                'sustainability_text' => '',
                'community_text' => '',
                'quality_text' => '',
                'cta_title' => '',
                'cta_text' => '',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $about = $aboutModel->find($id);
        }


        $data = [
            'title'               => $this->request->getPost('title'),
            'description'         => $this->request->getPost('description'),
            'story'               => $this->request->getPost('story'),
            'mission'             => $this->request->getPost('mission'),
            'sustainability_text' => $this->request->getPost('sustainability_text'),
            'community_text'      => $this->request->getPost('community_text'),
            'quality_text'        => $this->request->getPost('quality_text'),
            'cta_title'           => $this->request->getPost('cta_title'),
            'cta_text'            => $this->request->getPost('cta_text'),
        ];
        $images = [
            'banner_image' => 'Banner Image',
            'story_image' => 'Story Image',
            'sustainability_icon' => 'Sustainability Icon',
            'community_icon' => 'Community Icon',
            'quality_icon' => 'Quality Icon',
        ];
        $imageFields = array_keys($images); // same keys used in the form

        foreach ($imageFields as $field) {
            $file = $this->request->getFile($field);
            $oldValue = $this->request->getPost('old_' . $field);

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('uploads/about/', $newName);
                $data[$field] = 'uploads/about/' . $newName;
            } else {
                $data[$field] = $oldValue;
            }
        }




        // Log submitted data for debugging
        log_message('debug', 'Submitted About update data: ' . json_encode($data));

        // Perform update
        $updated = $aboutModel->update($about['id'], $data);

        if ($updated) {
            return redirect()->back()->with('success', 'About page updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update About page.');
        }
    }
}
