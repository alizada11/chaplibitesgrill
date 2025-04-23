<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HeroSectionModel;

class HeroSectionController extends BaseController
{
 public function index()
 {
  $model = new HeroSectionModel();
  $data['hero'] = $model->first(); // Only one row expected
  if (!$data) {
   $id = $model->insert(
    [
     'heading' => '',
     'paragraph' => '',
     'intro_image' => '',
     'banner_image' => '',
     'created_at' => date('Y-m-d H:i:s'),
     'updated_at' => date('Y-m-d H:i:s'),
    ]
   );
   $data['hero'] = $model->first($id); // Only one row expected
  }
  return view('dashboard/hero_section_form', $data);
 }

 public function update()
 {
  $model = new HeroSectionModel();
  $hero = $model->first();

  if (!$hero) {
   return redirect()->back()->with('error', 'Hero section not found.');
  }

  $data = [
   'heading'   => $this->request->getPost('heading'),
   'paragraph' => $this->request->getPost('paragraph'),
  ];

  $existingData = $model->first(); // Adjust if using find($id)

  // File Uploads
  $imageFields = ['intro_image', 'banner_image'];

  foreach ($imageFields as $field) {
   $file = $this->request->getFile($field);

   // Check if new file is uploaded
   if ($file && $file->isValid() && !$file->hasMoved()) {
    // Optional: delete the old image from storage
    if (!empty($existingData[$field]) && file_exists($existingData[$field])) {
     unlink($existingData[$field]);
    }

    $newName = $file->getRandomName();
    $file->move('uploads/hero', $newName);
    $data[$field] = 'uploads/hero/' . $newName;
   } else {
    // No new image uploaded — don't overwrite, just keep the old image path
    $data[$field] = $existingData[$field] ?? null;
   }
  }


  $model->update($hero['id'], $data);

  return redirect()->back()->with('success', 'Hero Section updated successfully.');
 }
}
