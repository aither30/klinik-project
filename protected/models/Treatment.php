<?php

class Treatment extends CActiveRecord
{
    public $id;
    public $prescription_id;
    public $treatment_details;
    public $treatment_time;
    public $diagnosis;

    

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'treatments'; // pastikan ini sesuai dengan nama tabel
    }

    public function rules()
    {
        return array(
            array('patient_id, treatment_name', 'required'),
            array('treatment_time', 'date', 'format' => 'yyyy-MM-dd HH:mm:ss'),
        );
    }
}
