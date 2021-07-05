<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PatentAuthority extends Migration
{
	public function up()
	{
		//
		//
        $this->forge->addField([
            'id_pa' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'pa_name' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'pa_place' => [
                'type' => 'VARCHAR',
                'constraint' => '5'
			],
            'pa_use' => [
                'type' => 'INT',
				'default' => 0,
			],	
            'pa_monitor' => [
                'type' => 'INT',
				'default' => 0,
			],	         
			'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id_pa', true);
        $this->forge->createTable('patentsAuthority');		
	}

	public function down()
	{
		//
	}
}
