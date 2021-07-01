<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lattes extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'id_lg' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'lg_name' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'lg_description' => [
                'type' => 'TEXT'
			],
            'lg_update' => [
                'type' => 'VARCHAR',
                'constraint' => '21'
			],
            'lg_own' => [
                'type' => 'INT'
			],
            'lg_public' => [
                'type' => 'INT',
				'default' => 0
			],
			'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id_lg', true);
        $this->forge->createTable('lattes_groups');
	}

	public function down()
	{
		//
	}
}
