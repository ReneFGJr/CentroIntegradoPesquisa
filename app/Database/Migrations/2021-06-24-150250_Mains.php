<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mains extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'id_service' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'service' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
            'serviceName' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
			],
            'serviceGroup' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
			],
            'serviceDescription' => [
                'type' => 'TEXT'
            ],
            'servicePath' => ['type' => 'VARCHAR', 'constraint' => '20'],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id_service', true);
        $this->forge->createTable('mains');
	}

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}
