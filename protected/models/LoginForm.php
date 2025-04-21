<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
    public $username;
    public $password;
    public $rememberMe; // Menambahkan properti rememberMe

    private $_identity;

    public function rules()
    {
        return array(
            array('username, password', 'required'),
            array('password', 'length', 'min' => 6),
			array('password', 'authenticate'),
            array('rememberMe', 'boolean'), // Menambahkan aturan validasi untuk rememberMe
        );
    }

    public function validateLogin()
    {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            if (!$this->_identity->authenticate()) {
                $this->addError('password', 'Username atau password salah. Silakan coba lagi.');
                return false;
            }
        }
        return true;
    }

	public function authenticate($attribute, $params)
	{
		$this->_identity = new UserIdentity($this->username, $this->password);
		if (!$this->_identity->authenticate())
			$this->addError('password','Username atau password salah.');
	}
	


    public function login()
    {
        if ($this->validateLogin()) {
            return Yii::app()->user->login($this->_identity, $this->rememberMe ? 3600*24*30 : 0); // Menambahkan waktu session jika rememberMe dicentang
        }
        return false;
    }
}
