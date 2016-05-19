<?php
/**
 * Home Controller: Controller example.

 */
class HomeRegisterController extends Controller
{
	protected $view = 'home/register.tpl';

	public function build()
	{
		$this->assign('register_title', 'REGISTER:');

		$model = $this->getClass('HomeUserManagerModel');

		$username_regex = '([A-Za-z0-9]{6,})';
		$this->assign('username_regex', $username_regex);

		$twitter_regex = '(@\w+)';
		$this->assign('twitter_regex', $twitter_regex);

		$this->setLayout( $this->view );

		//Agafar valors per la creació de l'usuari
		$username = Filter::getString('username');
		$isValid = sizeof(preg_match($username_regex, $username)) > 0;

		$email = Filter::getString('email');
		if($isValid) {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$isValid = false;
			} else {
				$isValid = $model->validateUserNameAndMail($username,$email);
			}
		}

		$twitter = Filter::getString('twitter');
		if ($isValid && $twitter != '') {
			$isValid = sizeof(preg_match($twitter_regex, $twitter)) > 0;
		}

		$password = Filter::getString('password');
		if ($isValid) {
			$isValid = (strlen($password) <= 10) && (strlen($password) >= 6);
		}



		$activation_code = uniqid('AC');

		$is_submit = Filter::getString('submit');

		if($is_submit){

			if ($isValid) {

				$image_manager = $this->getClass('HomeImageManagerModel');

				//Creem usuari
				$img_name = $_FILES["inputFile"]["name"];

				if (Filter::getString('img_path') != '') {
					$image_manager->AddProfileImage("inputFile");
					$path = $_FILES["inputFile"]["name"];
					$ext = pathinfo($path, PATHINFO_EXTENSION);


					if (strcmp($ext,"png")!=0 && strcmp($ext,"jpg") !=0 && strcmp($ext,"png")!=0){

						$isValid = false;
					}else{
						$isValid = true;
					}
				}else{
					$img_name ="default.jpg";
				}

				$model->createUser($username, $email, $twitter, $password, $img_name, $activation_code);


				// Mail:
				$subject = "Welcome to Barrets.com";

				$message = "<html><body><p>To validate the mail click on the following link: <p>";
				$link_validate = URL_ABSOLUTE.'/validateInfo/'.$activation_code;
				$message .= "<a href='$link_validate'>Validate</a>";
				$message .= "</body></html>";

				$headers = "From: Barrets.com\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

				$retval = mail($email, $subject, $message, $headers);

				/*if ($retval == true) {
					echo "Message sent successfully...";
				} else {
					//print_r(error_get_last());
					echo "Message could not be sent...";
				}*/


				header('Location:' . URL_ABSOLUTE);
				//header('Location:' . URL_ABSOLUTE.'/validateInfo/'.$activation_code);
			} else {
				// Reomplir els camps!
				$this->assign('register_title', 'REGISTER INCORRECT, TRY AGAIN:');
				$this->assign('username', $username);
				$this->assign('email', $email);
				$this->assign('password', $password);
				$this->assign('twitter', $twitter);
			}

		}
	}


	/**
	 * With this method you can load other modules that we will need in our page. You will have these modules availables in your template inside the "modules" array (example: {$modules.head}).
	 * The sintax is the following:
	 * $modules['name_in_the_modules_array_of_Smarty_template'] = Controller_name_to_load;
	 *
	 * @return array
	 */
	public function loadModules() {
		$modules['head']	= 'SharedHeadController';
		$modules['footer']	= 'SharedFooterController';
		return $modules;
	}
}