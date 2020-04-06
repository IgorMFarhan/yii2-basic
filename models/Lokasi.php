<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lokasi".
 *
 * @property int $id
 * @property string $lokasi
 *
 * @property Laporan[] $laporans
 */
class Lokasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lokasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lokasi'], 'required'],
            [['lokasi'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lokasi' => 'Lokasi',
        ];
    }

    /**
     * Gets query for [[Laporans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaporans()
    {
        return $this->hasMany(Laporan::className(), ['lokasi_id' => 'id']);
    }
}
