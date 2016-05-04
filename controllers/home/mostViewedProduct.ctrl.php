<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 04/05/2016
 * Time: 19:13
 */

class HomeMostViewedProductController extends Controller
{
    protected $view = 'home/home.tpl';

    public function build()
    {
        $info = $this->getParams();
        $model = $this->getClass('HomeProductManagerModel');

        $this->setLayout( $this->view );

    }

    public function loadModules() {
        $modules['head']	= 'SharedHeadController';
        $modules['footer']	= 'SharedFooterController';
        return $modules;
    }
}