<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHotItems extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'auto_increment' => true],
            'title'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'description' => ['type' => 'TEXT'],
            'price'       => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'image'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('hot_items');
    }

    public function down()
    {
        $this->forge->dropTable('hot_items');
    }
}
