<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GalleryModel;

class GalleryController extends BaseController
{
 public function index()
 {
  $model = new GalleryModel();

  $perPage = 8;
  $data['gallery'] = $model->paginate($perPage);
  $data['pager'] = $model->pager;

  return view('dashboard/gallery/index', $data);
 }

 public function upload()
 {
  $model = new \App\Models\GalleryModel();
  $files = $this->request->getFiles();

  if ($files && isset($files['media'])) {
   foreach ($files['media'] as $file) {
    if ($file->isValid() && !$file->hasMoved()) {

     $mimeType = $file->getMimeType();
     $clientExt = strtolower($file->getClientExtension());

     // If MIME type is unknown, fallback based on extension
     if ($mimeType === 'application/octet-stream') {
      $videoExts = ['mp4', 'webm', 'ogg'];
      $imageExts = ['jpg', 'jpeg', 'png', 'gif'];

      if (in_array($clientExt, $videoExts)) {
       $type = 'video';
      } elseif (in_array($clientExt, $imageExts)) {
       $type = 'image';
      } else {
       $type = 'unknown';
      }

      $extension = $clientExt;
     } else {
      $type = str_starts_with($mimeType, 'video/') ? 'video' : 'image';

      // Use mime-type to extension map
      $mimeToExt = [
       'image/jpeg' => 'jpg',
       'image/jpg' => 'jpg',
       'image/png' => 'png',
       'image/gif' => 'gif',
       'video/mp4' => 'mp4',
       'video/webm' => 'webm',
       'video/ogg' => 'ogg',
      ];

      $extension = $mimeToExt[$mimeType] ?? $clientExt;
     }

     $newName = pathinfo($file->getRandomName(), PATHINFO_FILENAME) . '.' . $extension;
     $uploadPath = WRITEPATH . '../public/uploads/gallery';
     $file->move($uploadPath, $newName);

     $model->save([
      'file_name' => $newName,
      'file_type' => $type,
     ]);
    } else {
     echo 'Invalid file: ' . $file->getName() . '<br>';
     echo $file->getErrorString();
    }
   }

   return redirect()->back()->with('success', 'Media uploaded successfully.');
  }

  return redirect()->back()->with('error', 'No valid media files uploaded.');
 }


 public function delete($id)
 {
  $model = new GalleryModel();
  $item = $model->find($id);

  if ($item) {
   @unlink('uploads/gallery/' . $item['image']);
   $model->delete($id);
  }

  return redirect()->back()->with('success', 'Image deleted successfully');
 }
}
