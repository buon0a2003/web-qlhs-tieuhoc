<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "thongke".
 *
 * @property string|null $xepLoai
 * @property int $soluong
 * @property string|null $tile
 */
class Thongke extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'thongke';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['soluong'], 'integer'],
            [['xepLoai'], 'string', 'max' => 10],
            [['tile'], 'string', 'max' => 26],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'xepLoai' => 'Xếp loại',
            'soluong' => 'Số lượng',
            'tile' => 'Tỉ lệ',
        ];
    }
}
