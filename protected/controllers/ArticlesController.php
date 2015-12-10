<?php

/**
 * Articles management controller class.
 * @package application.controllers
 */
class ArticlesController extends Controller
{
    /**
     * Manages all models.
     */
    public function actionIndex()
    {
        $model = new Articles;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['cancel']))
            $this->redirect(array('index'));

        if (isset($_POST['Articles'])) {
            $model->attributes = $_POST['Articles'];

            if ($model->save()) {
                //___________________
                $modelUserArticles = new UserArticles;
                session_start();
                $modelUserArticles->user_id = $_SESSION['user']['id'];
                $modelUserArticles->article_id = $model->id;
                $modelUserArticles->save();
                //___________________
                $this->redirect(array('profile/index'));
            }
        }

        $this->render('index', array(
            'model' => $model,
        ));
    }


    /**
     * Shows a particular model.
     * @param integer $id the model ID.
     */
    public function actionView($id)
    {
        if (!($model = Articles::model()->findByPk($id)))
            throw new CHttpException(404, Yii::t('app', 'Page not found.'));
        else {
            $this->render('view', array(
                'model' => $model,
            ));
        }
    }


    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'show' page.
     * @param integer $id the model ID.
     */
    public function actionUpdate($id)
    {
        if (!($model = Articles::model()->findByPk($id)))
            throw new CHttpException(404, Yii::t('app', 'Page not found.'));
        else {
            if (isset($_POST['cancel']))
                $this->redirect(array('view', 'id' => $model->id));

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['Articles'])) {
                $model->attributes = $_POST['Articles'];

                if ($model->save())
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

        if (!($model = Articles::model()->findByPk($id)))
            throw new CHttpException(404, Yii::t('app', 'Page not found.'));
        else {
            if (!$model->delete())
                Yii::app()->user->setFlash('error', Yii::t('app', 'Internal error. Please try again later.'));
        }
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(array('index'));
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'articles-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
