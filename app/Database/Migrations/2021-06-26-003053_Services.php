<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Services extends Migration
{
	public function up()
	{
		//
		$fields = [
	        'serviceDescription' => ['type' => 'TEXT']
		];		
        $this->forge->addColumn('mains', $fields);			
	}

	public function down()
	{
		//
	}
}
