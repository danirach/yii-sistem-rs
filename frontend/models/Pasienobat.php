<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pasienobat".
 *
 * @property int $PasienId
 * @property int $ObatId
 *
 * @property Obat $obat
 * @property Pasien $pasien
 */
class Pasienobat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasienobat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PasienId', 'ObatId'], 'required'],
            [['PasienId', 'ObatId'], 'integer'],
            [['PasienId', 'ObatId'], 'unique', 'targetAttribute' => ['PasienId', 'ObatId']],
            [['PasienId'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::class, 'targetAttribute' => ['PasienId' => 'id']],
            [['ObatId'], 'exist', 'skipOnError' => true, 'targetClass' => Obat::class, 'targetAttribute' => ['ObatId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PasienId' => 'Pasien ID',
            'ObatId' => 'Obat ID',
        ];
    }

    /**
     * Gets query for [[Obat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObat()
    {
        return $this->hasOne(Obat::class, ['id' => 'ObatId']);
    }

    /**
     * Gets query for [[Pasien]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::class, ['id' => 'PasienId']);
    }
}
