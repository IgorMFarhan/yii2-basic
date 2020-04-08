<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
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
 * @property int $status_karyawan
 *
 * @property Diarium[] $diaria
 * @property Laporan[] $laporans
 * @property Unit2 $unit2
 * @property Unit1 $unit1
 * @property StatusKaryawan $statusKaryawan
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
    

    public function rules()
    {
        return [
            [['nik', 'unit1_id', 'unit2_id', 'status_karyawan'], 'integer'],
            ['nik', 'unique', 'message' => 'NIK/No. HP sudah terdaftar'],
            [['nik','nama', 'unit1_id', 'unit2_id', 'kota_id','auth_key'], 'required'],
            [['nik'], 'unique'],
            [['nama'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['unit2_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit2::className(), 'targetAttribute' => ['unit2_id' => 'id']],
            [['unit1_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit1::className(), 'targetAttribute' => ['unit1_id' => 'id']],
            [['status_karyawan'], 'exist', 'skipOnError' => true, 'targetClass' => StatusKaryawan::className(), 'targetAttribute' => ['status_karyawan' => 'id']],

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
            'status_karyawan' => 'Status Karyawan',
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
     * Gets query for [[Unit1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnit1()
    {
        return $this->hasOne(Unit1::className(), ['id' => 'unit1_id']);
    }

    /**
     * Gets query for [[StatusKaryawan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatusKaryawan()
    {
        return $this->hasOne(StatusKaryawan::className(), ['id' => 'status_karyawan']);
    }
}
