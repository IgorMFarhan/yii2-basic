<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit2".
 *
 * @property int $id
 * @property string $unit2
 *
 * @property User[] $users
 */
class Unit2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unit2'], 'required'],
            [['unit2'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unit2' => 'Unit2',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['unit2_id' => 'id']);
    }
}
