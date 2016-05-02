<?php

class ErrorErrorMoneyController extends Controller
{
	public function build( )
	{
		$this->setLayout( 'error/errorMoney.tpl' );
	}

	public function loadModules()
	{
		$modules['head']	= 'SharedHeadController';
		$modules['footer']	= 'SharedFooterController';

		return $modules;
	}
}


?>