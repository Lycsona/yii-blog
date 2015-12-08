<?php

class ProfileController extends Controller
{
    public function actionIndex()
    {
        session_start();
        if (isset($_SESSION['user'])) {

            $model = Articles::model()->findAll();

            $this->render('index', array(
                'model' => $model,
            ));
        } else {
            $this->redirect(array('registration/index'));
        }
    }

    public function actionExit()
    {
        session_start();
        session_destroy();
        $this->redirect(array('home/index'));
    }
}