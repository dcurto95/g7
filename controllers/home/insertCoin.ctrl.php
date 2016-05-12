<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 11/04/2016
 * Time: 15:53
 */

class HomeInsertCoinController extends Controller
{
    protected $view = 'home/insertCoin.tpl';
    protected $error_view = 'error/errorInsertCoin.tpl';


    public function build()
    {



        $model = $this->getClass('HomeUserManagerModel');
        $modelP = $this->getClass('HomeProductManagerModel');


        $session = Session::getInstance();
        $userId = $session->get('id_user');


        $product = $modelP->getCompres($userId);

        $numProducts = count($product);
        for ($i = 0 ; $i < $numProducts ; $i++){
            $product[$i]['url'] = $modelP->getProductURL($product[$i]['producte']);
        }

        //Falta  mirar stock i data

       // print_r($product);

        $this->assign("product",$product);

        $this->setLayout( $this->view );

        $is_submit = Filter::getString('action');

        if($is_submit){

            $money = Filter::getFloat('quantitat');
            $session = Session::getInstance();
            $userId = $session->get('id_user');
            $saldo = $model->getMoney($userId);

            if ($saldo+$money >1000){
                // Superem maxim de diners... caldrà mostrar algo...
                $this->assign("error",TRUE);
               // $this->setLayout( $this->error_view );

            }else{
                $model->insertMoney($userId, $money);

                // Actualitzem session:

                $user_info = $model->getUser($userId);

                $session->delete('saldo');
                $session->set('saldo', $user_info['saldo']);

                header('Location:' .URL_ABSOLUTE);
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