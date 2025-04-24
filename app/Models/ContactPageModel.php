<?php
// app/Models/ContactPageModel.php

namespace App\Models;

use CodeIgniter\Model;

class ContactPageModel extends Model
{
 protected $table      = 'contact_page';
 protected $primaryKey = 'id';
 protected $allowedFields = [
  'hero_title',
  'hero_subtitle',
  'hero_image',
  'heading',
  'subheading',
  'address',
  'phone',
  'email'
 ];
}
