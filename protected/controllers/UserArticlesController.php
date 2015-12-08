<?php

/**
 * UserArticles management controller class.
 * @package application.controllers
 */
class UserArticlesController extends Controller
{
	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model = new UserArticles('search');

		if(isset($_GET['UserArticles']))
			$model->attributes = $_GET['UserArticles'];

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
		if(!($model = UserArticles::model()->findByPk($id)))
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
		$model = new UserArticles;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['cancel']))
			$this->redirect(array('index'));

		if(isset($_POST['UserArticles']))
		{
			$model->attributes = $_POST['UserArticles'];

			if($model->save())
				$this->redirect(array('view','id' => $model->id));
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
		if(!($model = UserArticles::model()->findByPk($id)))
			throw new CHttpException(404, Yii::t('app', 'Page not found.'));
		else
		{
			if(isset($_POST['cancel']))
				$this->redirect(array('view', 'id' => $model->id));

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['UserArticles']))
			{
				$model->attributes = $_POST['UserArticles'];

				if($model->save())
					$this->redirect(array('view', 'id' => $model->id));
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
		if(!($model = UserArticles::model()->findByPk($id)))
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
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'user-articles-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
