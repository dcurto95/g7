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

			$image = $_FILES["inputFile"]["name"];

			// Codi d'adició de la imatge:
			$filetmp = $_FILES["inputFile"]["tmp_name"];
			$img_path = '../htdocs/img/profile_img/'.$image;
			move_uploaded_file($filetmp,$img_path);

			$this->Img_Resize($img_path);

			//Creem usuari
			$model->createUser($username,$email,$twitter,$password,$image,$activation_code);


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

	private function Img_Resize($path) {

		$x = getimagesize($path);
		$width  = $x['0'];
		$height = $x['1'];

		$rs_width  = 200;	//resize to half of the original width.
		$rs_height = 200;	//resize to half of the original height.

		switch ($x['mime']) {
			case "image/gif":
				$img = imagecreatefromgif($path);
				break;
			case "image/jpeg":
				$img = imagecreatefromjpeg($path);
				break;
			case "image/png":
				$img = imagecreatefrompng($path);
				break;
		}

		$img_base = imagecreatetruecolor($rs_width, $rs_height);

		imagecopyresized($img_base, $img, 0, 0, 0, 0, $rs_width, $rs_height, $width, $height);

		$path_info = pathinfo($path);

		switch ($path_info['extension']) {
			case "gif":
				imagegif($img_base, $path);
				break;
			case "jpg":
				imagejpeg($img_base, $path);
				break;
			case "png":
				imagepng($img_base, $path);
				break;
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