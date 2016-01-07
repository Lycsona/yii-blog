<?php

class ProfileController extends Controller
{
    public function actionIndex()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            $userId = $_SESSION['user']['id'];
            $userAvatar = $_SESSION['user']['avatar'];
            $userName = $_SESSION['user']['firstname'];
            $models = UserArticles::model()->findAll("user_id=:user_id",
                array(":user_id" => $userId));


            $this->render('index', array(
                'models' => $models,
                'userId' => $userId,
                'userAvatar' => $userAvatar,
                'userName' => $userName
            ));
        } else {
            $this->redirect(array('registration/index'));
        }
    }

    public function actionSearch()
    {
        session_start();
        if (isset($_SESSION['user']) && isset($_POST['title'])) {
            $userId = $_SESSION['user']['id'];

            $title = $_POST['title'];

            $sql = "
            SELECT `tbl_articles`.`id`,`tbl_articles`.`title`,`tbl_articles`.`aticle`,`tbl_articles`.`description`,`tbl_articles`.`imj`,`tbl_articles`.`created_at`
            FROM `tbl_articles`
            INNER JOIN `tbl_user_articles`
            ON `tbl_user_articles`.`article_id` = `tbl_articles`.`id`
            AND `tbl_user_articles`.`user_id` = '$userId'
            AND `tbl_articles`.`title` = '$title'";

            $modelArticle = Articles::model()->findAllBySql($sql);


            $this->render('search', array(
                'modelArticle' => $modelArticle,
            ));
        } else {
            $modelArticleNoIsset = 'статьи не найдено.';
            $this->render('search', array(
                'modelArticleNoIsset' => $modelArticleNoIsset,
            ));
        }
    }

    public function actionExit()
    {
        session_start();
        session_destroy();
        $this->redirect(array('home/index'));
    }
}