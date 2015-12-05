<?php echo "<?php\n"; ?>

Yii::import('zii.widgets.CPortlet');

/**
 * <?php echo ucfirst($this->className); ?> portlet class.
 * @package application.portlets
 */
class <?php echo ucfirst($this->className); ?> extends <?php echo $this->baseClass."\n"; ?>
{
	/**
	 * Initializes the widget.
	 * This renders the open tags needed by the portlet.
	 * It also renders the decoration, if any.
	 */
	public function init()
	{
		$this->title = CHtml::encode(Yii::t('app', '<?php echo ucfirst($this->className); ?>'));

		parent::init();
	}

	/**
	 * Renders the content of the portlet.
	 */
	protected function renderContent()
	{
		// put code here
	}
}