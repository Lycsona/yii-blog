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
SELECT `tbl_articles`.`id`,`tbl_articles`.`title`,`tbl_articles`.`aticle`,`tbl_articles`.`description`,`tbl_articles`.`imj`,`tbl_articles`.`created_at`
FROM `tbl_articles`
  INNER JOIN `tbl_user_articles`
    ON `tbl_user_articles`.`article_id` = `tbl_articles`.`id`
       AND `tbl_user_articles`.`user_id` = '$userId'
ORDER BY `tbl_articles`.id DESC";


            //   $model = Articles::model()->findAllBySql($sql);

            //________________
            $criteria = new CDbCriteria();
            $count = Articles::model()->count($criteria);

            $pages = new CPagination($count);
            // элементов на страницу
            $pages->pageSize = 1;
            $pages->applyLimit($criteria);

            $models = Articles::model()->findAll($criteria);
            $this->render('index', array(
                'models' => $models,
                'pages' => $pages,
            ));
            //________________

//            $this->render('index', array(
//                'model' => $model,
//            ));
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