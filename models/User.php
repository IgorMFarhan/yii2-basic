<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int|null $nik
 * @property string|null $nama
 * @property string $auth_key
 * @property int|null $unit1_id
 * @property int|null $unit2_id
 * @property int|null $kota_id
 *
 * @property Laporan[] $laporans
 * @property Unit2 $unit2
 * @property Kota $kota
 * @property Unit1 $unit1
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    public function rules()
    {
        return [
            [['nik', 'unit1_id', 'unit2_id', 'kota_id'], 'integer'],
            [['auth_key'], 'required'],
            [['nama'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['unit2_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit2::className(), 'targetAttribute' => ['unit2_id' => 'id']],
            [['kota_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kota::className(), 'targetAttribute' => ['kota_id' => 'id']],
            [['unit1_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit1::className(), 'targetAttribute' => ['unit1_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByNik($nik)
    {
        return static::findOne(['nik' => $nik]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik' => 'Nik',
            'nama' => 'Nama',
            'auth_key' => 'Auth Key',
            'unit1_id' => 'Unit1 ID',
            'unit2_id' => 'Unit2 ID',
            'kota_id' => 'Kota ID',
        ];
    }



    /**
     * Gets query for [[Laporans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaporans()
    {
        return $this->hasMany(Laporan::className(), ['user_id' => 'id']);
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
     * Gets query for [[Kota]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKota()
    {
        return $this->hasOne(Kota::className(), ['id' => 'kota_id']);
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
}
