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
	
		// Jika ada input login
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
    // Membuat objek model untuk user
    $model = new User;

    // Jika form di-submit dan data valid
    if (isset($_POST['User'])) {
        // Mengisi atribut model dengan data dari form
        $model->attributes = $_POST['User'];

        // Validasi data
        if ($model->validate()) {
            // Hash password sebelum disimpan
            $model->password = CPasswordHelper::hashPassword($model->password);

            // Coba untuk menyimpan data
            try {
                if ($model->save()) {
                    // Redirect ke halaman login setelah registrasi sukses
                    $this->redirect(array('site/login'));
                }
            } catch (CDbException $e) {
                // Jika terjadi error pada database (misalnya duplikasi username)
                if ($e->getCode() == 23505) {
                    // Kode error untuk duplikasi (PostgreSQL)
                    Yii::app()->user->setFlash('error', 'Username sudah digunakan. Silakan pilih username lain.');
                } else {
                    // Pesan umum untuk error lain
                    Yii::app()->user->setFlash('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
                }
            }
        } else {
            // Jika validasi gagal, tampilkan pesan error
            Yii::app()->user->setFlash('error', 'Ada kesalahan pada form. Periksa kembali data yang dimasukkan.');
        }
    }

    // Render tampilan register.php dengan mengirimkan model
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
		// Ambil data user atau informasi lainnya jika diperlukan
		$user = User::model()->findByPk(Yii::app()->user->id);
		
		// Render view yang berada di protected/views/dashboard/adminDashboard.php
		$this->render('/dashboard/adminDashboard', [
			'model' => $user
		]);
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

 // Action untuk menampilkan dashboard admin
 public function actionDashboard()
 {
	 // Ambil data model yang dibutuhkan, seperti data admin atau user
	 $model = User::model()->findByPk(1);  // Contoh data user atau model yang lain

	 // Jika ini permintaan AJAX, render partial view untuk memuat konten dinamis
	 if (Yii::app()->request->isAjaxRequest) {
		 $this->renderPartial('dashboardContent', ['model' => $model], false, true);
	 } else {
		 // Jika bukan AJAX, tampilkan tampilan penuh
		 $this->render('dashboard', ['model' => $model]);
	 }
 }

}