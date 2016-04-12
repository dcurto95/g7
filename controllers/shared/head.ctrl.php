<?php

class SharedHeadController extends Controller
{
	public function build( )
	{

		$isLogged = true;

		$this->assign('isLogged', $isLogged);

		if ($isLogged){
			//echo "Estic loguejat!";

			// Recuperar info de l'usuari logejat
			$username = 'Usuari';
			$user_img = 'http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-6.jpg';

			$this->assign('user_name', $username);
			$this->assign('user_image', $user_img);


		} else {
			// Fer login si ho demana

			$is_submit = Filter::getString('submit');

			if($is_submit) {
				$model = $this->getClass('HomeUserManagerModel');

				$username = Filter::getString('username');
				$password = Filter::getString('password');

				//$loginStatus = $model->login($username, $password);
				$loginStatus = false;
				if ($loginStatus){
					// Actualitzar informació

				} else {
					header('Location:' .URL_ABSOLUTE .'/auth/loginfail');
				}

			}
		}

		$this->setLayout( 'shared/head.tpl' );
	}


}


?>
