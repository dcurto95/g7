<?php
/**
 * Home Controller: Controller example.

 */
class HomeInstrumentVentController extends Controller
{
    protected $view = 'home/instruments.tpl';

    public function build()
    {

        $this->setLayout($this->view);
        $tipus_a = 'vent';

        $info = $this->getParams();
        switch($info['url_arguments'][0]){
            case '1':
                $next=2;
                $instrument=1;
                $prev=5;

                $this->assign("num",$instrument);
                $this->assign('next',$next);
                $this->assign('previous',$prev);
                $this->assign('tipus_n','vent');
                $this->assign('tipus_p','corda');
                $this->assign("tipus_a",$tipus_a);
                break;

            case '2':
                $next=3;
                $prev=1;
                $instrument=2;

                $this->assign("num",$instrument);
                $this->assign('next',$next);
                $this->assign('previous',$prev);
                $this->assign('tipus_n','vent');
                $this->assign('tipus_p','vent');
                $this->assign("tipus_a",$tipus_a);

                $this->setLayout($this->view);
                break;

            case '3':
                $next=4;
                $prev=2;
                $instrument=3;

                $this->assign("num",$instrument);
                $this->assign('next',$next);
                $this->assign('previous',$prev);
                $this->assign('tipus_n','vent');
                $this->assign('tipus_p','vent');
                $this->assign("tipus_a",$tipus_a);

                $this->setLayout($this->view);
                break;

            case '4':

                $next=5;
                $prev=3;
                $instrument=4;

                $this->assign("num",$instrument);
                $this->assign('next',$next);
                $this->assign('previous',$prev);
                $this->assign('tipus_n','vent');
                $this->assign('tipus_p','vent');
                $this->assign("tipus_a",$tipus_a);

                $this->setLayout($this->view);
                break;

            case '5':

                $prev=4;
                $instrument=5;
                $this->assign("num",$instrument);
                $this->assign('previous',$prev);
                $this->assign('tipus_p','vent');
                $this->assign("tipus_a",$tipus_a);


                $this->setLayout('home/instruments_fi.tpl');

                break;
            default:
                //$next=1;
                //$prev=1;
                //$instrument=1;
                $this->setLayout('error/error404.tpl');

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