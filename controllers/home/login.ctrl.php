<?php
/**
 * Home Controller: Controller example.

 */
class HomeLoginController extends Controller
{
    protected $view = 'home/login.tpl';

    public function build()
    {

        $is_submit = Filter::getString('submit');

        if($is_submit) {


            $model = $this->getClass('HomeUserManagerModel');

            $login = Filter::getString('username');
            $password = Filter::getString('password');

            $userId = $model->login($login, $password);

            if ($userId >= 0) { // És un usuari

                // Actualitzar informació
                $user_info = $model->getUser($userId);

                $session = Session::getInstance();

                $session->delete('id_user');
                $session->delete('username');
                $session->delete('email');
                $session->delete('image');

                $session->set('id_user', $user_info['id_user']);
                $session->set('username', $user_info['username']);
                $session->set('email', $user_info['email']);
                $session->set('image', $user_info['image']);

                header('Location:' .URL_ABSOLUTE);

            } else {

                header('Location:' .URL_ABSOLUTE .'/auth/loginfail', false);

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