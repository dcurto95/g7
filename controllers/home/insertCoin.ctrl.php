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


    public function build()
    {
        $model = $this->getClass('HomeUserManagerModel');

        $model = $this->getClass('HomeUserManagerModel');

        $this->setLayout( $this->view );

        $is_submit = Filter::getString('action');

        if($is_submit){

            $money = Filter::getFloat('test5');
            $saldo = $model->getMoney(1);
            if ($saldo+$money >1000){
                // Superem maxim de diners... caldrà mostrar algo...
            }else{
                $model->insertMoney(1, $money);

                // Actualitzem session:
                $session = Session::getInstance();
                $model = $this->getClass('HomeUserManagerModel');
                $userId = $session->get('id_user');
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