<?php
class HomeExercici3Controller extends Controller
{
    protected $view = 'home/exercici3.tpl';
    protected $error_view = 'error/error404.tpl';

    public function build()
    {

        $info = $this->getParams();
        $model = $this->getClass('HomeGaleryModel');

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
        $modules['vent'] = 'SharedVentController';
        $modules['corda'] = 'SharedCordaController';
        $modules['percussio'] = 'SharedPercussioController';

        return $modules;
    }
}
