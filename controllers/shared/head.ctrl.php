<?php

class SharedHeadController extends Controller
{
	public function build( ){

		$session = Session::getInstance();

		$user = $session->get('id_user');
		//if (true){
		if ($user != null){

			$this->assign('isLogged', true);

			// Recuperar info de l'usuari logejat

			$username = $session->get('username');

			$user_img = $session->get('image');

			$this->assign('user_image', $user_img);

			$this->assign('username', $username);


			$is_submit = Filter::getString('submit');
			/* if($is_submit) { */
				/*$session->delete('id_user');
				$session->delete('username');
				$session->delete('email');
				$session->delete('image');*/
			/*}*/

		} else {
			$this->assign('isLogged', false);
			// Fer login si ho demana
			$is_submit = Filter::getString('login');

			if($is_submit) {

				$model = $this->getClass('HomeUserManagerModel');

				$login = Filter::getString('username');
				$password = Filter::getString('password');

				$userId = $model->login($login, $password);
				if ($userId >= 0){ // És un usuari

					// Actualitzar informació
					$user_info = $model->getUser($userId);

					//print_r($user_info);

					$session->delete('id_user');
					$session->delete('username');
					$session->delete('email');
					$session->delete('image');

					$session->set('id_user', 	$user_info['id_user']);
					$session->set('username', 	$user_info['username']);
					$session->set('email', 		$user_info['email']);
					$session->set('image', 		$user_info['image']);

					header('Location:' .URL_ABSOLUTE);

				} else {
					header('Location:' .URL_ABSOLUTE .'/auth/loginfail');
				}

			}
		}


		$this->setLayout( 'shared/head.tpl' );
	}


}


?>
