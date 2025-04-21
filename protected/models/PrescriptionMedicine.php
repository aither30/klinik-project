<?php
class PrescriptionMedicine extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'prescription_medicines';
    }

    public function rules()
    {
        return [
            ['prescription_id, medicine_id, quantity', 'required'],
        ];
    }
}
