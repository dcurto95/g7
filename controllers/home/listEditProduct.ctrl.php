<?php
/**
 * Home Controller: Controller example.

 */
class HomeListEditProductController extends Controller
{
    protected $view = 'home/listEditProduct.tpl';
    protected $error_view403 = 'error/error403.tpl';
    protected $error_view404 = 'error/error404.tpl';

    public function build()
    {
        $info = $this->getParams();

        $session = Session::getInstance();
        $user = $session->get('id_user');

        if ($user == null) { // No estem loguejats
            // Pagina incorrecta!
            $this->setLayout($this->error_view403);
        } else {
            $model = $this->getClass('HomeProductManagerModel');

            $this->assign('userName', $session->get('username'));

            // Recuperem el valor del producte a mostrar:
            if(empty($info['url_arguments'])){
                $which = 1;
            }else{
                $which = $info['url_arguments'][0];
            }

            $editableProducts = $model->getUserProducts($user);

            //print_r($editableProducts);
            
            $numProducts = count($editableProducts);

            $num_pagines = (int)($numProducts/10);
            if($numProducts % 10 > 0){
                $num_pagines++;
            }


            $array_pag[0]= 1;
            for ($i = 1 ; $i < $num_pagines; $i++){
                $array_pag[$i]= $i+1;
            }
            $this->assign('num_pag',$array_pag);

            $array_prod = null;
            for ($i = 0 ; $i < 10; $i++){
                $index = $i + (10 * ($which - 1));
                if ($index < $numProducts) {
                    $array_prod[$i] = $editableProducts[$index];
                    $array_prod[$i]['url'] = $model->getProductURL($array_prod[$i]['id_product']);
                }
            }

            if ($which > $num_pagines && $num_pagines > 0){
                $this->setLayout($this->error_view404);
            } else {
                $this->assign('next', ($which + 1));
                $this->assign('previous', ($which - 1));

                if ($which == 1) {
                    $this->assign('is_first', true);
                } else {
                    $this->assign('is_first', false);
                }

                if ($which >= $num_pagines) {
                    $this->assign('is_last', true);
                } else {
                    $this->assign('is_last', false);
                }


                $this->assign('prouducts',$array_prod);
                $this->assign('actual',$which);

                $this->setLayout( $this->view );

            }

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