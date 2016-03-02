<?php

class SharedVentController extends Controller {

    protected $type = 'vent';

    protected $view = 'shared/instrument.tpl';
    protected $error_view = 'error/error404.tpl';

    protected $null_img = 'http://2.bp.blogspot.com/-2HYczDyC2VA/ULUz8i4fDjI/AAAAAAAAADY/gV4zQDCbiMs/s1600/nomore.png';

    public function build( ){

        // Recuperem els paràmetres de la pàgina
        $info = $this->getParams();

        // Recuperem el valor de l'instrument a mostrar:
        $which = $info['url_arguments'][0];

        if($which == NULL){
            $which = 0;
        }

        // Petició a model -> Array del tipus:
        $model = $this->getClass('HomeGaleryModel');

        $max_size = $model->getMaxSizeInstruments();

        $instruments = $model->getTypeInstruments($this->type);

        $size = count($instruments) - 1;

        echo "$which";

        if ($which > $max_size/3){
            $this->setLayout($this->error_view);
        } else {
            $this->assign('img_1', $this->null_img);
            $this->assign('img_2', $this->null_img);
            $this->assign('img_3', $this->null_img);

            $this->setLayout($this->view);
        }

    }

}