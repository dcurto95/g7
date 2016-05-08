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

        $session = Session::getInstance();
        $log_user = $session->get('id_user');

        if(!empty($info[0])) {
            $product_name = $model->productURLToName($info[0]);

            if ($info[1] == ''){
                $product_id = $model->getProductFromName($product_name);
            } else {
                $product_id = $info[1];
            }
        }

        if($product_id > 0) {

            $model->increaseView($product_id);

            $product = $model->getProduct($product_id);
            $this->assign('name', $product['name']);
            $this->assign('preu', $product['price']);
            $this->assign('stock', $product['stock']);
            $this->assign('descripcio', $product['description']);
            $this->assign('views', $product['views']);

            $now = time(); // or your date as well
            $your_date = strtotime($product['date']);
            $datediff = $now - $your_date;
            $dies_restants =  floor($datediff/(60*60*24));

            $this->assign('date', $product['date']);
            $this->assign('left_days', $dies_restants);
            $this->assign('id_product', $product['id_product']);

            $this->assign('isLogged', $log_user);

            $product_img = '/img/product_img_big/'.$product['id_user'].'_'.$product['image_big'];

            $this->assign('img_path', $product_img);

            $user = $modelUsuaris->getUser($product['id_user']);

            $this->assign('user', $user['username']);
            $user_img = '/img/profile_img/'.$user['image'];
            $this->assign('profile', $user_img);

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
            $this->assign('exit_factor', $exit_factor);

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