<?php
/**
 * Home Controller: Controller example.

 */
class HomeForgotPasswordController extends Controller
{
    protected $view = 'home/forgotPassword.tpl';

    public function build()
    {

        $is_submit = Filter::getString('submit');


        if($is_submit) {

            $model = $this->getClass('HomeUserManagerModel');

            $email = Filter::getString('email');

            $isValid = true;
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $isValid = false;
            }

            if($isValid){

                $user = $model->getUserFromEmail($email);
                $username = $user['username'];
                $password = $user['password'];

                //print_r($user);

                if ($user != null) {
                    // Mail:
                    $subject = "Barrets.com - Password Recovery";

                    $message = "<html><body><p>To recover the password for $username ($email) click on the following link: <p>";
                    $link_recover = URL_ABSOLUTE.'/recoverPassword/'.$user['id_user'];
                    $message .= "<a href='$link_recover'>Recover</a>";
                    $message .= "</body></html>";

                    $headers = "From: Barrets.com\r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                    $retval = mail($email, $subject, $message, $headers);

                    //echo "Retval: ".$retval;

                    header('Location:' .URL_ABSOLUTE);
                } else {
                    $this->assign('title_ending', 'UNEXISTING EMAIL');
                }
            } else {
                $this->assign('title_ending', 'WRONG EMAIL');
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