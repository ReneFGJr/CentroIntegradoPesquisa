<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Patents extends Migration
{
	public function up()
	{
		//
        $this->forge->addField([
            'id_p' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'p_ip' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
            'p_family' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
			],
            'p_title' => [
                'type' => 'TEXT'
			],			
			
			'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id_p', true);
        $this->forge->createTable('patents');	
	}

	public function down()
	{
		//
	}
}
