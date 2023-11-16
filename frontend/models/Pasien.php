<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $id
 * @property string $nama
 * @property int $wilayah_id
 *
 * @property Wilayah $wilayah
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'wilayah_id'], 'required'],
            [['wilayah_id'], 'integer'],
            [['nama'], 'string', 'max' => 255],
            [['wilayah_id'], 'exist', 'skipOnError' => true, 'targetClass' => Wilayah::class, 'targetAttribute' => ['wilayah_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'wilayah_id' => 'Wilayah ID',
        ];
    }

    /**
     * Gets query for [[Wilayah]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWilayah()
    {
        return $this->hasOne(Wilayah::class, ['id' => 'wilayah_id']);
    }
}
