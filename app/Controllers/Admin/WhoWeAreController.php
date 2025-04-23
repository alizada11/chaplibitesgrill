<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\WhoWeAreModel;

class WhoWeAreController extends BaseController
{
 public function index()
 {
  $model = new WhoWeAreModel();
  $data['who'] = $model->first();
  if (!$data['who']) {
   $id = $model->insert(
    [
     'title' => '',
     'description' => '',
     'image' => '',
     'created_at' => date('Y-m-d H:i:s'),
     'updated_at' => date('Y-m-d H:i:s'),
    ]
   );
   $data['who'] = $model->first($id); // Only one row expected

  }


  return view('dashboard/who_we_are_form', $data);
 }

 public function update()
 {
  $model = new WhoWeAreModel();
  $who = $model->first();

  $data = [
   'title'       => $this->request->getPost('title'),
   'description' => $this->request->getPost('description'),
  ];

  $file = $this->request->getFile('image');
  if ($file && $file->isValid() && !$file->hasMoved()) {
   if (!empty($who['image']) && file_exists($who['image'])) {
    unlink($who['image']);
   }
   $newName = $file->getRandomName();
   $file->move('uploads/who_we_are/', $newName);
   $data['image'] = 'uploads/who_we_are/' . $newName;
  } else {
   $data['image'] = $who['image']; // Keep existing image
  }

  $model->update($who['id'], $data);

  return redirect()->back()->with('success', 'Updated successfully!');
 }
}
