<?php

class Model_News_Before extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'textdate',
		'currency',
		'attention_rate',
		'title',
		'before_value',
		'forecast',
		'result',
		'date',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'news_befores';

}
