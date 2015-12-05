<?php echo "<?php\n"; ?>

/**
 * Default controller.
 * @package application.modules.<?php echo strtolower($this->moduleID); ?>.controllers
 */
class DefaultController extends Controller
{
	/**
	 * Default action.
	 */
	public function actionIndex()
	{
		$this->render('index');
	}
}