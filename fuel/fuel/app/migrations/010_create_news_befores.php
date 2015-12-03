<?php

namespace Fuel\Migrations;

class Create_news_befores
{
	public function up()
	{
		\DBUtil::create_table('news_befores', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'textdate' => array('constraint' => 20, 'type' => 'varchar'),
			'currency' => array('constraint' => 20, 'type' => 'varchar'),
			'attention_rate' => array('constraint' => 20, 'type' => 'varchar'),
			'title' => array('type' => 'text'),
			'before_value' => array('constraint' => 40, 'type' => 'varchar'),
			'forecast' => array('constraint' => 40, 'type' => 'varchar'),
			'result' => array('constraint' => 30, 'type' => 'varchar'),
			'date' => array('type' => 'date'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('news_befores');
	}
}