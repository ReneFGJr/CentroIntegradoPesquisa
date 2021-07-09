<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PatenteFiles extends Migration
{
	public function up()
	{
		//
        $this->forge->addField([
            'id_fl' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'fl_name' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'fl_status' => [
                'type' => 'int',
				'default'=> 0
			],
			'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id_fl', true);
        $this->forge->addKey('fl_name', FALSE,FALSE);
        $this->forge->createTable('patentsFileProcessing');		
	}

	public function down()
	{
		//
	}
}
