<?php

if( DEV_MODE )
{
	$config['default']['db_driver']		= 'mysql';
	$config['default']['db_host']		= 'localhost';
	$config['default']['db_user']		= 'root';
	$config['default']['db_password']	= 'root';
	$config['default']['db_name']		= 'G7DB2';
}
else
{
	$config['default']['db_driver']		= 'mysql';
	$config['default']['db_host']		= 'localhost';
	$config['default']['db_user']		= 'root';
	$config['default']['db_password']	= '';
	$config['default']['db_name']		= 'G7DB2';
}