<?php

class SharedHeadController extends Controller
{
	public function build( ){

		$session = Session::getInstance();

		$user = $session->get('id_user');

		if ($user != null){

			$this->assign('isLogged', true);

			// Recuperar info de l'usuari logejat

			$username = $session->get('username');
			$user_img = '/img/profile_img/'.$session->get('image');

			$model = $this->getClass('HomeUserManagerModel');
			$user_coins = $model->getMoney($user);

			$this->assign('user_image', $user_img);
			$this->assign('username', $username);
			$this->assign('user_coins', $user_coins);

			$model = $this->getClass('HomeUserManagerModel');
			$user_url = $model->getUserURL($username);
			$this->assign('url_user', $user_url);

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
					$session->delete('saldo');

					$session->set('id_user', 	$user_info['id_user']);
					$session->set('username', 	$user_info['username']);
					$session->set('email', 		$user_info['email']);
					$session->set('image', 		$user_info['image']);
					$session->set('saldo', 		$user_info['saldo']);

					header('Location:' .URL_ABSOLUTE);

				} else {
					header('Location:' .URL_ABSOLUTE .'/login');
				}

			}
		}


		$this->setLayout( 'shared/head.tpl' );
	}


}


?>