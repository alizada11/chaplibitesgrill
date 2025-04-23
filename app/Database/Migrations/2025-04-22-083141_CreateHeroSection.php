<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHeroSection extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'auto_increment' => true],
            'intro_image'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'heading'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'paragraph'      => ['type' => 'TEXT'],
            'banner_image'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('hero_section');
    }

    public function down()
    {
        $this->forge->dropTable('hero_section');
    }
}
