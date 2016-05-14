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

				$info['id_user'] = $user;

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

				$info['image_small'] = $_FILES["inputFile"]["name"];
				$info['image_big'] 	 = $_FILES["inputFile"]["name"];

				$imageManager = $this->getClass('HomeImageManagerModel');
				if ($session->get('image_fail_flag') == null || $session->get('image_fail_flag') == false){
					$session->set('image_fail_flag',false);
					if ($_FILES["inputFile"]["size"] > 2 * 1024 * 1024 ) {
						$isValid = false;
					}
				}

				$isImgEqual = empty(Filter::getString('product_image_name'));

				if (!$isValid) {
					$id_user = $session->get('id_user');
					if ($session->get('image_fail_flag') == true){
						$imageManager->RemoveProductImageFail($info['image_big'], $id_user);
					}
					$imageManager->AddProductImageFail("inputFile", $id_user);

					$session->set('image_fail_flag', true);
					$session->set('image_fail_name', $info['image_big']);
				}

				$modelUser = $this->getClass('HomeUserManagerModel');
				$availableMoney = $modelUser->getMoney($user);
				if ($availableMoney == 0){
					// Anem a una pantalla d'error! -> Falta de diners.

					header('Location:' .URL_ABSOLUTE .'/requireMoney');
				} else {

					if ($isValid) {

						$modelProduct = $this->getClass('HomeProductManagerModel');
						$modelUser = $this->getClass('HomeUserManagerModel');

						// Processem la imatge:
						$id_user = $session->get('id_user');
						if ($session->get('image_fail_flag') == true) {

							if ($isImgEqual == true) {
								$info['image_small'] = $session->get('image_fail_name');
								$info['image_big'] = $session->get('image_fail_name');
								$imageManager->MoveProductImageFail($info['image_big'], $id_user);
							} else {
								$imageManager->RemoveProductImageFail($info['image_big'], $id_user);
								$imageManager->AddProductImages("inputFile", $id_user);
							}
						} else {
							$imageManager->AddProductImages("inputFile", $id_user);
						}

						$modelProduct->addProduct($info);
						$id_product = $modelProduct->getLastInsertID();
						$modelUser->pay($session->get('id_user'), 1);
						$session->set('saldo', $modelUser->getMoney($session->get('id_user')));

						$session->delete('image_fail_flag');
						$session->delete('image_fail_name');

						$url_product = $modelProduct->getProductURL($id_product);

						header('Location:' . URL_ABSOLUTE .$url_product);

					} else {

						// Reomplir els camps!
						$this->assign('product_name', $info['name']);
						$this->assign('product_price', $info['price']);
						$this->assign('product_stock', $info['stock']);
						$this->assign('product_description', $info['description']);
						$this->assign('product_date', $info['date']);

						// Agafa la string a partir de la '_'
						$img_name = $session->get('image_fail_name');

						$image_src = '../img/tmp_image/tmp_big_image/'.$user.'_'.$img_name;
						$this->assign('product_image', $image_src);

					}
				}

			} else {
				$image_src = "http://placehold.it/100x100";
				$this->assign('product_image', $image_src);
			}

		} else {

			$view = 'error/error403.tpl';
			//var_dump(http_response_code(403));
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