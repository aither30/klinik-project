<?php

class PrescriptionDetail extends CActiveRecord
{
    
    public function tableName()
    {
        return 'prescription_details';
    }

    
    public function rules()
    {
        return array(
            array('prescription_id, medicine_id', 'required'),
            array('prescription_id, medicine_id', 'numerical', 'integerOnly'=>true),
        );
    }

    
    public function relations()
    {
        return array(
            'prescription' => array(self::BELONGS_TO, 'Prescription', 'prescription_id'),
            'medicine' => array(self::BELONGS_TO, 'Medicine', 'medicine_id'),
        );
    }

    
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
