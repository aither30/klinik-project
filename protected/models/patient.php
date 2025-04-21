<?php

class Patient extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    // Menentukan nama tabel yang digunakan oleh model ini
    public function tableName()
    {
        return 'patients';  // Nama tabel yang digunakan adalah 'patients'
    }

    // Mendefinisikan aturan validasi untuk kolom tabel
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

    // Mendefinisikan relasi-relasi antar tabel
    public function relations()
    {
        return [
            'visits' => array(self::HAS_MANY, 'Visit', 'patient_id'),
            'treatments' => array(self::MANY_MANY, 'Treatment', 'patient_treatment(patient_id, treatment_id)'),
            'doctor' => array(self::BELONGS_TO, 'User', 'doctor_id'),
            'kabupaten' => array(self::BELONGS_TO, 'Kabupaten', 'kabupaten_id'),
        ];
    }

    // Menentukan nama kolom kunci utama di tabel
    public function primaryKey()
    {
        return 'id';  // ID pasien adalah primary key di tabel 'patients'
    }

    // Mendefinisikan format data yang ditampilkan oleh model
    public function __toString()
    {
        return $this->name;
    }
}
