<?php

class Patient extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    
    public function tableName()
    {
        return 'patients';  
    }

    
    public function rules()
    {
        return [
            ['id, name, address, role', 'required', 'message' => '{attribute} tidak boleh kosong.'],
            ['email', 'unique', 'message' => '{attribute} sudah digunakan.'],
            ['email', 'email', 'message' => 'Format email tidak valid.'],
            ['visit_id', 'numerical', 'integerOnly' => true, 'message' => 'ID kunjungan harus berupa angka.'],
            ['phone', 'length', 'max' => 20, 'message' => '{attribute} tidak boleh lebih dari 20 karakter.'],
            ['age', 'numerical', 'integerOnly' => true, 'message' => 'Usia harus berupa angka.'],
            ['gender', 'in', 'range' => ['M', 'F'], 'message' => 'Jenis kelamin tidak valid.'],
        ];
    }

    
    public function relations()
    {
        return [
            'visits' => array(self::HAS_MANY, 'Visit', 'patient_id'),
            'treatments' => array(self::MANY_MANY, 'Treatment', 'patient_treatment(patient_id, treatment_id)'),
            'doctor' => array(self::BELONGS_TO, 'User', 'doctor_id'),
            'kabupaten' => array(self::BELONGS_TO, 'Kabupaten', 'kabupaten_id'),
        ];
    }

    
    public function primaryKey()
    {
        return 'id';  
    }

    
    public function __toString()
    {
        return $this->name;
    }
}
