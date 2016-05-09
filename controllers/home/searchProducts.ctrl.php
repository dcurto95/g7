<?php
/**
 * Home Controller: Controller example.

 */
class HomeSearchProductsController extends Controller
{
    protected $view = 'home/searchProducts.tpl';
    protected $error_view = 'error/error404.tpl';

    public function build()
    {

        $model = $this->getClass('HomeProductManagerModel');

        $name = Filter::getString('search');
        $is_submit = Filter::getString('submit');
        if($is_submit){

            $product = $model->searchProduct($name);
            $this->assign("search",$product);
            $this->assign("active", true);
        }
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