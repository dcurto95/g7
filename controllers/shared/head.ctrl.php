<?php

class SharedHeadController extends Controller
{
	public function build( )
	{

		echo session_status();

		$this->assign('isLogged', session_status());

		if (session_status() == PHP_SESSION_ACTIVE){
			echo "Estic loguejat!";

			// Recuperar info de l'usuari logejat

			$username = 'Usuari';
			$user_img = 'http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-6.jpg';

			$this->assign('username', $username);
			$this->assign('user_image', $user_img);

			$is_submit = Filter::getString('submit');
			if($is_submit) {
				session_destroy();
			}


		} else {
			// Fer login si ho demana
			$is_submit = Filter::getString('submit');

			if($is_submit) {
				$model = $this->getClass('HomeUserManagerModel');

				$username = Filter::getString('username');
				$password = Filter::getString('password');

				$userId = $model->login($username, $password);
				if ($userId >= 0){ // És un usuari
					// Actualitzar informació
					$user_info = $model->getUser($userId);
					print_r($user_info);

					session_start();
					$_SESSION['user'] = $user_info;


				} else {
					header('Location:' .URL_ABSOLUTE .'/auth/loginfail');
				}

			}
		}

		$this->setLayout( 'shared/head.tpl' );
	}


}


?>
