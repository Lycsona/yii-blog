<?php echo "<?php\n"; ?>

/**
 * Module "<?php echo $this->moduleID; ?>" class.
 * @package application.modules
 */
class <?php echo $this->moduleClass; ?> extends WebModule
{
	/**
	 * This method is called when the module is being created
	 * you may place code here to customize the module or the application.
	 */
	public function init()
	{
		parent::init();

		// your code here...
	}

	/**
	 * This method is called before any module controller action is performed
	 * you may place customized code here.
	 * @return	boolean
	 */
	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			$controller->menu = array(
				// override default menu here...
			);

//			if(Yii::app()->user->isAdmin)
				return true;
//			Yii::app()->request->redirect(Yii::app()->baseUrl ? Yii::app()->baseUrl : '/');
		}
		return false;
	}
}
