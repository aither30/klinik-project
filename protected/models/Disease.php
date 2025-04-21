<?php

class Disease extends CActiveRecord
{
    public function tableName()
    {
        return 'diseases'; 
    }

    public function rules()
    {
        return [
            ['name', 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Nama Penyakit',
        ];
    }

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
