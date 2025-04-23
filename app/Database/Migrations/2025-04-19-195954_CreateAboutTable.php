<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAboutTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                   => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'title'                => ['type' => 'VARCHAR', 'constraint' => 255],
            'description'          => ['type' => 'TEXT', 'null' => true],
            'story'                => ['type' => 'TEXT', 'null' => true],
            'mission'              => ['type' => 'TEXT', 'null' => true],
            'banner_image'         => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'story_image'          => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'sustainability_text'  => ['type' => 'TEXT', 'null' => true],
            'community_text'       => ['type' => 'TEXT', 'null' => true],
            'quality_text'         => ['type' => 'TEXT', 'null' => true],
            'sustainability_icon'  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'community_icon'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'quality_icon'         => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'cta_title'            => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'cta_text'             => ['type' => 'TEXT', 'null' => true],
            'created_at'           => ['type' => 'DATETIME', 'null' => true],
            'updated_at'           => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true); // Primary key
        $this->forge->createTable('about');
    }

    public function down()
    {
        $this->forge->dropTable('about');
    }
}
