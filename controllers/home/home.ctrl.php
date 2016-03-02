<?php
/**
 * Home Controller: Controller example.

 */
class HomeHomeController extends Controller
{
	protected $view = 'home/home.tpl';


	private $ex1_path = '/exercici1';
	private $ex2_path = '/exercici2';
	private $ex3_path = '/exercici3';
	//private $ex4_path = '/exercici4';

	private $ex4_path = '#';

	private $ex1_name = 'EXERCICI 1';
	private $ex2_name = 'EXERCICI 2';
	private $ex3_name = 'EXERCICI 3';
	private $ex4_name = 'EXERCICI 4';


	public function build()
	{

		$this->assign( 'ex1_path', $this->ex1_path);
		$this->assign( 'ex2_path', $this->ex2_path);
		$this->assign( 'ex3_path', $this->ex3_path);
		$this->assign( 'ex4_path', $this->ex4_path);

		$this->assign( 'ex1_name', $this->ex1_name);
		$this->assign( 'ex2_name', $this->ex2_name);
		$this->assign( 'ex3_name', $this->ex3_name);
		$this->assign( 'ex4_name', $this->ex4_name);

		$this->setLayout( $this->view );

	}
	
	
	protected function helloUser()
	{
		$name = Filter::getString( 'user_name' );
		
		if ( $name ) {
			$this->assign( 'user_name', $name );
		} 	
	}


	/**
	 * With this method you can load other modules that we will need in our page. You will have these modules availables in your template inside the "modules" array (example: {$modules.head}).
	 * The sintax is the following:
	 * $modules['name_in_the_modules_array_of_Smarty_template'] = Controller_name_to_load;
	 *
	 * @return array
	 */
	public function loadModules() {
		$modules['head']	= 'SharedHeadController';
		$modules['footer']	= 'SharedFooterController';
		return $modules;
	}
}