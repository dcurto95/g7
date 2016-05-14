<?php
/**
 * Home Controller: Controller example.

 */
class HomeEditCommentController extends Controller
{

	public function build()
	{

		$session = Session::getInstance();

		$user = $session->get('id_user');

		if ($user != null){

			$view = 'home/editComment.tpl';

			$params = $this->getParams();
			$params = $params['url_arguments'];

			if(empty($params[0]) || $params[0] <= 0) {
				header('Location:' . URL_ABSOLUTE.'/error404');
			} else {

				$comm_id = $params[0];

				// Omplir els camps!
				$model = $this->getClass('HomeCommentsManagerModel');
				$comment = $model->getComment($comm_id);

                $modelUser = $this->getClass('HomeUserManagerModel');

                $user_dest = "Hola!";

				$this->assign('comment', $comment['comment']);
				$this->assign('user_dest', $user_dest);

				$this->setLayout($view);

				$is_submit = Filter::getString('submit');

				$is_remove = Filter::getString('remove');

				if ($is_submit) {


					$comment = Filter::getString('comment');

                    $modelComment = $this->getClass('HomeCommentsManagerModel');


                    $modelComment->editComment($comm_id, $comment);

                    header('Location:' . URL_ABSOLUTE.'/myComments');


				} elseif ($is_remove) {
					// Remove comment form DB:
					$modelComment = $this->getClass('HomeCommentsManagerModel');

					$modelComment->removeComment($comm_id);

					header('Location:' . URL_ABSOLUTE);
				}
			}
		} else {
			header('Location:' . URL_ABSOLUTE.'/error403');
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