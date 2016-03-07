<?php
class HomeExercici3Controller extends Controller
{
    protected $view = 'home/exercici3.tpl';
    protected $error_view = 'error/error404.tpl';

    public function build()
    {

        $info = $this->getParams();
<<<<<<< HEAD

        // Petició a model -> Array completa:
        $model = $this->getClass('HomeGaleryModel');

        // Recuperem el valor de l'instrument a mostrar:
        $which = $info['url_arguments'][0];

        if($which == NULL){
=======

        // Petició a model -> Array completa:
        $model = $this->getClass('HomeGaleryModel');

       // Recuperem el valor de l'instrument a mostrar:
        if(empty($info['url_arguments'])){
>>>>>>> e51c068a6df18f07715af3cef6c1e177a661cfc6
            $which = 0;
        }else{
            $which = $info['url_arguments'][0];
        }

        //Demano a la BD els arrays d'instruments de cada tipus.
        $corda = $model->getTypeInstrumentsNumeric(1);
        $vent = $model->getTypeInstrumentsNumeric(2);
        $percussio = $model->getTypeInstrumentsNumeric(3);

        //Calculo la mida de cada array
        $size_corda = count($corda);
        $size_vent = count($vent);
        $size_percussio = count($percussio);

        //Miro quin és l'array més gran
        $size = max($size_corda, $size_percussio, $size_vent);

        //Calculo el número de pàgines.

        $num_pagines = (int)($size/3)-1;
        if($size%3>0){
            $num_pagines++;
        }

        $this->setLayout($this->view);

        if ($which > $num_pagines){
            $this->setLayout($this->error_view);
        } else {
            $this->assign('next', ($which + 1));
            $this->assign('previous', ($which - 1));

            if ($which == 0) {
                $this->assign('is_first', true);
            } else {
                $this->assign('is_first', false);
            }

            if ($which == $num_pagines) {
                $this->assign('is_last', true);
            } else {
                $this->assign('is_last', false);
            }

            $this->setLayout($this->view);
        }

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
