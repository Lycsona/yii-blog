<?php
class RegistrationController extends Controller
{
	public function actionIndex()
	{
		$model = new Users;

		if (isset($_POST['Users'])) {
			$model->attributes = $_POST['Users'];
			$model->ip = (int)$_SERVER['REMOTE_ADDR'];
			if ($model->validate()) {
				if ($model->save()) {
					$this->redirect('/profile/index');
				}
			}

		}

		$this->render('index', array('model' => $model));

	}


}