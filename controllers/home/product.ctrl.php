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
            //Miro quants productes hi ha amb el nom donat
            $allProducts = $model->getAllProductsFromName($info[0]);

            //si hi ha més d'un poducte, hauré de decidir quin mostro. sino, mostro el primer.
            if(sizeof($allProducts)>1){
                //si m'ha passat un número de producte i no és més gran que els que tinc guardats, el mostro (sino mostro el primer)
                if(!empty($info[1]) && $info[1]<=sizeof($allProducts)-1) {
                    $product_number = $info[1];
                }else{
                    $product_number = 0;
                }
            }else{
                $product_number = 0;
            }

            $product_id = $model->getProduct($allProducts[$product_number]['id_product'])[0]['id_product'];
        }

        if($product_id > 0) {
            $product = $model->getProduct($product_id)[0];
            $this->assign('name', $product['name']);
            $this->assign('preu', $product['price']);
            $this->assign('stock', $product['stock']);
            $this->assign('descripcio', $product['description']);
            $this->assign('date', $product['date']);
            $this->assign('id_product', $product['id_product']);

            $this->assign('isLogged', $log_user);

            $product_img = '/img/product_img_big/'.$product['image_big'];

            $this->assign('img_path', $product_img);
            $this->assign('soldProducts', 0);

            $user = $modelUsuaris->getUser($product['id_user']);

            $this->assign('user', $user['username']);
            $user_img = '/img/profile_img/'.$user['image'];
            $this->assign('profile', $user_img);

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