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


$config['mail']							    =  PATH_ENGINE . 'mail.class.php';
$config['session']					    	=  PATH_ENGINE . 'session.class.php';
$config['user']						    	=  PATH_ENGINE . 'user.class.php';
$config['url']						    	=  PATH_ENGINE . 'url.class.php';
$config['uploader']				    		=  PATH_ENGINE . 'uploader.class.php';


$config['dispatcher']			    		=  PATH_ENGINE . 'dispatcher.class.php';


/** 
 * Controllers & Models
 *
 */

// Error Controllers
$config['ErrorError404Controller']	            = PATH_CONTROLLERS . 'error/error404.ctrl.php';
$config['ErrorError403Controller']	            = PATH_CONTROLLERS . 'error/error403.ctrl.php';
$config['ErrorErrorMoneyController']            = PATH_CONTROLLERS . 'error/errorMoney.ctrl.php';
$config['ErrorErrorCommentController']          = PATH_CONTROLLERS . 'error/errorComment.ctrl.php';
$config['ErrorErrorInsertCoinController']       = PATH_CONTROLLERS . 'error/errorInsertCoin.ctrl.php';

// Home Controllers
$config['HomeHomeController']		            = PATH_CONTROLLERS . 'home/home.ctrl.php';
$config['HomeRegisterController']	            = PATH_CONTROLLERS . 'home/register.ctrl.php';
$config['HomeInsertCoinController']	            = PATH_CONTROLLERS . 'home/insertCoin.ctrl.php';
$config['HomeAuthController']	                = PATH_CONTROLLERS . 'home/auth.ctrl.php';
$config['HomeLoginController']	                = PATH_CONTROLLERS . 'home/login.ctrl.php';
$config['HomeLogoutController']	                = PATH_CONTROLLERS . 'home/logout.ctrl.php';
$config['HomeAddProductController']	            = PATH_CONTROLLERS . 'home/addProduct.ctrl.php';
$config['HomeEditProductController']            = PATH_CONTROLLERS . 'home/editProduct.ctrl.php';
$config['HomeProductController']	            = PATH_CONTROLLERS . 'home/product.ctrl.php';
$config['HomeBuyProductController']	            = PATH_CONTROLLERS . 'home/buyProduct.ctrl.php';
$config['HomeValidateController']	            = PATH_CONTROLLERS . 'home/validate.ctrl.php';


$config['HomeFindProductsController']           = PATH_CONTROLLERS . 'home/findProducts.ctrl.php';
$config['HomeValidateInfoController']           = PATH_CONTROLLERS . 'home/validateInfo.ctrl.php';
$config['HomeSearchProductsController']         = PATH_CONTROLLERS . 'home/searchProducts.ctrl.php';
$config['HomeMostViewedProductController']	    = PATH_CONTROLLERS . 'home/mostViewedProduct.ctrl.php';
$config['HomeListEditProductController']	    = PATH_CONTROLLERS . 'home/listEditProduct.ctrl.php';
$config['HomeUserController']	                = PATH_CONTROLLERS . 'home/user.ctrl.php';
$config['HomeMyCommentsController']	            = PATH_CONTROLLERS . 'home/myComments.ctrl.php';
$config['HomeEditCommentController']	        = PATH_CONTROLLERS . 'home/editComment.ctrl.php';
$config['HomeForgotPasswordController']	        = PATH_CONTROLLERS . 'home/forgotPassword.ctrl.php';
$config['HomeRecoverPasswordController']	    = PATH_CONTROLLERS . 'home/recoverPassword.ctrl.php';

// Shared controllers
$config['SharedHeadController']		            = PATH_CONTROLLERS . 'shared/head.ctrl.php';
$config['SharedFooterController']	            = PATH_CONTROLLERS . 'shared/footer.ctrl.php';

// Models
$config['HomeUserManagerModel']	                = PATH_MODELS . 'home/user_manager.model.php';
$config['HomeProductManagerModel']	            = PATH_MODELS . 'home/product_manager.model.php';
$config['HomeImageManagerModel']	            = PATH_MODELS . 'home/image_manager.model.php';
$config['HomeCommentsManagerModel']	            = PATH_MODELS . 'home/comments_manager.model.php';