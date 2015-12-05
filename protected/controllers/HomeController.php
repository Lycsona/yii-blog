<?php

class HomeController extends Controller
{
    public function actionIndex()
    {

        $this->render('index');
    }


    public function actionEnter()
    {

//        if (isset($_POST['email']) && isset($_POST['password'])) {
//            $email = $_POST['email'];
//            $password = $_POST['password'];
//        }
        $this->render("/profile/index");

    }
}




