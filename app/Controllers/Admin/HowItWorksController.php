<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HowItWorksModel;

class HowItWorksController extends BaseController
{
 public function index()
 {
  $model = new HowItWorksModel();
  $data['items'] = $model->findAll();
  return view('dashboard/how_it_works/list', $data);
 }

 public function create()
 {
  return view('dashboard/how_it_works/create');
 }

 public function store()
 {
  $model = new HowItWorksModel();
  $data = $this->request->getPost();

  $icon = $this->request->getFile('icon');
  if ($icon && $icon->isValid() && !$icon->hasMoved()) {
   $newName = $icon->getRandomName();
   $icon->move('uploads/how_it_works', $newName);
   $data['icon'] = 'uploads/how_it_works/' . $newName;
  }

  $model->save($data);
  return redirect()->to('/admin/how-it-works')->with('success', 'Item added!');
 }

 public function edit($id)
 {
  $model = new HowItWorksModel();
  $data['item'] = $model->find($id);
  return view('dashboard/how_it_works/edit', $data);
 }

 public function update($id)
 {
  $model = new HowItWorksModel();
  $data = $this->request->getPost();

  $existing = $model->find($id);

  $icon = $this->request->getFile('icon');
  if ($icon && $icon->isValid() && !$icon->hasMoved()) {
   if (!empty($existing['icon']) && file_exists($existing['icon'])) {
    unlink($existing['icon']);
   }
   $newName = $icon->getRandomName();
   $icon->move('uploads/how_it_works', $newName);
   $data['icon'] = 'uploads/how_it_works/' . $newName;
  } else {
   $data['icon'] = $existing['icon'];
  }

  $model->update($id, $data);
  return redirect()->to('/admin/how-it-works')->with('success', 'Item updated!');
 }

 public function delete($id)
 {
  $model = new HowItWorksModel();
  $item = $model->find($id);
  if ($item && !empty($item['icon']) && file_exists($item['icon'])) {
   unlink($item['icon']);
  }
  $model->delete($id);
  return redirect()->to('/admin/how-it-works')->with('success', 'Item deleted!');
 }
}
