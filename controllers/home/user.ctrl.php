<?php
/**
 * Home Controller: Controller example.

 */
class HomeUserController extends Controller
{
    protected $view = 'home/user.tpl';
    protected $error_view = 'error/error404.tpl';

    public function build(){

        //header("HTTP/1.1 200 OK");

        $model = $this->getClass('HomeUserManagerModel');

        $info = $this->getParams();
        $info = $info['url_arguments'];

        if(!empty($info[0])) {
            $userName = $model->userURLToName($info[0]);
            $id_user = $model->getUserFromName($userName);
        }

        if($id_user > 0) {

            $user_info = $model->getUser($id_user);

            $user_img = '/img/profile_img/'.$user_info['image'];

            $this->assign('user_name', $user_info['username']);
            $this->assign('user_img', $user_img);

            $this->setLayout($this->view);
        }else{
            //header('Location:' . URL_ABSOLUTE.'/error404');
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