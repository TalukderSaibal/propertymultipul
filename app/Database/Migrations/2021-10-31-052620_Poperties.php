<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Poperties extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'single'       => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'multiple'       => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('poperties');
    }

    public function down()
    {
        $this->forge->dropTable('poperties');
    }
}
