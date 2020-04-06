<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laporan".
 *
 * @property int $id
 * @property int $user_id
 * @property int $unit1_id
 * @property int $unit2_id
 * @property int $lokasi_id
 * @property int $kondisi_id
 * @property string $keterangan
 * @property string $submit_date
 *
 * @property Kondisi $kondisi
 * @property Lokasi $lokasi
 * @property Unit1 $unit1
 * @property Unit2 $unit2
 * @property User $user
 */
class Laporan extends \yii\db\ActiveRecord
{
    
        public $keluarga;
        public $lingkungan;
        public $sakit;
        public $today;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laporan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'unit1_id', 'unit2_id', 'lokasi_id', 'kondisi_id', 'keterangan', 'submit_date'], 'required'],
            [['user_id', 'unit1_id', 'unit2_id', 'lokasi_id', 'kondisi_id'], 'integer'],
            [['keluarga', 'lingkungan', 'sakit'], 'required'],
            [['keluarga', 'lingkungan', 'sakit'], 'string'],
            [['submit_date','today'], 'safe'],
            [['keterangan'], 'string', 'max' => 255],
            [['kondisi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kondisi::className(), 'targetAttribute' => ['kondisi_id' => 'id']],
            [['lokasi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lokasi::className(), 'targetAttribute' => ['lokasi_id' => 'id']],
            [['unit1_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit1::className(), 'targetAttribute' => ['unit1_id' => 'id']],
            [['unit2_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit2::className(), 'targetAttribute' => ['unit2_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'unit1_id' => 'Unit1 ID',
            'unit2_id' => 'Unit2 ID',
            'lokasi_id' => 'Lokasi ID',
            'kondisi_id' => 'Kondisi ID',
            'keterangan' => 'Keterangan',
            'submit_date' => 'Submit Date',
            'keluarga' => 'Keluarga',
            'lingkungan' => 'Lingkungan',
            'sakit' => 'Sakit',
            'today' => 'Pilih Tanggal',
        ];
    }

    /**
     * Gets query for [[Kondisi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKondisi()
    {
        return $this->hasOne(Kondisi::className(), ['id' => 'kondisi_id']);
    }

    /**
     * Gets query for [[Lokasi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLokasi()
    {
        return $this->hasOne(Lokasi::className(), ['id' => 'lokasi_id']);
    }

    /**
     * Gets query for [[Unit1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnit1()
    {
        return $this->hasOne(Unit1::className(), ['id' => 'unit1_id']);
    }

    /**
     * Gets query for [[Unit2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnit2()
    {
        return $this->hasOne(Unit2::className(), ['id' => 'unit2_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
