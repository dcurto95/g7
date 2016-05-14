<?php

class ErrorErrorCommentController extends Controller
{
	public function build( )
	{
		header("HTTP/1.1 403 Forbidden");
		$this->setLayout( 'error/errorComment.tpl' );
	}

	public function loadModules()
	{
		$modules['head']	= 'SharedHeadController';
		$modules['footer']	= 'SharedFooterController';

		return $modules;
	}
}
?>
