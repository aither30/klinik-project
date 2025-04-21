<?php

class PrescriptionDetail extends CActiveRecord
{
    // Tentukan nama tabel yang digunakan oleh model
    public function tableName()
    {
        return 'prescription_details';
    }

    // Tentukan aturan validasi untuk model
    public function rules()
    {
        return array(
            array('prescription_id, medicine_id', 'required'),
            array('prescription_id, medicine_id', 'numerical', 'integerOnly'=>true),
        );
    }

    // Tentukan hubungan dengan tabel lain
    public function relations()
    {
        return array(
            'prescription' => array(self::BELONGS_TO, 'Prescription', 'prescription_id'),
            'medicine' => array(self::BELONGS_TO, 'Medicine', 'medicine_id'),
        );
    }

    // Tentukan nama model
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
