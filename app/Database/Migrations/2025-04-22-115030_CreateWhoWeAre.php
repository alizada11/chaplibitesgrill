<?php

// app/Database/Migrations/2025-04-22-CreateWhoWeAreTable.php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWhoWeAreTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'title'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'description'  => ['type' => 'TEXT'],
            'image'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('who_we_are');
    }

    public function down()
    {
        $this->forge->dropTable('who_we_are');
    }
}
