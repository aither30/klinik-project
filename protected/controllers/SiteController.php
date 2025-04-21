<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(

			'captcha' => array(
				'class' => 'CCaptchaAction',
				'backColor' => 0xFFFFFF,
			),


			'page' => array(
				'class' => 'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{



		$this->render('index');
	}


	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model = new ContactForm;
		if (isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];
			if ($model->validate()) {
				$name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
				$subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
				$headers = "From: $name <{$model->email}>\r\n" .
					"Reply-To: {$model->email}\r\n" .
					"MIME-Version: 1.0\r\n" .
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
				Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact', array('model' => $model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;


		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			if ($model->validate() && $model->login()) {
				$this->redirect(Yii::app()->user->returnUrl);
			} else {
				Yii::app()->user->setFlash('error', 'Username atau Password salah.');
			}
		}

		$this->render('login', array('model' => $model));
	}




	public function actionRegister()
	{

		$model = new User;


		if (isset($_POST['User'])) {

			$model->attributes = $_POST['User'];


			if ($model->validate()) {

				$model->password = CPasswordHelper::hashPassword($model->password);


				try {
					if ($model->save()) {

						$this->redirect(array('site/login'));
					}
				} catch (CDbException $e) {

					if ($e->getCode() == 23505) {

						Yii::app()->user->setFlash('error', 'Username sudah digunakan. Silakan pilih username lain.');
					} else {

						Yii::app()->user->setFlash('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
					}
				}
			} else {

				Yii::app()->user->setFlash('error', 'Ada kesalahan pada form. Periksa kembali data yang dimasukkan.');
			}
		}


		$this->render('register', array('model' => $model));
	}



	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}


	public function actionAdminDashboard()
	{

		$user = User::model()->findByPk(Yii::app()->user->id);


		$this->render('/dashboard/adminDashboard', [
			'model' => $user
		]);
	}

	private function getRecentActivities()
	{

		$tableExists = Yii::app()->db->createCommand("SELECT to_regclass('activities')")->queryScalar();

		if ($tableExists) {
			return Yii::app()->db->createCommand("SELECT * FROM activities ORDER BY created_at DESC LIMIT 5")->queryAll();
		} else {
			return [];
		}
	}


	public function actionDashboard()
	{

		$model = User::model()->findByPk(1);


		if (Yii::app()->request->isAjaxRequest) {
			$this->renderPartial('dashboardContent', ['model' => $model], false, true);
		} else {

			$this->render('dashboard', ['model' => $model]);
		}
	}
}
