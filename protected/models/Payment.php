<?php
class Payment extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'payments';
    }

    public function rules()
    {
        return [
            ['prescription_id, total_amount, status', 'required'],
            ['prescription_id', 'numerical', 'integerOnly'=>true],
            ['total_amount', 'numerical'],
            ['status', 'length', 'max'=>20],
            array('method_payment', 'safe'),
        ];
    }

    public function relations()
    {
        return [
            'prescription' => [self::BELONGS_TO, 'Prescription', 'prescription_id'],
            // lewat prescription → visit → patient
            'patient' => [self::HAS_ONE, 'Patient', ['id'=>'patient_id'], 'through'=>'prescription.visit'],
        ];
    }

    public function beforeSave()
{
    if ($this->isNewRecord && empty($this->status)) {
        $this->status = 'unselected';
    }
    return parent::beforeSave();
}

}
