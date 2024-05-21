<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_chitiet_hs_toan".
 *
 * @property int $hsid
 * @property string $tenhs
 * @property string|null $gioitinh
 * @property string $ngaysinh
 * @property int $diem_giua_ki1
 * @property int $diem_ki1
 * @property int $diem_giua_ki2
 * @property int $diem_ki2
 * @property float|null $TB
 * @property string|null $ghichu
 */
class ViewChitietHsToan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'view_chitiet_hs_toan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hsid', 'tenhs', 'ngaysinh', 'diem_giua_ki1', 'diem_ki1', 'diem_giua_ki2', 'diem_ki2'], 'required'],
            [['hsid', 'diem_giua_ki1', 'diem_ki1', 'diem_giua_ki2', 'diem_ki2'], 'integer'],
            [['gioitinh'], 'string'],
            [['ngaysinh'], 'safe'],
            [['TB'], 'number'],
            [['tenhs', 'ghichu'], 'string', 'max' => 50],
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
            'gioitinh' => 'Giới tính',
            'ngaysinh' => 'Ngày sinh',
            'diem_giua_ki1' => 'Điểm giữa kì I',
            'diem_ki1' => 'Điểm kì I',
            'diem_giua_ki2' => 'Điểm giữa kì II',
            'diem_ki2' => 'Điểm kì II',
            'TB' => 'TB',
            'ghichu' => 'Ghichu',
        ];
    }
}
