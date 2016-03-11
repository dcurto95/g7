<?php

class HomeExercici2Controller extends Controller
{
    protected $view = 'home/exercici2.tpl';
    protected $error_view = 'error/error404.tpl';

    public function build() {
        $info = $this->getParams();
        $model = $this->getClass('HomeGaleryModel');

        $name = Filter::getString('instrument');
        $type_n = Filter::getString('tipus');
        $url = Filter::getUrl('url');

        $is_submit = Filter::getString('submit');
        $is_updated = Filter::getString('update');

        $index = $model->getNumberInstruments();
        $id = $index[0]['count(*)'] +1;

        if($is_submit){
            $model->addInstrument($name, $type_n, $url);
        }

        if($is_updated){

            $model->update($info['url_arguments'][1],$name, $type_n, $url);
            header('Location:' .URL_ABSOLUTE. '/exercici2');

        }
        $instruments = $model->getAllIntrumentsSortedByName();

        $this->assign('instruments', $instruments);

        $edit = 0;

        if(!empty($info['url_arguments'] ) && !empty($info['url_arguments'][0]) && !empty($info['url_arguments'][1])){
            if($model->exists($info['url_arguments'][1])) {
                if ($info['url_arguments'][0] == 'edit') {
                    $selected = $model->select($info['url_arguments'][1]);
                    $edit = 1;
                    // header('Location:' .URL_ABSOLUTE. '/exercici2');
                    $this->assign("info", $selected);
                } else {
                    if ($info['url_arguments'][0] == 'delete') {
                        $model->deleteInstrument($info['url_arguments'][1]);
                        header('Location:' . URL_ABSOLUTE . '/exercici2');
                    }
                }
            }
        }

        //$this->assign('edit',$edit);
        //$this->assign('info',$selected);
        if($edit == 1){
            $this->assign('edit',1);
        }else{
            $this->assign('edit',0);
        }

        $this->setLayout($this->view);

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
