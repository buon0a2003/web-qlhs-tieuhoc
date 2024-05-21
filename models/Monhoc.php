<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "monhoc".
 *
 * @property int $idmonhoc
 * @property string $tenmon
 *
 * @property Chitietdiem[] $chitietdiems
 * @property Giaovien[] $giaoviens
 */
class Monhoc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'monhoc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idmonhoc', 'tenmon'], 'required'],
            [['idmonhoc'], 'integer'],
            [['tenmon'], 'string', 'max' => 50],
            [['idmonhoc'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idmonhoc' => 'Idmonhoc',
            'tenmon' => 'Tenmon',
        ];
    }

    /**
     * Gets query for [[Chitietdiems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChitietdiems()
    {
        return $this->hasMany(Chitietdiem::class, ['mamon' => 'idmonhoc']);
    }

    /**
     * Gets query for [[Giaoviens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGiaoviens()
    {
        return $this->hasMany(Giaovien::class, ['mamon' => 'idmonhoc']);
    }
}
