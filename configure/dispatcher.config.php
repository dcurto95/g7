<?php
/*
 * Cada ruta SEO es mapeada a un controlador que se encuentra en el 'base.config.php'
 */

$config['default']				= 'HomeHomeController';
$config['home']					= 'HomeHomeController';

$config['register']				= 'HomeRegisterController';
$config['insertcoin']           = 'HomeInsertCoinController';
$config['auth']			    	= 'HomeAuthController';
$config['login']			    = 'HomeLoginController';
$config['logout']			    = 'HomeLogoutController';
$config['addProduct']		    = 'HomeAddProductController';
$config['editProduct']		    = 'HomeEditProductController';
$config['p']                    = 'HomeProductController';
$config['buyProduct']           = 'HomeBuyProductController';
$config['validate']             = 'HomeValidateController';
$config['find']                 = 'HomeFindProductsController';
$config['mv']                   = 'HomeMostViewedProductController';

$config['requireMoney']		    = 'ErrorErrorMoneyController';

