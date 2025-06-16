<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProfiles extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'email' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'phone' => ['type' => 'VARCHAR', 'constraint' => '20'],
            'address' => ['type' => 'TEXT'],
            'study_program' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'photo' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'instagram' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => true],
            'youtube' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => true],
            'tiktok' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('profiles');
    }

    public function down()
    {
        $this->forge->dropTable('profiles');
    }
}
