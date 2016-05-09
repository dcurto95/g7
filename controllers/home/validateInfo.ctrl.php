<?php
/**
 * Home Controller: Controller example.

 */
class HomeValidateInfoController extends Controller
{
    protected $view = 'home/validateInfo.tpl';
    protected $error = 'error/error404.tpl';

    public function build(){

        $info = $this->getParams();

        if(!empty($info['url_arguments'])){
            $info = $info['url_arguments'];
            $validationCode=$info[0];
            $this->assign('validationCode', $validationCode);
            $this->setLayout($this->view);
        }else{
            $this->setLayout($this->error);
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