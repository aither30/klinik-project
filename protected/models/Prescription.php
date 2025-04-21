<?php

class Prescription extends CActiveRecord
{
    public $treatment_id;
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'prescriptions'; // Nama tabel di database, sesuaikan kalau beda
    }

    public function rules()
    {
        return array(
            array(' visit_id , treatment_id', 'required'),
            array('description', 'safe'),
        );
    }

    public function relations()
    {
        return array(
            'visit'               => [self::BELONGS_TO,   'Visit',     'visit_id'],
            'treatment'           => [self::BELONGS_TO,   'Treatment', 'treatment_id'],
            'prescriptionMedicines' => [self::HAS_MANY,   'PrescriptionMedicine', 'prescription_id'],
            'medicines'           => [self::MANY_MANY,    'Medicine',  'prescription_medicines(prescription_id,medicine_id)'],
        );
    }

    
}
