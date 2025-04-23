<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HotItemsModel;

class HotItemsController extends BaseController
{
 public function index()
 {
  $model = new HotItemsModel();
  $data['items'] = $model->findAll();
  return view('dashboard/hot_items/index', $data);
 }

 public function create()
 {
  return view('dashboard/hot_items/create');
 }

 public function store()
 {
  $model = new HotItemsModel();
  $data = $this->request->getPost();

  $file = $this->request->getFile('image');
  if ($file && $file->isValid() && !$file->hasMoved()) {
   $name = $file->getRandomName();
   $file->move('uploads/hot_items/', $name);
   $data['image'] = 'uploads/hot_items/' . $name;
  }

  $model->save($data);
  return redirect()->to('/admin/hot-items')->with('success', 'Item added!');
 }

 public function edit($id)
 {
  $model = new HotItemsModel();
  $data['item'] = $model->find($id);
  return view('dashboard/hot_items/edit', $data);
 }

 public function update($id)
 {
  $model = new HotItemsModel();
  $item = $model->find($id);
  $data = $this->request->getPost();

  $file = $this->request->getFile('image');
  if ($file && $file->isValid() && !$file->hasMoved()) {
   $name = $file->getRandomName();
   $file->move('uploads/hot_items/', $name);
   $data['image'] = 'uploads/hot_items/' . $name;
  } else {
   $data['image'] = $item['image']; // Keep old image
  }

  $model->update($id, $data);
  return redirect()->to('/admin/hot-items')->with('success', 'Item updated!');
 }

 public function delete($id)
 {
  $model = new HotItemsModel();
  $model->delete($id);
  return redirect()->to('/admin/hot-items')->with('success', 'Item deleted!');
 }
}
