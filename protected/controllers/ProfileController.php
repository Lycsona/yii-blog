<?php

class ProfileController extends Controller
{
    public function actionIndex()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            $userId = $_SESSION['user']['id'];
//            $model = Articles::model()->findAll();
            $sql = "
    SELECT *
      FROM `tbl_articles`
INNER JOIN `tbl_user_articles`
        ON `tbl_user_articles`.`article_id` = `tbl_articles`.`id`
       AND `tbl_user_articles`.`user_id` = '$userId'";

            $model=Articles::model()->findAllBySql($sql);

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