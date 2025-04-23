<?php

namespace App\Models;

use CodeIgniter\Model;

class HotItemsModel extends Model
{
 protected $table      = 'hot_items';
 protected $primaryKey = 'id';
 protected $allowedFields = ['title', 'description', 'image', 'price'];
 protected $useTimestamps = true;
}
