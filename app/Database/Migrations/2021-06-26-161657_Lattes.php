<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lattes extends Migration
{
	public function up()
	{
		//
        $this->forge->addField([
            'id_lgm' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'lgm_group' => [
                'type' => 'INT'
            ],
            'lgm_member' => [
                'type' => 'VARCHAR',
                'constraint' => '16'
			],
			'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id_lgm', true);
        $this->forge->createTable('lattes_groups_members');		
	}

	public function down()
	{
		//
	}
}
