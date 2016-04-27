<?php
/**
 * Home Controller: Controller example.

 */
class HomeRegisterController extends Controller
{
	protected $view = 'home/register.tpl';

	public function build()
	{
		$model = $this->getClass('HomeUserManagerModel');

		$username_regex = '([A-Za-z]{6,})';
		$this->assign('username_regex', $username_regex);

		$twitter_regex = '@\w+';
		$this->assign('twitter_regex', $twitter_regex);

		$this->setLayout( $this->view );


		//Agafar valors per la creació de l'usuari
		$username = Filter::getString('username');
		$email = Filter::getEmail('email');
		$twitter = Filter::getString('twitter');

		if($twitter == ''){
			$twitter = 'null';
		}

		$password = Filter::getString('password');

		$activation_code = uniqid('AC');

		$is_submit = Filter::getString('submit');

		if($is_submit){

			$image_manager = $this->getClass('HomeImageManagerModel');

			$image_manager->AddImage("inputFile");

			$img_name = $_FILES["inputFile"]["name"];
			$img_path = '../htdocs/img/profile_img/'.$img_name;
			$image_manager->ResizeImg($img_path);

			//Creem usuari
			$model->createUser($username,$email,$twitter,$password,$img_name,$activation_code);


			// Mail:
			$subject = "This is subject";

			$message = "<b>This is HTML message.</b>";
			$message .= "<h1>This is headline.</h1>";

			$retval = mail($email,$subject,$message);

			if( $retval == true ) {
				echo "Message sent successfully...";
			}else {
				print_r(error_get_last());
				echo "Message could not be sent...";
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