<?php

namespace Fuel\Migrations;

class Create_nzdjpies
{
	public function up()
	{
		\DBUtil::create_table('nzdjpies', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'start' => array('type' => 'float'),
			'end' => array('type' => 'float'),
			'compare' => array('type' => 'float'),
			'lowest' => array('type' => 'float'),
			'highest' => array('type' => 'float'),
			'currency' => array('constraint' => 20, 'type' => 'varchar'),
			'date' => array('type' => 'date'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('nzdjpies');
	}
}