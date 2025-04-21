<?php

class User extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'users';
    }
    public function rules()
    {
        return array(
            array('username, password, role', 'required', 'message' => '{attribute} wajib diisi.'),
            array('username', 'length', 'max' => 50, 'message' => '{attribute} tidak boleh lebih dari 50 karakter.'),
            array('password', 'length', 'min' => 6, 'message' => '{attribute} harus terdiri dari minimal 6 karakter.'),
            array('role', 'in', 'range' => array('admin', 'dokter', 'petugas_pendaftaran', 'kasir'), 'message' => '{attribute} harus salah satu dari admin, dokter, petugas, kasir.'),
            array('email', 'email', 'message' => '{attribute} tidak valid.'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name', 
            'role' => 'Role',
            
        );
    }
    
}

