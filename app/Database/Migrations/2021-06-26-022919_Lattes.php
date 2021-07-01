<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lattes extends Migration
{
	public function up()
	{
		//
        $this->forge->addField([
            'id_lt' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'lt_lattes' => [
                'type' => 'VARCHAR',
                'constraint' => '16'
            ],
            'lt_nome' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
			],
            'lt_update' => [
                'type' => 'VARCHAR',
                'constraint' => '21'
			],
            'lt_pais' => [
                'type' => 'VARCHAR',
                'constraint' => '3'
			],
				'lt_nivel' => [
                'type' => 'VARCHAR',
                'constraint' => '1'
			],
			'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id_lt', true);
        $this->forge->createTable('lattes');		
	}

	public function down()
	{
		//
	}
}
