<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kota".
 *
 * @property int $id
 * @property string $nama_kota
 *
 * @property User[] $users
 */
class Kota extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kota';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kota'], 'required'],
            [['nama_kota'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_kota' => 'Nama Kota',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['kota_id' => 'id']);
    }
}
