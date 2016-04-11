<?php
/**
 * Home Controller: Controller example.

 */
class HomeRegisterController extends Controller
{
	protected $view = 'home/register.tpl';

	public function build()
	{

		$username_regex = '([A-Za-z]{6,})';
		$this->assign('username_regex', $username_regex);

		$twitter_regex = '@\w+';
		$this->assign('twitter_regex', $twitter_regex);

		$this->setLayout( $this->view );


		$name = Filter::getString('username');
		$email = Filter::getEmail('email');
		$is_submit = Filter::getString('submit');


		if($is_submit){
			//mail($email,"User code activation","Prova");
			echo("Hola: $email");

			$to = "dcurto95@gmail.com";
			$subject = "This is subject";

			$message = "<b>This is HTML message.</b>";
			$message .= "<h1>This is headline.</h1>";



			$retval = mail ($to,$subject,$message);

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