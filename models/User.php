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
 * @property int|null $host_loker_id
 * @property int|null $lokasi_gedung_id
 * @property int|null $kota_id
 *
 * @property HostLoker $hostLoker
 * @property Kota $kota
 * @property LokasiGedung $lokasiGedung
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
            [['nik', 'host_loker_id', 'lokasi_gedung_id', 'kota_id'], 'integer'],
            [['nama'], 'string', 'max' => 255],
            [['host_loker_id'], 'exist', 'skipOnError' => true, 'targetClass' => HostLoker::className(), 'targetAttribute' => ['host_loker_id' => 'id']],
            [['kota_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kota::className(), 'targetAttribute' => ['kota_id' => 'id']],
            [['lokasi_gedung_id'], 'exist', 'skipOnError' => true, 'targetClass' => LokasiGedung::className(), 'targetAttribute' => ['lokasi_gedung_id' => 'id']],
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

    

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik' => 'Nomor Induk Karyawan',
            'nama' => 'Nama',
            'host_loker_id' => 'Host',
            'lokasi_gedung_id' => 'Lokasi Gedung',
            'kota_id' => 'Kota',
        ];
    }

    /**
     * Gets query for [[HostLoker]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHostLoker()
    {
        return $this->hasOne(HostLoker::className(), ['id' => 'host_loker_id']);
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
     * Gets query for [[LokasiGedung]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLokasiGedung()
    {
        return $this->hasOne(LokasiGedung::className(), ['id' => 'lokasi_gedung_id']);
    }
}
