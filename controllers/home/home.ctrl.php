<?php
/**
 * Home Controller: Controller example.

 */
class HomeHomeController extends Controller
{
	protected $view = 'home/home.tpl';

	public function build()
	{

		$info = $this->getParams();
		$model = $this->getClass('HomeProductManagerModel');


		// Recuperem el valor del producte a mostrar:
		if(empty($info['url_arguments'])){
			$which = 0;
		}else{
			$which = $info['url_arguments'][0];
		}


		//$description = $model->getProductDescription(1);
		//$mostViewedProducts = $model->getMostViewedProducts();


		/*
		$sizeProducts = count($mostViewedProducts);
		$num_pagines = (int)($sizeProducts/3)-1;
		if($sizeProducts%3>0){
			$num_pagines++;
		}


		if ($which > $num_pagines){
			$this->setLayout($this->error_view);
		} else {
			$this->assign('next', ($which + 1));
			$this->assign('previous', ($which - 1));

			if ($which == 0) {
				$this->assign('is_first', true);
			} else {
				$this->assign('is_first', false);
			}

			if ($which == $num_pagines) {
				$this->assign('is_last', true);
			} else {
				$this->assign('is_last', false);
			}

			$this->setLayout($this->view);
		}

		*/


		/*
		$mostViewdProductsDescription = $model->getProductDescription();

		foreach($mostViewedProducts as $mV){

			print_r($mV);



		}

		*/




		$this->setLayout( $this->view );

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