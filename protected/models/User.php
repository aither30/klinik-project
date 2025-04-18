<?php

class User extends CActiveRecord
{
    // Kolom yang akan digunakan dalam model
    public $email;
    public $password;  // Jangan lupa untuk menambahkan kolom password jika diperlukan
    public $last_login; // Kolom untuk menyimpan informasi login terakhir

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'users';  // Sesuaikan dengan nama tabel yang Anda gunakan
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            // Kolom yang wajib diisi
            array('email, username, password', 'required'),
            
            // Validasi format email
            array('email', 'email'),
            
            // Validasi panjang password minimal 6 karakter
            array('password', 'length', 'min' => 6),
            
            // Validasi format username dan password
            array('username', 'length', 'max' => 128),
            
            // Validasi role agar hanya bisa berisi nilai yang diizinkan
            array('role', 'in', 'range' => array('admin', 'doctor', 'nurse', 'receptionist')),
            
            // Menjamin bahwa username dan email bersifat unik
            array('username, email', 'unique'),
            
            // Kolom lain yang mungkin perlu diisi
            array('last_login', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            // Menambahkan relasi dengan tabel lain jika diperlukan
            // Misalnya, User bisa memiliki banyak Pasien
            // 'patients' => array(self::HAS_MANY, 'Patient', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'email' => 'Email Address',
            'username' => 'Username',
            'password' => 'Password',
            'role' => 'Role',
            'last_login' => 'Last Login',
        );
    }

    /**
     * Before save hook to hash password before saving to DB
     */
    protected function beforeSave()
    {
        if ($this->isNewRecord || !empty($this->password)) {
            // Hash password before saving
            $this->password = CPasswordHelper::hashPassword($this->password);
        }
        
        return parent::beforeSave();
    }

    /**
     * Verifies the password entered by the user
     * @param string $password The password to verify
     * @return boolean whether the password is valid
     */
    public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password, $this->password);
    }

    /**
     * @return CActiveRecord the static model of the specified AR class.
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
