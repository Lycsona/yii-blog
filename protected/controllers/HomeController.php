<?php

class HomeController extends Controller
{
    public function actionIndex()
    {

        if (!defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH)
            throw new CHttpException(500, "This application requires that PHP was compiled with Blowfish support for crypt().");

        $model = new LoginFormModel;

        // collect user input data
        if (isset($_POST['LoginFormModel'])) {

            $model->email = $_POST['LoginFormModel']['email'];
            $model->password = md5($_POST['LoginFormModel']['password']);
            $model->rememberMe = false;

            // validate user input and redirect to the previous page if valid
            //  CVarDumper::dump($model, 10, true);
            if ($model->login($model)) {

                $user = $model->login($model);
                session_start();
                $_SESSION['user'] = $user;

                $this->redirect(array('profile/index'));
            } else {
                $this->redirect(array('registration/index'));
            }

        }
        // display the login form
        $this->render('index', array('model' => $model));

    }
}

