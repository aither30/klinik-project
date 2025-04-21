<?php

class Kabupaten extends CActiveRecord {
    
    public function tableName() {
        return 'kabupaten';  
    }

    public function relations() {
        return array(
            'patients' => array(self::HAS_MANY, 'Patient', 'kabupaten_id'),
        );
    }

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
}
