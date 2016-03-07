<?php

class SharedCordaController extends Controller {

    protected $type = 'corda';

    protected $view = 'shared/instrument.tpl';
    protected $error_view = 'error/error404.tpl';

    protected $null_img = 'http://2.bp.blogspot.com/-2HYczDyC2VA/ULUz8i4fDjI/AAAAAAAAADY/gV4zQDCbiMs/s1600/nomore.png';

    public function build( ){

        // Recuperem els paràmetres de la pàgina
        $info = $this->getParams();

        // Recuperem el valor de l'instrument a mostrar:
        if(empty($info['url_arguments'])){
            $which = 0;
        }else{
            $which =$info['url_arguments'][0];
        }

        // Petició a model -> Array del tipus:
        $model = $this->getClass('HomeGaleryModel');

        $max_size = $model->getMaxSizeInstruments();

        $instruments = $model->getTypeInstruments($this->type);

        $size = count($instruments);

        if ($which > $max_size/3){
            $this->setLayout($this->error_view);
        } else {
            for($i = 0; $i < 3; $i++) {
                $j = $i + 1;
                if((($which*3) + $i) >= $size){
                    $this->assign("img_$j", $this->null_img);
                } else {
                    $this->assign("img_$j", $instruments[(($which*3) + $i)]['url']);
                }
            }
            $this->setLayout($this->view);
        }

    }

}