<?php

class SharedHeadController extends Controller
{
	public function build( ){

		echo "- ";
		$session = Session::getInstance();

		print_r($session->get('user'));
		$user = $session->get('user');
		//if (true){
		if ($user != null){
			echo "Estic loguejat!";
			$this->assign('isLogged', true);


			// Recuperar info de l'usuari logejat

			$username = 'Usuari';
			$user_img = 'http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-6.jpg';

			$this->assign('username', $username);
			$this->assign('user_image', $user_img);

			$is_submit = Filter::getString('submit');
			if($is_submit) {
				$session->delete('user');
			}

		} else {
			$this->assign('isLogged', false);
			// Fer login si ho demana
			$is_submit = Filter::getString('login');

			if($is_submit) {

				$model = $this->getClass('HomeUserManagerModel');

				$username = Filter::getString('username');
				$password = Filter::getString('password');

				$userId = $model->login($username, $password);
				if ($userId >= 0){ // És un usuari

					// Actualitzar informació
					$user_info = $model->getUser($userId);
					print_r($user_info);


					$session->set('user', $user_info);
					echo " Session: ";
					print_r($session->get('user'));

				} else {
					header('Location:' .URL_ABSOLUTE .'/auth/loginfail');
				}

			}
		}

		echo " -";

		$this->setLayout( 'shared/head.tpl' );
	}


}


?>
