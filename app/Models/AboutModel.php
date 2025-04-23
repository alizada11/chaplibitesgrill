<?php
// app/Models/AboutPageModel.php
namespace App\Models;

use CodeIgniter\Model;

class AboutModel extends Model
{
 protected $table = 'about';
 protected $primaryKey = 'id';
 protected $allowedFields = [
  'title',
  'description',
  'story',
  'mission',
  'banner_image',
  'story_image',
  'sustainability_text',
  'community_text',
  'quality_text',
  'sustainability_icon',
  'community_icon',
  'quality_icon',
  'cta_title',
  'cta_text'
 ];
}
