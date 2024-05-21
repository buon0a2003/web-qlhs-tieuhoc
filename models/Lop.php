<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lop".
 *
 * @property int $lopid
 * @property string|null $ten_lop
 * @property int $id_gvcn
 *
 * @property Giaovien $gvcn
 * @property Hocsinh[] $hocsinhs
 */
class Lop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_lop'], 'string', 'max' => 20],
            // [['id_gvcn'], 'exist', 'skipOnError' => true, 'targetClass' => Giaovien::class, 'targetAttribute' => ['id_gvcn' => 'gvid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lopid' => 'Mã lớp',
            'ten_lop' => 'Tên lớp',
            // 'id_gvcn' => 'Id Gvcn',
        ];
    }

    /**
     * Gets query for [[Gvcn]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getGvcn()
    // {
    //     return $this->hasOne(Giaovien::class, ['gvid' => 'id_gvcn']);
    // }

    /**
     * Gets query for [[Hocsinhs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHocsinhs()
    {
        return $this->hasMany(Hocsinh::class, ['malop' => 'lopid']);
    }
}
