<?php

class RegistrationController extends Controller
{
    public function actionIndex()
    {
        $model = new Users;

        if (isset($_POST['Users'])) {
            $model->attributes = $_POST['Users'];
            $model->ip = (int)$_SERVER['REMOTE_ADDR'];
            $password = md5($_POST['Users']['password']);
            $model->password = $password;
            $model->avatar = CUploadedFile::getInstance($model, 'avatar');

            if ($model->validate()) {
                if ($model->save()) {

                    $path = Yii::getPathOfAlias('webroot') . '/images/' . $model->avatar->getName();
                    $model->imj->saveAs($path);
                    $this->redirect(Yii::app()->user->returnUrl);
                }
            }

        }

        $this->render('index', array('model' => $model));

    }


}