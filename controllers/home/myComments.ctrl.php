<?php
/**
 * Home Controller: Controller example.

 */
class HomeMyCommentsController extends Controller
{
    protected $view = 'home/myComments.tpl';
    protected $error_view = 'error/error404.tpl';

    public function build(){

        header("HTTP/1.1 200 OK");

        $modelUser = $this->getClass('HomeUserManagerModel');

        $session = Session::getInstance();
        $id_usr = $user = $session->get('id_user');

        $is_logged = ($id_usr != null);

        if ($is_logged == false){
            header('Location:' . URL_ABSOLUTE.'/errorComment');
        } else {
                $modelComments = $this->getClass('HomeCommentsManagerModel');

                $user_info = $modelUser->getUser($id_usr);

                $user_img = '/img/profile_img/' . $user_info['image'];

                $this->assign('user_name', $user_info['username']);
                $this->assign('user_img', $user_img);

                $this->assign('isLogged', $is_logged);

                $comments = $modelComments->getUserCommentsSrc($id_usr);

                for ($i = 0; $i < sizeof($comments); $i++) {
                    $user = $modelUser->getUser($comments[$i]['id_usr_dst']);
                    $comments[$i]['user'] = $user;
                    $comments[$i]['user_url'] = $modelUser->getUserURL($user['username']);
                }

                $this->assign('comments', $comments);

                $this->setLayout($this->view);
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