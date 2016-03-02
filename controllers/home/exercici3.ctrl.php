<<<<<<< HEAD
<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 27/02/2016
 * Time: 12:26
 */

class HomeExercici2Controller extends Controller
{
    protected $view = 'home/exercici2.tpl';
    protected $error_view = 'error/error404.tpl';

    public function build()
    {
        $info = $this->getParams();
        $model = $this->getClass('HomeGaleryModel');
        $this->setLayout($this->view);

        $name = Filter::getString('instrument');
        $type_n = Filter::getString('tipus');
        $url = Filter::getUrl('url');

        $model->addInstrument($name, $type_n, $url);
    }


    /**
     * With this method you can load other modules that we will need in our page. You will have these modules availables in your template inside the "modules" array (example: {$modules.head}).
     * The sintax is the following:
     * $modules['name_in_the_modules_array_of_Smarty_template'] = Controller_name_to_load;
     *
     * @return array
     */
    public function loadModules()
    {
        $modules['head'] = 'SharedHeadController';
        $modules['footer'] = 'SharedFooterController';

        return $modules;
    }
}
=======
<?php
/**
 * Exercici1 Controller: Controller that shows the instriuments.

 */
class HomeExercici3Controller extends Controller
{
    protected $view = 'home/exercici3.tpl';
    protected $error_view = 'error/error404.tpl';

    public function build()
    {

        $info = $this->getParams();
        $model = $this->getClass('HomeShowModel');

        //Demano a la BD els arrays d'instruments de cada tipus.
        $corda = $model->getTypeInstruments(1);
        $vent = $model->getTypeInstruments(2);
        $percussio = $model->getTypeInstruments(3);

        //Calculo la mida de cada array
        $size_corda = count($corda)-1;
        $size_vent = count($vent)-1;
        $size_percussio = count($percussio)-1;

        //Miro quin és l'array més gran
        $size = max($size_corda, $size_percussio, $size_vent);

        //Calculo el número de pàgines.
        $num_pagines = ($size/3);
        if($size%3>0){
            $num_pagines++;
        }

        $this->setLayout($this->view);


    }

    public function loadModules() {
        $modules['head']	= 'SharedHeadController';
        $modules['footer']	= 'SharedFooterController';
        return $modules;
    }
}
>>>>>>> 8f62fa331d33108259615c9d39fc676816f6038e
