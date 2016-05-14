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

    public function build(){

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
        if($num_pagines == 0){
            $num_pagines++;
        }
        $array_pag[0]= 1;
        for ($i = 1 ; $i < $num_pagines; $i++){
            $array_pag[$i]= $i +1;
        }
        $this->assign('num_pag',$array_pag);

        $array_prod = null;
        for ($i = 0 ; $i < 10; $i++){
            $index = $i + (10 * ($which - 1));
            if ($index < $numProducts) {
                $array_prod[$i] = $mostViewedProducts[$index];
                $array_prod[$i]['views_percentage'] = round(($array_prod[$i]['views']/$total)*100);
                $array_prod[$i]['url'] = $model->getProductURL($array_prod[$i]['id_product']);
                $array_prod[$i]['description'] = substr($array_prod[$i]['description'], 0, 50);

            }
        }

        if ($which > $num_pagines){
            header('Location:' . URL_ABSOLUTE.'/error404');

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