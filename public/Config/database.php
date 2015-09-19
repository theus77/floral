<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => 'root',
		'database' => 'scotchbox',
		'prefix' => 'floral_',
		'encoding' => 'utf8'
	);


	public $aperture = array(
			'datasource' => 'Database/Sqlite',
			'persistent' => false,
			'database' => '/var/aperture/Database/Library.apdb',
			'prefix' => '',
			//'encoding' => 'utf8',
	);
	
	public $apertureProperties = array(
			'datasource' => 'Database/Sqlite',
			'persistent' => false,
			'database' => '/var/aperture/Database/Properties.apdb',
			'prefix' => '',
			//'encoding' => 'utf8',
	);
	
	public $apertureImageProxies = array(
			'datasource' => 'Database/Sqlite',
			'persistent' => false,
			'database' => '/var/aperture/Database/ImageProxies.apdb',
			'prefix' => '',
			//'encoding' => 'utf8',
	);
	
	public $content = array(
			'datasource' => 'Database/Sqlite',
			'persistent' => false,
			'database' => '/var/www/content.sqlite',
			'prefix' => '',
			//'encoding' => 'utf8',
	);

}
