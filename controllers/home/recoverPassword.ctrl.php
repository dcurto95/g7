<?php
/**
 * Home Controller: Controller example.

 */
class HomeRecoverPasswordController extends Controller
{
    protected $view = 'home/recoverPassword.tpl';

    public function build()
    {

        $info = $this->getParams();

        if(empty($info['url_arguments'])){
            header('Location:' . URL_ABSOLUTE.'/error404');
        }else{
            $id = $info['url_arguments'][0];
        }

        $model = $this->getClass('HomeUserManagerModel');
        $user = $model->getUser($id);
        $this->assign('name', $user['username']);

        $is_submit = Filter::getString('submit');

        if($is_submit) {

            $password = Filter::getString('password');
            $isValid = (strlen($password) <= 10) && (strlen($password) >= 6);

            if($isValid){
                $model->setUserPassword($id, $password);
                header('Location:' . URL_ABSOLUTE);
            } else {
                $this->assign('title_ending', 'WRONG PASSWORD');
            }
        }
        $this->setLayout( $this->view );

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