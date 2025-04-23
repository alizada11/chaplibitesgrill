<?php
// app/Models/WhoWeAreModel.php

namespace App\Models;

use CodeIgniter\Model;

class WhoWeAreModel extends Model
{
 protected $table      = 'who_we_are';
 protected $primaryKey = 'id';
 protected $allowedFields = ['title', 'description', 'image'];
 protected $useTimestamps = true;
}
