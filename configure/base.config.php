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

// Home Controller
$config['HomeHomeController']			= PATH_CONTROLLERS . 'home/home.ctrl.php';
$config['HomeExercici1Controller']		= PATH_CONTROLLERS . 'home/exercici1.ctrl.php';
$config['HomeExercici2Controller']		= PATH_CONTROLLERS . 'home/exercici2.ctrl.php';
$config['HomeExercici3Controller']		= PATH_CONTROLLERS . 'home/exercici3.ctrl.php';


// Shared controllers
$config['SharedHeadController']			= PATH_CONTROLLERS . 'shared/head.ctrl.php';
$config['SharedFooterController']		= PATH_CONTROLLERS . 'shared/footer.ctrl.php';

$config['SharedVentController']		    = PATH_CONTROLLERS . 'shared/vent.ctrl.php';


// Models
$config['HomeGaleryModel']	    		= PATH_MODELS . 'home/galery.model.php';