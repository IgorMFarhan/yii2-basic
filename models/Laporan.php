<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laporan".
 *
 * @property int $id
 * @property int $nik_id
 * @property int $host_id
 * @property int $lokasi_id
 * @property int $kondisi_id
 * @property string $keterangan
 * @property string $submit_date
 *
 * @property HostLoker $host
 * @property Kondisi $kondisi
 * @property LokasiBekerja $lokasi
 * @property User $nik
 */
class Laporan extends \yii\db\ActiveRecord
{
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
            [['nik_id', 'host_id', 'lokasi_id', 'kondisi_id', 'submit_date'], 'required'],
            [['nik_id', 'host_id', 'lokasi_id', 'kondisi_id'], 'integer'],
            [['submit_date'], 'safe'],
            [['keterangan'], 'string', 'max' => 255],
            [['host_id'], 'exist', 'skipOnError' => true, 'targetClass' => HostLoker::className(), 'targetAttribute' => ['host_id' => 'id']],
            [['kondisi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kondisi::className(), 'targetAttribute' => ['kondisi_id' => 'id']],
            [['lokasi_id'], 'exist', 'skipOnError' => true, 'targetClass' => LokasiBekerja::className(), 'targetAttribute' => ['lokasi_id' => 'id']],
            [['nik_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['nik_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik_id' => 'Nik ID',
            'host_id' => 'Host ID',
            'lokasi_id' => 'Lokasi ID',
            'kondisi_id' => 'Kondisi ID',
            'keterangan' => 'Keterangan',
            'submit_date' => 'Submit Date',
        ];
    }

    /**
     * Gets query for [[Host]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHost()
    {
        return $this->hasOne(HostLoker::className(), ['id' => 'host_id']);
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
        return $this->hasOne(LokasiBekerja::className(), ['id' => 'lokasi_id']);
    }

    /**
     * Gets query for [[Nik]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNik()
    {
        return $this->hasOne(User::className(), ['id' => 'nik_id']);
    }
}
