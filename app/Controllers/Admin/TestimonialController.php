<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TestimonialModel;
use CodeIgniter\HTTP\RequestInterface;

class TestimonialController extends BaseController
{
    public function index()
    {
        $model = new TestimonialModel();
        $data['testimonials'] = $model->findAll();
        return view('dashboard/testimonials/index', $data);
    }

    public function create()
    {
        return view('dashboard/testimonials/create');
    }

    public function store()
    {
        $model = new TestimonialModel();
        $data = $this->request->getPost();

        // Handle image
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('uploads/testimonials/', $newName);
            $data['image'] = 'uploads/testimonials/' . $newName;
        }

        $model->insert($data);
        return redirect()->to('/admin/testimonials')->with('success', 'Testimonial added successfully.');
    }

    public function edit($id)
    {
        $model = new TestimonialModel();
        $data['testimonial'] = $model->find($id);
        return view('dashboard/testimonials/edit', $data);
    }

    public function update($id)
    {
        $model = new TestimonialModel();
        $testimonial = $model->find($id);
        $data = $this->request->getPost();

        // Handle image
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            // Delete old image
            if ($testimonial['image'] && file_exists($testimonial['image'])) {
                unlink($testimonial['image']);
            }

            $newName = $image->getRandomName();
            $image->move('uploads/testimonials/', $newName);
            $data['image'] = 'uploads/testimonials/' . $newName;
        } else {
            $data['image'] = $testimonial['image']; // Keep old image
        }

        $model->update($id, $data);
        return redirect()->to('/admin/testimonials')->with('success', 'Testimonial updated successfully.');
    }

    public function delete($id)
    {
        $model = new TestimonialModel();
        $testimonial = $model->find($id);

        if ($testimonial && $testimonial['image'] && file_exists($testimonial['image'])) {
            unlink($testimonial['image']);
        }

        $model->delete($id);
        return redirect()->to('/admin/testimonials')->with('success', 'Testimonial deleted successfully.');
    }
}
