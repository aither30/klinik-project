<?php
// Di dalam file Kabupaten.php
class Kabupaten extends CActiveRecord {
    // Fungsi ini mendefinisikan nama tabel yang digunakan
    public function tableName() {
        return 'kabupaten';  // Nama tabel yang sesuai di database
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
