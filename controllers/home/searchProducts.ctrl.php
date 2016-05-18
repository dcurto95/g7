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
        $modelUser = $this->getClass('HomeUserManagerModel');

        $info = $this->getParams();
        if(empty($info['url_arguments'])){
            $which = 1;
        }else{
            $which = $info['url_arguments'][0];
        }


        $name = Filter::getString('search');
        $sort = Filter::getString("sortby");


        $option = "views";
        $order =0;
        switch($sort){
            case 'mv':
                $option="views";
                $order = 0;
                break;
            case 'newest':
                $option= "id_product";
                $order = 0;
                break;
            case 'expensive':
                $option ="price";
                $order = 0;
                break;
            case 'cheap':
                $option ="price";
                $order = 1;
                break;
            default:
                $option="views";
                $order = 0;
                break;

        }


        $is_submit = Filter::getString('submit');
        $product = $model->searchProduct($name,$option,$order);

        if($is_submit){
            $which = 1;
            $product = $model->searchProduct($name,$option,$order);

        }

        $numProducts = count($product);

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
                $array_prod[$i] = $product[$index];
                $array_prod[$i]['url'] = $model->getProductURL($array_prod[$i]['id_product']);
                $array_prod[$i]['url'] = $model->getProductURL($product[$i]['id_product']);
                $user = $modelUser->getUser($product[$i]['id_user']);

                $user_img = '/img/profile_img/'.$user['image'];
                $array_prod[$i]['profile'] =$user_img;

                $array_prod[$i]['seller'] = $user['username'];
                $exit_factor = $user['sold_products'];

                if($exit_factor > 20){
                    $exit_factor = 5;
                }else if($exit_factor > 15){
                    $exit_factor = 4;
                }else if($exit_factor > 10){
                    $exit_factor = 3;
                }else if($exit_factor > 5){
                    $exit_factor = 2;
                }else if($exit_factor > 0){
                    $exit_factor = 1;
                }else{
                    $exit_factor = 0;
                }
                $array_prod[$i]['exit_factor'] = $exit_factor;


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


            $this->assign('search', $array_prod);
            $this->assign('actual', $which);


            $this->setLayout($this->view);

        }

        /*
        for ($i = 0 ; $i < $numProducts; $i++){

            $product[$i]['url'] = $model->getProductURL($product[$i]['id_product']);
            $user = $modelUser->getUser($product[$i]['id_user']);
            $exit_factor = $user['sold_products'];

            if($exit_factor > 20){
                $exit_factor = 5;
            }else if($exit_factor > 15){
                $exit_factor = 4;
            }else if($exit_factor > 10){
                $exit_factor = 3;
            }else if($exit_factor > 5){
                $exit_factor = 2;
            }else if($exit_factor > 0){
                $exit_factor = 1;
            }else{
                $exit_factor = 0;
            }
            $product[$i]['exit_factor'] = $exit_factor;

        }

        $this->assign("search",$product);


        $this->setLayout($this->view);

        */


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