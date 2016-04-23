<?php
/**
 * Home Controller: Controller example.

 */
class HomeAddProductController extends Controller
{

	public function build()
	{

		$session = Session::getInstance();

		$user = $session->get('id_user');

		if ($user != null){

			$view = 'home/addProduct.tpl';

			$product_float_regex = '([0-9]{1,3}([\.\,]([0-9]+)){0,1})';
			$this->assign('product_float_regex', $product_float_regex);

			$product_numeric_regex = '([0-9]{0,3})';
			$this->assign('product_numeric_regex', $product_numeric_regex);

			$this->setLayout( $view );

			$is_submit = Filter::getString('submit');

			if($is_submit) {

				$isValid = true;

				$info['name'] = Filter::getString('product_name');
				if (strlen($info['name']) > 50){
					$isValid = false;
				}

				$info['price'] = Filter::getString('price');
				if ($info['price'] <= 0.){
					$isValid = false;
				}

				$info['stock'] = Filter::getString('stock');
				if ($info['stock'] <= 0){
					$isValid = false;
				}

				$info['description'] = Filter::getString('description');

				$info['date'] = Filter::getString('date');
				$today = strtotime(date("j F, Y"));
				$givenDate = strtotime($info['date']);
				if ($givenDate < $today){
					$isValid = false;
				}

				$info['image'] = "";//Filter::getString('image');
				//if ($info['image'].size() > 2MB){ --> A més cal comprovar extensions de la imatge!
				//	$isValid = false;
				//}

				if ($session->get('saldo') == 0){
					// Anem a una pantalla d'error! -> Falta de diners.
					header('Location:' .URL_ABSOLUTE .'/requiremoney');
				}

				if ($isValid){

					$modelProduct = $this->getClass('HomeProductManagerModel');
					$modelUser = $this->getClass('HomeUserManagerModel');

					$modelProduct->addProduct($info);
					$modelUser->pay($session->get('id_user'), 1);
					$session->set('saldo', $modelUser->getMoney($session->get('id_user')));

					header('Location:' .URL_ABSOLUTE);

				} else {

					// Reomplir els camps!
					echo "NO es valid!!!";
				}


			}

		} else {

			$view = 'error/error403.tpl';
			var_dump(http_response_code(403));
			$this->setLayout( $view );

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