<?php
/**
 * Home Controller: Controller example.

 */
class HomeBuyProductController extends Controller
{
    protected $view = 'home/buyProduct.tpl';
    protected $error_view = 'error/error404.tpl';
    protected $error_money = 'error/errorMoney.tpl';

    public function build()
    {
        $model = $this->getClass('HomeProductManagerModel');
        $modelUsuaris = $this->getClass('HomeUserManagerModel');
        $info = $this->getParams();
        $info = $info['url_arguments'];

        $session = Session::getInstance();

        $user = $session->get('id_user');

        if (!empty($info[0])) {
            $product_id = $model->getProduct($info[0])['id_product'];

            if ($product_id > 0) {

                $money = $modelUsuaris->getMoney($user);

                if($money >= $model->getPrice($product_id) && $model->getStock($product_id) >= 1) {
                    $modelUsuaris->buy($user, $product_id);
                    $preu =  $model->getPrice($product_id);
                    $nom =   $model->getName($product_id);
                    $sellerID = $model->getSellerID($product_id);
                    $sellerName = $modelUsuaris->getUser($sellerID);
                    $model->addCompra($user, $product_id,$nom,$preu,$sellerName['username']);
                    $product = $model->getProduct($product_id);

                    $this->assign('name', $product['name']);

                    $productname = $product['name'];
                    $email = $modelUsuaris->getUser($user);
                    $email = $email['email'];

                    //echo $email;

                    // Mail:
                    $subject = "Barrets.com - Product purchase";

                    $message = "<html><body><p>Thank you for purchasing the product: $productname<p>";
                    $message .= "</body></html>";

                    $headers = "From: Barrets.com\r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                    $retval = mail($email, $subject, $message, $headers);


                    $this->setLayout($this->view);
                }else if($model->getStock($product_id) >= 1){
                    $this->setLayout($this->error_money);
                }else{
                    //A aquí no s'hauria d'arrbar mai ja que es controla que hi hagi stock. Només s'hi podria accedir forçant la url.
                    header('Location:' . URL_ABSOLUTE.'/error403');
                }
            }else{
                header('Location:' . URL_ABSOLUTE.'/error404');
            }
        }else {
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