<?php
/**
 * Home Controller: Controller example.

 */
class HomeProductController extends Controller
{
    protected $view = 'home/product.tpl';

    public function build(){
        $model = $this->getClass('HomeProductManagerModel');
        $modelUsuaris = $this->getClass('HomeUserManagerModel');
        //LINEES DE DEV
        $product = $model->getProduct(3);


        $this->assign('name', $product[0]['name']);
        $this->assign('preu', $product[0]['price']);
        $this->assign('stock', $product[0]['stock']);
        $this->assign('descripcio', $product[0]['description']);
        $this->assign('date', $product[0]['date']);
        $this->assign('img_path', $product[0]['image']);
        $this->assign('soldProducts', 0);


        $user = $modelUsuaris->getUser($product[0]['user']);
        $this->assign('user', $user['username']);
        $this->assign('profile', $user['image']);
        //print_r($product);

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