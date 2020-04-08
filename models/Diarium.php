<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diarium".
 *
 * @property int $id
 * @property int $nik
 * @property string $unit1
 * @property string $unit2
 * @property string|null $lokasi_id
 * @property string $kondisi_id
 * @property string $submit_date
 * @property float $versi_app
 *
 * @property User $nik0
 */
class Diarium extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diarium';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'unit1', 'unit2', 'kondisi_id', 'submit_date', 'versi_app'], 'required'],
            [['nik'], 'integer'],
            [['submit_date'], 'safe'],
            [['versi_app'], 'number'],
            [['unit1', 'unit2', 'lokasi_id', 'kondisi_id'], 'string', 'max' => 255],
            [['nik'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['nik' => 'nik']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik' => 'Nik',
            'unit1' => 'Unit1',
            'unit2' => 'Unit2',
            'lokasi_id' => 'Lokasi ID',
            'kondisi_id' => 'Kondisi ID',
            'submit_date' => 'Submit Date',
            'versi_app' => 'Versi App',
        ];
    }

    /**
     * Gets query for [[Nik0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNik0()
    {
        return $this->hasOne(User::className(), ['nik' => 'nik']);
    }
}
