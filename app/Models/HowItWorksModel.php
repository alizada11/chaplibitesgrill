<?php

namespace App\Models;

use CodeIgniter\Model;

class HowItWorksModel extends Model
{
 protected $table = 'how_it_works';
 protected $primaryKey = 'id';
 protected $allowedFields = ['title', 'description', 'icon'];
 protected $useTimestamps = true;
}
