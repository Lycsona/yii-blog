<?php
/**
 * This is the template for generating a controller class file for CRUD feature.
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>

/**
 * <?php echo $this->modelClass; ?> list controller class.
 */
class <?php echo $this->controllerClass; ?> extends Controller
{
	/**
	 * Shows a particular model.
	 * @param integer $id the model ID.
	 */
	public function actionView($id)
	{
		if(!($model = <?php echo $this->modelClass; ?>::model()->findByPk($id)))
			throw new CHttpException(404, Yii::t('app', 'Page not found.'));
		else
		{
			$this->render('view', array(
				'model' => $model,
			));
		}
	}

	/**
	 * List all models.
	 */
	public function actionIndex()
	{
		$model = new <?php echo $this->modelClass; ?>('search');

		if(isset($_GET['<?php echo $this->modelClass; ?>']))
			$model->attributes = $_GET['<?php echo $this->modelClass; ?>'];

		$dataProvider = $model->search();

		$sortableAttributes = array(
<?php
	foreach($this->tableSchema->columns as $name=>$column)
	{
		switch($column->type)
		{
		case 'string':
			switch($column->dbType)
			{
			case 'text':
			case 'longtext':
			case 'mediumtext':
				$html = '';
				break;
			default:
				if(!preg_match('/_id$/si', $name))
					echo "\t\t\t'{$name}',\n";
			}
		}
	}
?>
		);

		$this->render('index', array(
			'dataProvider' => $dataProvider,
			'model' => $model,
			'sortableAttributes' => $sortableAttributes,
		));
	}
}
