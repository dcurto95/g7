<?php
/**
 * Home Controller: Controller example.

 */
class HomeEditProductController extends Controller
{

	public function build()
	{

		$session = Session::getInstance();

		$user = $session->get('id_user');

		if ($user != null){

			$view = 'home/editProduct.tpl';

			$product_float_regex = '([0-9]{1,3}([\.\,]([0-9]+)){0,1})';
			$this->assign('product_float_regex', $product_float_regex);

			$product_numeric_regex = '([0-9]{0,3})';
			$this->assign('product_numeric_regex', $product_numeric_regex);

			// Fill fields with product:

			$params = $this->getParams();
			$params = $params['url_arguments'];

			if(empty($params[0]) || $params[0] <= 0) {
				$view = 'error/error403.tpl';
				//var_dump(http_response_code(403));
				$this->setLayout( $view );
			} else {

				$prod_id = $params[0];

				// Omplir els camps!
				$model = $this->getClass('HomeProductManagerModel');
				$prod = $model->getProduct($prod_id);

				$this->assign('product_name', $prod['name']);
				$this->assign('product_name', $prod['name']);
				$this->assign('product_price', $prod['price']);
				$this->assign('product_stock', $prod['stock']);
				$this->assign('product_description', $prod['description']);
				$this->assign('product_date', $prod['date']);
				$this->assign('product_image_name', $prod['image_big']);
				$product_img = '/img/product_img_big/'.$prod['id_user'].'_'.$prod['image_big'];
				$this->assign('product_image', $product_img);

				$this->setLayout($view);

				$is_submit = Filter::getString('submit');

				$is_remove = Filter::getString('remove');

				if ($is_submit) {

					$isValid = true;

					$info['id_product'] = $prod['id_product'];
					$info['id_user'] = $prod['id_user'];

					$info['name'] = Filter::getString('product_name');
					if (strlen($info['name']) > 50) {

						$isValid = false;
					}

					$info['price'] = Filter::getString('price');
					if ($info['price'] < 0.) {
						$isValid = false;

					}

					$info['stock'] = Filter::getString('stock');
					if ($info['stock'] <= 0) {
						$isValid = false;
					}

					$info['description'] = Filter::getString('description');

					$info['date'] = Filter::getString('date');

					$date = (new \DateTime())->format('Y-m-d H:i:s');

					$givenDate = strtotime($info['date']);
					$today =strtotime($date);

					if ($givenDate < $today){
						$isValid = false;
					}


					$info['image_small'] = $_FILES["inputFile"]["name"];
					$info['image_big'] = $_FILES["inputFile"]["name"];
					$img_name = Filter::getString('img_path');
					if ($img_name != '' && $_FILES["inputFile"]["size"] > 2 * 1024 * 1024 ) {

						$isValid = false;
					}

					$path = $_FILES["inputFile"]["name"];
					$ext = pathinfo($path, PATHINFO_EXTENSION);

					if ($img_name != '' && strcmp($ext,"png")!=0 && strcmp($ext,"jpg") !=0 && strcmp($ext,"png")!=0){
						echo "-->Extensio img";
						$isValid = false;
					}

					if ($session->get('saldo') == 0) {
						// Anem a una pantalla d'error! -> Falta de diners.
						header('Location:' . URL_ABSOLUTE . '/requireMoney');
					} else {

						if ($isValid) {

							$modelProduct = $this->getClass('HomeProductManagerModel');
							$modelUser = $this->getClass('HomeUserManagerModel');
							$imageManager = $this->getClass('HomeImageManagerModel');

							$flag = false;
							if ($info['image_big'] == ''){
								$info['image_big'] = $prod['image_big'];
								$info['image_small'] = $prod['image_small'];
								$flag = true;
							}

							$modelProduct->editProduct($info);

							if ($flag == false) {
								$imageManager->changeProductImages("inputFile", $prod['image_big'], $prod['id_user']);
							}

							$modelUser->pay($session->get('id_user'), 1);
							$session->set('saldo', $modelUser->getMoney($session->get('id_user')));

							header('Location:' . URL_ABSOLUTE);

						} else {

							// Reomplir els camps!
							$this->assign('product_name', $prod['name']);
							$this->assign('product_name', $prod['name']);
							$this->assign('product_price', $prod['price']);
							$this->assign('product_stock', $prod['stock']);
							$this->assign('product_description', $prod['description']);
							$this->assign('product_date', $prod['date']);
							$this->assign('product_image_name', $prod['image_big']);
							$product_img = '/img/product_img_big/'.$prod['id_user'].'_'.$prod['image_big'];
							$this->assign('product_image', $product_img);

						}
					}

				} elseif ($is_remove) {
					// Remove product form DB:
					$modelProduct = $this->getClass('HomeProductManagerModel');
					$imageManager = $this->getClass('HomeImageManagerModel');

					$modelProduct->deleteProduct($prod_id);
					$imageManager->RemoveProductImages($prod['image_big'], $prod['id_user']);

					header('Location:' . URL_ABSOLUTE);
				}
			}
		} else {
			header('Location:' . URL_ABSOLUTE.'/error403');
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