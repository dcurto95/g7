<?php
/**
 * Home Controller: Controller example.

 */
class HomeUserController extends Controller
{
    protected $view = 'home/user.tpl';
    protected $error_view = 'error/error404.tpl';

    public function build(){

        header("HTTP/1.1 200 OK");

        $modelUser = $this->getClass('HomeUserManagerModel');

        $info = $this->getParams();
        $info = $info['url_arguments'];

        $session = Session::getInstance();
        $id_usr_src = $user = $session->get('id_user');

        $is_logged = ($id_usr_src > 0);

        if ($is_logged == false){
            header('Location:' . URL_ABSOLUTE.'/errorComment');
        } else {

            if (!empty($info[0])) {
                $userName = $modelUser->userURLToName($info[0]);
                $id_user = $modelUser->getUserFromName($userName);
            } else {
                header('Location:' . URL_ABSOLUTE . '/error404');
            }

            if ($id_user > 0) {

                $modelComments = $this->getClass('HomeCommentsManagerModel');

                $user_info = $modelUser->getUser($id_user);

                $user_img = '/img/profile_img/' . $user_info['image'];

                $this->assign('user_name', $user_info['username']);
                $this->assign('user_img', $user_img);

                $is_commentable = $modelComments->ValidateComment($id_usr_src, $id_user);

                $this->assign('isLogged', $is_commentable);

                $is_submit = Filter::getString('submit');

                if ($is_submit) {
                    $comment = Filter::getString('comment');
                    $id_usr_dst = $id_user;
                    $modelComments->addComment($id_usr_src, $id_usr_dst, $comment);

                    header('Location:' . URL_ABSOLUTE . '/u/'.$info[0]);
                }

                $comments = $modelComments->getUserComments($id_user);

                for ($i = 0; $i < sizeof($comments); $i++) {
                    $user = $modelUser->getUser($comments[$i]['id_usr_src']);
                    $comments[$i]['user'] = $user;
                    $comments[$i]['user_url'] = $modelUser->getUserURL($user['username']);
                    $comments[$i]['editable'] = ($id_usr_src == $comments[$i]['id_usr_src']);
                }

                $this->assign('comments', $comments);

                $this->setLayout($this->view);

            } else {
                header('Location:' . URL_ABSOLUTE . '/error404');
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