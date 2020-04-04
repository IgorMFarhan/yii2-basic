<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kondisi".
 *
 * @property int $id
 * @property string $kondisi
 * @property string $badge
 *
 * @property Laporan[] $laporans
 */
class Kondisi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kondisi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kondisi', 'badge'], 'required'],
            [['kondisi', 'badge'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kondisi' => 'Kondisi',
            'badge' => 'Badge',
        ];
    }

    /**
     * Gets query for [[Laporans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaporans()
    {
        return $this->hasMany(Laporan::className(), ['kondisi_id' => 'id']);
    }
}
