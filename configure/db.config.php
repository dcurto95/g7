<?php

if( DEV_MODE )
{
	$config['default']['db_driver']		= 'mysql';
	$config['default']['db_host']		= 'localhost';
	$config['default']['db_user']		= 'root';
	$config['default']['db_password']	= 'root';
	$config['default']['db_name']		= 'G7DB';
}
else
{
	$config['default']['db_driver']		= 'mysql';
	$config['default']['db_host']		= 'localhost';
	$config['default']['db_user']		= 'root';
	$config['default']['db_password']	= 'root';
	$config['default']['db_name']		= 'G7DB';
}