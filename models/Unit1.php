<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit1".
 *
 * @property int $id
 * @property string $lokasi_gedung
 *
 * @property User[] $users
 */
class Unit1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lokasi_gedung'], 'required'],
            [['lokasi_gedung'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lokasi_gedung' => 'Lokasi Gedung',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['unit1_id' => 'id']);
    }
}
