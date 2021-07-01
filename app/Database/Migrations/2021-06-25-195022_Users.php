<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		//
		$fields = [
				'us_nome' => [
						'name' => 'us_nome',
						'type' => 'VARCHAR',
						'constraint' => '100',
				],
		];
        $this->forge->modifyColumn('users2', $fields);			
	}

	public function down()
	{
		//
	}
}
