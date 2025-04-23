<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BannerSectionModel;

class BannerSectionController extends BaseController
{
 public function index()
 {
  $model = new BannerSectionModel();
  $data['banner'] = $model->first();
  return view('dashboard/banner_form', $data);
 }
 public function update()
 {
  $model = new \App\Models\BannerSectionModel();
  $banner = $model->first();

  $data = [];
  $oldImage = $this->request->getPost('old_image');

  $file = $this->request->getFile('image');
  if ($file && $file->isValid() && !$file->hasMoved()) {
   $newName = $file->getRandomName();
   $file->move('uploads/banner_section/', $newName);
   $data['image'] = 'uploads/banner_section/' . $newName;

   // Delete old image if new one is uploaded
   if ($oldImage && file_exists($oldImage)) {
    @unlink($oldImage);
   }
  } else {
   // Keep old image
   $data['image'] = $oldImage;
  }

  if ($banner) {
   $model->update($banner['id'], $data);
  } else {
   $model->insert($data);
  }

  return redirect()->back()->with('success', 'Banner updated successfully.');
 }
}
