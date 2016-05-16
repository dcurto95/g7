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
$config['search']               = 'HomeSearchProductsController';
$config['mv']                   = 'HomeMostViewedProductController';
$config['validateInfo']         = 'HomeValidateInfoController';
$config['listEditProduct']      = 'HomeListEditProductController';
$config['u']                    = 'HomeUserController';
$config['myComments']           = 'HomeMyCommentsController';
$config['editComment']          = 'HomeEditCommentController';
$config['forgotPassword']       = 'HomeForgotPasswordController';
$config['recoverPassword']      = 'HomeRecoverPasswordController';

$config['requireMoney']		    = 'ErrorErrorMoneyController';
$config['error']                = 'ErrorErrorInsertCoinController';
$config['error404']             = 'ErrorError404Controller';
$config['error403']             = 'ErrorError403Controller';
$config['errorComment']         = 'ErrorErrorCommentController';

