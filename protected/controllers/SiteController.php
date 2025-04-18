<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
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
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;
	
		// Jika sudah login, redirect ke halaman home
		if (!Yii::app()->user->isGuest) {
			$this->redirect(array('site/index'));
		}
	
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
	
			if ($model->validate() && $model->login()) {
				// Redirect setelah login berhasil
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
	
		$this->render('login', array('model' => $model));
	}
	

	public function actionRegister()
{
  $model = new User;

  if (isset($_POST['User'])) {
    $model->attributes = $_POST['User'];
    $model->password = md5($model->password); // atau bcrypt kalau support
    if ($model->save()) {
      Yii::app()->user->setFlash('success', 'Akun berhasil dibuat. Silakan login.');
      $this->redirect(array('site/login'));
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
		// Mengambil jumlah total pasien
		$totalPasien = Yii::app()->db->createCommand("SELECT COUNT(*) FROM users WHERE role='pasien'")->queryScalar();
	
		// Mengambil jumlah total tindakan medis
		$totalTindakan = Yii::app()->db->createCommand('SELECT COUNT(*) FROM tindakan')->queryScalar();
	
		// Mengambil total pembayaran (asumsi ada tabel pembayaran)
		$totalPembayaran = Yii::app()->db->createCommand("SELECT COALESCE(SUM(jumlah), 0) FROM pembayaran")->queryScalar();
	
		// Ambil data profil admin yang sedang login
		$admin = Yii::app()->user->id; // Ambil ID admin yang sedang login
		$model = User::model()->findByPk($admin);
	
		// Ambil aktivitas terbaru untuk Recent Activity (Opsional)
		$recentActivities = $this->getRecentActivities();
	
		// Render halaman dashboard
		$this->render('adminDashboard', array(
			'totalPasien' => $totalPasien,
			'totalTindakan' => $totalTindakan,
			'totalPembayaran' => $totalPembayaran,
			'model' => $model,  // data profil admin
			'recentActivities' => $recentActivities, // data aktivitas terbaru
		));
	}
	private function getRecentActivities()
{
    // Cek jika tabel 'activities' ada
    $tableExists = Yii::app()->db->createCommand("SELECT to_regclass('activities')")->queryScalar();

    if ($tableExists) {
        return Yii::app()->db->createCommand("SELECT * FROM activities ORDER BY created_at DESC LIMIT 5")->queryAll();
    } else {
        return []; // Jika tabel tidak ada, kembalikan array kosong
    }
}


}