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

    protected $error_view = 'error/error403.tpl';

    public function build()
    {

        $info = $this->getParams();
        $model = $this->getClass('HomeProductManagerModel');

        // Recuperem el valor del producte a mostrar:
        if(empty($info['url_arguments'])){
            $which = 1;
        }else{
            $which = $info['url_arguments'][0];
        }

        $total = $model->getTotalViews();
        $mostViewedProducts = $model->getMostViewedProducts(0);


        $numProducts = count($mostViewedProducts);

        $num_pagines = (int)($numProducts/10);
        if($numProducts%10>0){
            $num_pagines++;
        }

        for ($i = 1 ; $i <= $num_pagines; $i++){
            $array_pag[$i]= $i;
        }
        $this->assign('num_pag',$array_pag);

        for ($i = 0 ; $i < 10; $i++){
            $index = $i + (10 * ($which - 1));
            if ($index < $numProducts) {
                $array_prod[$i] = $mostViewedProducts[$index];
                $array_prod[$i]['views_percentage'] = round(($array_prod[$i]['views']/$total)*100);
            }
        }

        if ($which > $num_pagines){
            $this->setLayout($this->error_view);
        } else {
            $this->assign('next', ($which + 1));
            $this->assign('previous', ($which - 1));

            if ($which == 1) {
                $this->assign('is_first', true);
            } else {
                $this->assign('is_first', false);
            }

            if ($which == $num_pagines) {
                $this->assign('is_last', true);
            } else {
                $this->assign('is_last', false);
            }


            $this->assign('prouducts',$array_prod);
            $this->assign('actual',$which);

            $this->setLayout( $this->view );

        }



    }

    public function loadModules() {
        $modules['head']	= 'SharedHeadController';
        $modules['footer']	= 'SharedFooterController';
        return $modules;
    }
}