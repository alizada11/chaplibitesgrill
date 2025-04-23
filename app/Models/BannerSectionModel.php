<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerSectionModel extends Model
{
 protected $table      = 'banner_section';
 protected $primaryKey = 'id';
 protected $allowedFields = ['image'];
 protected $useTimestamps = true;
}
