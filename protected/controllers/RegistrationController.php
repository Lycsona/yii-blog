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
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect(Yii::app()->user->returnUrl);
                }
            }

        }

        $this->render('index', array('model' => $model));

    }


}