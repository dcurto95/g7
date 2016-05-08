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

		$latestProduct = $model->getLatestProduct();
		$mostViewedProducts = $model->getMostViewedProducts(1);
		$latestImages = $model->getLastInsertImages();


		$this->assign('image',$latestImages);
		$this->assign('mvProduct',$mostViewedProducts);
		$this->assign('lastProduct',$latestProduct);


		$this->setLayout($this->view);


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