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

			$this->assign('user_name', $username);

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
