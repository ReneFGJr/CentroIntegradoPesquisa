<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Services extends Migration
{
	public function up()
	{
		//
		$fields = [
	        'servicePath' => ['type' => 'VARCHAR', 'constraint' => '20']
		];		
        $this->forge->addColumn('mains', $fields);		
	}

	public function down()
	{
		//
	}
}
