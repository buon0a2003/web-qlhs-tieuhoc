<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_hs_tongket_tb".
 *
 * @property int $hsid
 * @property string $tenhs
 * @property float|null $tienganhTB
 * @property float|null $tiengvietTB
 * @property float|null $toanTB
 * @property float|null $Tongket
 * @property string|null $xepLoai
 */
class ViewHsTongketTb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'view_hs_tongket_tb';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hsid', 'tenhs'], 'required'],
            [['hsid'], 'integer'],
            [['tienganhTB', 'tiengvietTB', 'toanTB', 'Tongket'], 'number'],
            [['tenhs'], 'string', 'max' => 50],
            [['xepLoai'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'hsid' => 'Mã học sinh',
            'tenhs' => 'Tên học sinh',
            'tienganhTB' => 'Tiếng anh',
            'tiengvietTB' => 'Tiếng việt',
            'toanTB' => 'Toán',
            'Tongket' => 'Tổng kết',
            'xepLoai' => 'Xếp loại',
        ];
    }
}
