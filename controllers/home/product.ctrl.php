<?php
/**
 * Home Controller: Controller example.

 */
class HomeProductController extends Controller
{
    protected $view = 'home/product.tpl';
    protected $error_view = 'error/error404.tpl';

    public function build(){

        //header("HTTP/1.1 200 OK");

        $model = $this->getClass('HomeProductManagerModel');
        $modelUser = $this->getClass('HomeUserManagerModel');
        $modelComments = $this->getClass('HomeCommentsManagerModel');

        $info = $this->getParams();
        $info = $info['url_arguments'];

        $session = Session::getInstance();
        $log_user = $session->get('id_user');
        if ($session->get('id_user')!= null){
            $is_log = 1;
        }else{
            $is_log = 0;
        }


        if(!empty($info[0])) {
            $product_name = $model->productURLToName($info[0]);

            if (empty($info[1])){
                $product_id = $model->getProductFromName($product_name);
            } else {
                $product_id = $info[1];
                $product = $model->getProduct($product_id);
                if (strcmp($product['name'], $product_name) != 0){
                    // El nom no coincideix amb l'ID, cal mirar a la taula d'URL
                    $product_id = $model->checkNameInURL($product_id, $product_name);
                }
            }
        }

        $this->assign('isLogged', $is_log);
        if($product_id > 0 && $model->checkDateAndStock($product_id)) {

            $model->increaseView($product_id);

            $review = Filter::getString('review');
            if(strcmp($review,'like')==0){
                $model->addPositiva($product_id);
            }else if(strcmp($review,'dislike')==0){
                $model->addNegativa($product_id);
            }


            $product = $model->getProduct($product_id);
            $this->assign('name', $product['name']);
            $this->assign('preu', $product['price']);
            $this->assign('stock', $product['stock']);
            $this->assign('descripcio', $product['description']);
            $this->assign('views', $product['views']);

            $this->assign('likes', $product['valoracioPositiva']);
            $this->assign('dislikes', $product['valoracioNegativa']);

            if($model->hasBought($log_user, $product_id)){
                $this->assign('bought', 1);
            }else{
                $this->assign('bought', 0);
            }

            $date = (new \DateTime())->format('Y-m-d H:i:s');

            $diff = abs(strtotime($product['date']) - strtotime($date));
            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)) + 1;


            $this->assign('date', $product['date']);
            $this->assign('left_days', $days);
            $this->assign('id_product', $product['id_product']);



            $product_img = '/img/product_img_big/'.$product['id_user'].'_'.$product['image_big'];

            $this->assign('img_path', $product_img);

            $user = $modelUser->getUser($product['id_user']);

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


            $comments = $modelComments->getUserComments($user['id_user']);
            $id_usr_src = $session->get('id_user');
            for ($i = 0; $i < sizeof($comments); $i++) {
                $user = $modelUser->getUser($comments[$i]['id_usr_src']);
                $comments[$i]['user'] = $user;
                $comments[$i]['user_url'] = $modelUser->getUserURL($user['username']);
                $comments[$i]['editable'] = ($id_usr_src == $comments[$i]['id_usr_src']);
            }

            $this->assign('comments', $comments);


            $this->setLayout($this->view);
        }else{
            header('Location:' . URL_ABSOLUTE.'/error404');
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