<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 04/05/2016
 * Time: 19:13
 */

class HomeMostViewedProductController extends Controller
{
    protected $view = 'home/mostViewedProduct.tpl';

    public function build()
    {

        $info = $this->getParams();
        $model = $this->getClass('HomeProductManagerModel');

        $mostViewedProducts = $model->getMostViewedProducts();

        $this->assign('prouducts',$mostViewedProducts);

        $this->setLayout( $this->view );

    }

    public function loadModules() {
        $modules['head']	= 'SharedHeadController';
        $modules['footer']	= 'SharedFooterController';
        return $modules;
    }
}