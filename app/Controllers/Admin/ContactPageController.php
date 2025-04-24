<?php
// app/Controllers/Admin/ContactPageController.php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ContactPageModel;

class ContactPageController extends BaseController
{
 public function index()
 {
  $model = new ContactPageModel();
  $data['contact'] = $model->first();
  if (!$data['contact']) {
   // Insert first row if it doesn't exist
   $id = $model->insert([
    'heading' => '',
    'subheading' => '',
    'address' => '',
    'phone' => '',
    'email' => '',
    'created_at' => date('Y-m-d H:i:s'),
    'updated_at' => date('Y-m-d H:i:s'),
   ]);
   $about = $model->find($id);
  }
  return view('dashboard/contact_form', $data);
 }

 public function update()
 {
  helper(['form', 'url']);
  $model = new \App\Models\ContactPageModel();
  $contact = $model->first(); // assuming one row

  $data = [
   'hero_title'    => $this->request->getPost('hero_title'),
   'hero_subtitle' => $this->request->getPost('hero_subtitle'),
   'heading'       => $this->request->getPost('heading'),
   'subheading'    => $this->request->getPost('subheading'),
   'address'       => $this->request->getPost('address'),
   'phone'         => $this->request->getPost('phone'),
   'email'         => $this->request->getPost('email'),
  ];

  // Handle image upload
  $file = $this->request->getFile('hero_image');
  if ($file && $file->isValid() && !$file->hasMoved()) {
   $newName = $file->getRandomName();
   $file->move('uploads/contact/', $newName);
   $relativePath = 'uploads/contact/' . $newName;

   // Delete old image if exists
   if (!empty($contact['hero_image']) && file_exists($contact['hero_image'])) {
    unlink($contact['hero_image']);
   }

   $data['hero_image'] = $relativePath;
  }

  $model->update($contact['id'], $data);

  return redirect()->back()->with('success', 'Contact page updated.');
 }
}
