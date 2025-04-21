<?php

class Medicine extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'medicines'; // Nama tabel sesuai database
    }

    public function rules()
    {
        return [
            ['name, stock, price_per_unit', 'required'],
            ['name', 'length', 'max' => 100],
            ['stock', 'numerical', 'integerOnly' => true, 'min' => 0],
            ['price_per_unit', 'numerical', 'min' => 0],
            ['usage_instructions', 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Nama Obat',
            'stock' => 'Stok',
            'price_per_unit' => 'Harga per Satuan',
            'usage_instructions' => 'Aturan Pakai',
        ];
    }
}
