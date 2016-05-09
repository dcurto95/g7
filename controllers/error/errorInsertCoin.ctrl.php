<?php

class ErrorErrorInsertCoinController extends Controller
{
    public function build( )
    {
        $this->setLayout( 'error/errorInsertCoin.tpl' );
    }

    public function loadModules()
    {
        $modules['head']	= 'SharedHeadController';
        $modules['footer']	= 'SharedFooterController';

        return $modules;
    }
}


?>