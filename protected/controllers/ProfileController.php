<?php

class ProfileController extends Controller
{
    public function actionIndex()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            $this->render('index');
        } else {
            $this->redirect(array('registration/index'));
        }
    }
}