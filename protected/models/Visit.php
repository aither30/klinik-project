<?php

class Visit extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'visits'; // sesuaikan dengan nama tabel kamu
    }

    public function relations()
    {
        return [
            'doctor' => [self::BELONGS_TO, 'User', 'doctor_id'],
            'patient' => [self::BELONGS_TO, 'Patient', 'patient_id'],
            'prescriptions' => [self::HAS_MANY, 'Prescription', 'visit_id'],
        ];
    }

    public function rules()
{
    return array(
        array('doctor_id', 'required', 'message' => 'Dokter harus dipilih'),
        // aturan validasi lainnya
    );
}

}
