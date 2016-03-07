<?php
/**
 * Exercici1 Controller: Controller that shows the instriuments.

 */
class HomeExercici1Controller extends Controller
{
    protected $view = 'home/exercici1.tpl';
    protected $error_view = 'error/error404.tpl';

    public function build(){

        $info = $this->getParams();

        // Petició a model -> Array completa:
        $model = $this->getClass('HomeGaleryModel');
        $instruments = $model->getAllInstruments();
        $size = count($instruments) - 1;


        // Recuperem el valor de l'instrument a mostrar:
        if(empty($info['url_arguments'])){
            $which = 0;
        }else{
            if ($info['url_arguments'][0] != 0) {
                $which = ($info['url_arguments'][0]) - 1;
            } else{
                $which = 0;
            }
        }

        if ($which > $size){
            $this->setLayout($this->error_view);
        } else {

            $this->assign('image_url', ($instruments[$which]['url']));
            $this->assign('next', ($which + 2));
            $this->assign('previous', ($which));

            if ($which == 0) {
                $this->assign('is_first', true);
            } else {
                $this->assign('is_first', false);
            }

            if ($which == ($size)) {
                $this->assign('is_last', true);
            } else {
                $this->assign('is_last', false);
            }

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