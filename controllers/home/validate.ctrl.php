<?php
/**
 * Home Controller: Controller example.

 */
class HomeValidateController extends Controller
{
    protected $view = 'home/validate.tpl';

    public function build(){

        $model = $this->getClass('HomeUserManagerModel');

        $info = $this->getParams();
        $info = $info['url_arguments'];

        if(!empty($info)){
            $id_user = $model->validateUser($info[0]);
            if($id_user > 0){
                //Validacio OK
                $this->assign('result', "Welcome!.");

                $session = Session::getInstance();

                $user_info = $model->getUser($id_user);

                $session->set('id_user', 	$user_info['id_user']);
                $session->set('username', 	$user_info['username']);
                $session->set('email', 		$user_info['email']);
                $session->set('image', 		$user_info['image']);
                $session->set('saldo', 		$user_info['saldo']);
            }else{
                //Validacio KO
                header("HTTP/1.1 403 Forbidden");
                $this->assign('result', "Validation Incorrect.");
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