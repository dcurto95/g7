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

        $this->setLayout( $this->view );

        $is_submit = Filter::getString('action');

        if($is_submit){
            $coinValue = Filter::getInteger('test5');
            $model->insertMoney(1,$coinValue);
            $currentMoney =$model->getMoney(1);
            print_r($currentMoney);
            /*
           // $totalSaldo = $coinValue +$currentMoney;
            $totalSaldo =150;
            if ($totalSaldo >=1000){
                echo("You ve got so much money");
            }

            */
            echo("La pasta inserida es");
            echo($coinValue);
            //echo($totalSaldo);

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