<?php
/**
 * This is the template for generating a controller class file for CRUD feature.
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>

/**
 * <?php echo $this->modelClass; ?> management controller class.
 *
 * @author Roman Masyahin <w325918@gmail.com>
 * @package application.controllers
 */
class <?php echo $this->controllerClass; ?> extends Controller
{
	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model = new <?php echo $this->modelClass; ?>('search');

		if(isset($_GET['<?php echo $this->modelClass; ?>']))
			$model->attributes = $_GET['<?php echo $this->modelClass; ?>'];

		$dataProvider = $model->search();

		$this->render('index', array(
			'dataProvider' => $dataProvider,
			'model' => $model,
		));
	}

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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionCreate()
	{
		$model = new <?php echo $this->modelClass; ?>;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['cancel']))
			$this->redirect(array('index'));

		if(isset($_POST['<?php echo $this->modelClass; ?>']))
		{
			$model->attributes = $_POST['<?php echo $this->modelClass; ?>'];

			if($model->save())
				$this->redirect(array('view','id' => $model-><?php echo $this->tableSchema->primaryKey; ?>));
		}
		$this->render('create', array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'show' page.
	 * @param integer $id the model ID.
	 */
	public function actionUpdate($id)
	{
		if(!($model = <?php echo $this->modelClass; ?>::model()->findByPk($id)))
			throw new CHttpException(404, Yii::t('app', 'Page not found.'));
		else
		{
			if(isset($_POST['cancel']))
				$this->redirect(array('view', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>));

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['<?php echo $this->modelClass; ?>']))
			{
				$model->attributes = $_POST['<?php echo $this->modelClass; ?>'];

				if($model->save())
					$this->redirect(array('view', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>));
			}

			$this->render('update', array(
				'model' => $model,
			));
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the model ID.
	 */
	public function actionDelete($id)
	{
		if(!($model = <?php echo $this->modelClass; ?>::model()->findByPk($id)))
			throw new CHttpException(404, Yii::t('app', 'Page not found.'));
		else
		{
			if(!$model->delete())
				Yii::app()->user->setFlash('error', Yii::t('app', 'Internal error. Please try again later.'));
		}
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(array('index'));
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] === '<?php echo $this->class2id($this->modelClass); ?>-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
