<?php
/**
 * Home Controller: Controller example.

 */
class HomeProductController extends Controller
{
    protected $view = 'home/product.tpl';
    protected $error_view = 'error/error404.tpl';

    public function build(){
        $model = $this->getClass('HomeProductManagerModel');
        $modelUsuaris = $this->getClass('HomeUserManagerModel');
        $info = $this->getParams();
        $info = $info['url_arguments'];

        if(!empty($info[0])) {
            $product_id = $model->getProductFromName($info[0]);
        }


        if($product_id > 0) {

            //LINEES DE DEV
            $product = $model->getProduct($product_id);

            $this->assign('name', $product['name']);
            $this->assign('preu', $product['price']);
            $this->assign('stock', $product['stock']);
            $this->assign('descripcio', $product['description']);
            $this->assign('date', $product['date']);
            $product_img = '/img/product_img_big/'.$product['image_big'];
            $this->assign('img_path', $product_img);
            $this->assign('soldProducts', 0);
            
            $user = $modelUsuaris->getUser($product['id_user']);

            $this->assign('user', $user['username']);
            $user_img = '/img/profile_img/'.$user['image'];
            $this->assign('profile', $user_img);
            //print_r($product);

            $this->setLayout($this->view);
        }else{
            $this->setLayout($this->error_view);
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