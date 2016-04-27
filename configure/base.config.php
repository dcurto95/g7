<?php
/*
 * Archivo de configuraci�n de las clases que usaremos
 * Se llama desde Configure::getClass('NombreClase');
 */

/**
 * Engine:  Don't modify.
 */
//$config['factory']						=  PATH_ENGINE . 'factory.class.php';
//$config['sql']							=  PATH_ENGINE . 'sql.class.php';


$config['mail']							=  PATH_ENGINE . 'mail.class.php';
$config['session']						=  PATH_ENGINE . 'session.class.php';
$config['user']							=  PATH_ENGINE . 'user.class.php';
$config['url']							=  PATH_ENGINE . 'url.class.php';
$config['uploader']						=  PATH_ENGINE . 'uploader.class.php';


$config['dispatcher']					=  PATH_ENGINE . 'dispatcher.class.php';


/** 
 * Controllers & Models
 *
 */

// 404 Controller
$config['ErrorError404Controller']		= PATH_CONTROLLERS . 'error/error404.ctrl.php';
$config['ErrorError403Controller']		= PATH_CONTROLLERS . 'error/error403.ctrl.php';

// Home Controller
$config['HomeHomeController']			= PATH_CONTROLLERS . 'home/home.ctrl.php';
$config['HomeRegisterController']		= PATH_CONTROLLERS . 'home/register.ctrl.php';
$config['HomeInsertCoinController']		= PATH_CONTROLLERS . 'home/insertCoin.ctrl.php';
$config['HomeAuthController']	    	= PATH_CONTROLLERS . 'home/auth.ctrl.php';
$config['HomeLoginController']	    	= PATH_CONTROLLERS . 'home/login.ctrl.php';
$config['HomeLogoutController']	    	= PATH_CONTROLLERS . 'home/logout.ctrl.php';
$config['HomeAddProductController']	    = PATH_CONTROLLERS . 'home/addProduct.ctrl.php';
$config['HomeProductController']	    = PATH_CONTROLLERS . 'home/product.ctrl.php';


// Shared controllers
$config['SharedHeadController']			= PATH_CONTROLLERS . 'shared/head.ctrl.php';
$config['SharedFooterController']		= PATH_CONTROLLERS . 'shared/footer.ctrl.php';

// Models
$config['HomeUserManagerModel']	    	= PATH_MODELS . 'home/user_manager.model.php';
$config['HomeProductManagerModel']	    = PATH_MODELS . 'home/product_manager.model.php';