<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "host_loker".
 *
 * @property int $id
 * @property string $host_loker
 *
 * @property Laporan[] $laporans
 * @property User[] $users
 */
class HostLoker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'host_loker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['host_loker'], 'required'],
            [['host_loker'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'host_loker' => 'Host Loker',
        ];
    }

    /**
     * Gets query for [[Laporans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaporans()
    {
        return $this->hasMany(Laporan::className(), ['host_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['host_loker_id' => 'id']);
    }
}
