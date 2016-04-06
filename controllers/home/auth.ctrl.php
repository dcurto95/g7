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

        // Petició a model -> Array completa:
        $model = $this->getClass('HomeMailManagerModel');

        if(empty($info['url_arguments'])){
            // Standard home:

        }else if($info['url_arguments'][0] == 'validate'){
            // Validation Home:

            /* Validation URL Format: g7.dev/auth/<codi> */
            $username = $info['url_arguments'][1];
            $validation_code = $info['url_arguments'][2];

            $status = $model->validateUser($validation_code);
            if($status){
                // Pantalla de benvinguda

            }else{
                // Pantalla d'error
            }

        }else{

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