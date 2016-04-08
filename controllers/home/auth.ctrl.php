<?php
/**
 * Home Controller: Controller example.

 */
class HomeAuthController extends Controller
{
    protected $view = 'home/auth.tpl';

    public function build()
    {

        $info = $this->getParams();

        // Petició a model
        $model = $this->getClass('HomeUserManagerModel');

        if(empty($info['url_arguments'][0])){
            // Standard:
            $this->assign('auth_status', 'Not a user');

        }else{
            // Validation:

            /* Validation URL Format: g7.dev/auth/<codi> */
            $validation_code = $info['url_arguments'][0];

            $status = $model->validateUser($validation_code);
            if($status){
                // Pantalla de benvinguda
                $this->assign('auth_status', 'User OK');

            }else{
                // Pantalla d'error
                $this->assign('auth_status', 'User KO');
                
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