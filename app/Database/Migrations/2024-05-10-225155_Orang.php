<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orang extends Migration
{
    public function up()
    {
        $this->forge->addField(
            array(
                'blog_id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'auto_increment' => true,
                ),
                'blog_title' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'blog_description' => array(
                    'type' => 'TEXT',
                    'null' => true,
                ),
                'created_at' => array(
                    'type' => 'DATETIME',
                    'null' => true,
                ),
                'updated_at' => array(
                    'type' => 'DATETIME',
                    'null' => true,
                ),
            )
        );
        $this->forge->addKey('blog_id', true);
        $this->forge->createTable('orang');
    }

    public function down()
    {
        $this->forge->dropTable('orang');
    }
}
