<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pasientindakan".
 *
 * @property int $pasienId
 * @property int $tindakanId
 *
 * @property Pasien $pasien
 * @property Tindakan $tindakan
 */
class Pasientindakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasientindakan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pasienId', 'tindakanId'], 'required'],
            [['pasienId', 'tindakanId'], 'integer'],
            [['pasienId', 'tindakanId'], 'unique', 'targetAttribute' => ['pasienId', 'tindakanId']],
            [['pasienId'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::class, 'targetAttribute' => ['pasienId' => 'id']],
            [['tindakanId'], 'exist', 'skipOnError' => true, 'targetClass' => Tindakan::class, 'targetAttribute' => ['tindakanId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pasienId' => 'Pasien ID',
            'tindakanId' => 'Tindakan ID',
        ];
    }

    /**
     * Gets query for [[Pasien]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::class, ['id' => 'pasienId']);
    }

    /**
     * Gets query for [[Tindakan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class, ['id' => 'tindakanId']);
    }
}
