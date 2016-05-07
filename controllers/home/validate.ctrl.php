<?php
/**
 * Home Controller: Controller example.

 */
class HomeValidateController extends Controller
{
    protected $view = 'home/validate.tpl';
    protected $error_view = 'error/error404.tpl';

    public function build(){

        $model = $this->getClass('HomeUserManagerModel');

        $info = $this->getParams();
        $info = $info['url_arguments'];

        if(!empty($info)){
            $correcte = $model->validateUser($info[0]);
            if($correcte){
                //Validacio OK
                $this->assign('result', "Validation complete.");
            }else{
                //Validacio KO
                $this->assign('result', "Validation incomplete.");
            }
        }

        $this->setLayout($this->view);
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