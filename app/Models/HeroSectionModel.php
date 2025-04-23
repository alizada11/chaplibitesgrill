<?php

namespace App\Models;

use CodeIgniter\Model;

class HeroSectionModel extends Model
{
 protected $table            = 'hero_section';
 protected $primaryKey       = 'id';
 protected $allowedFields    = ['heading', 'paragraph', 'intro_image', 'banner_image'];
 protected $useTimestamps    = true;
}
