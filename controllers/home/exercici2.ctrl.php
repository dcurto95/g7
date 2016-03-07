<?php

class HomeExercici2Controller extends Controller
{
    protected $view = 'home/exercici2.tpl';
    protected $error_view = 'error/error404.tpl';

    public function build() {
        $info = $this->getParams();
        $model = $this->getClass('HomeGaleryModel');
        $this->setLayout($this->view);

        $name = Filter::getString('instrument');
        $type_n = Filter::getString('tipus');
        $url = Filter::getUrl('url');

        $is_submit = Filter::getString('submit');

        $index = $model->getNumberInstruments();
        $id = $index[0]['count(*)'] +1;

        if($is_submit){
            $model->addInstrument($name, $type_n, $url,$id);
        }
        $instruments = $model->getAllIntrumentsSortedByName();

        $this->assign('instruments', $instruments);
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
