<?php
// app/Database/Migrations/2025-04-24-CreateContactPageTable.php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateContactPageTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'hero_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'hero_subtitle' => ['type' => 'TEXT', 'null' => true],
            'hero_image' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'heading'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'subheading' => ['type' => 'TEXT', 'null' => true],
            'address'    => ['type' => 'TEXT', 'null' => true],
            'phone'      => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'email'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('contact_page');
    }

    public function down()
    {
        $this->forge->dropTable('contact_page');
    }
}
