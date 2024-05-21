<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chitietdiem".
 *
 * @property int $id_chitietdiem
 * @property int|null $mamon
 * @property int|null $mahocsinh
 * @property int $diem_giua_ki1
 * @property int $diem_ki1
 * @property int $diem_giua_ki2
 * @property int $diem_ki2
 * @property string|null $ghichu
 *
 * @property Hocsinh $mahocsinh0
 * @property Monhoc $mamon0
 */
class Chitietdiem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chitietdiem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mamon', 'mahocsinh', 'diem_giua_ki1', 'diem_ki1', 'diem_giua_ki2', 'diem_ki2'], 'integer'],
            [['diem_giua_ki1', 'diem_ki1', 'diem_giua_ki2', 'diem_ki2'], 'required'],
            [['ghichu'], 'string', 'max' => 100],
            [['mamon'], 'exist', 'skipOnError' => true, 'targetClass' => Monhoc::class, 'targetAttribute' => ['mamon' => 'idmonhoc']],
            [['mahocsinh'], 'exist', 'skipOnError' => true, 'targetClass' => Hocsinh::class, 'targetAttribute' => ['mahocsinh' => 'hsid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_chitietdiem' => 'Mã phiếu điểm',
            'mamon' => 'Mã môn',
            'mahocsinh' => 'Mã học sinh',
            'diem_giua_ki1' => 'Điểm giữa kì I',
            'diem_ki1' => 'Điểm kì I',
            'diem_giua_ki2' => 'Điểm giữa kì II',
            'diem_ki2' => 'Điểm kì II',
            'ghichu' => 'Ghi chú',
        ];
    }

    /**
     * Gets query for [[Mahocsinh0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMahocsinh0()
    {
        return $this->hasOne(Hocsinh::class, ['hsid' => 'mahocsinh']);
    }

    /**
     * Gets query for [[Mamon0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMamon0()
    {
        return $this->hasOne(Monhoc::class, ['idmonhoc' => 'mamon']);
    }

    public function getTenhocsinh() 
    {
        return $this->hasOne(Hocsinh::class, ['hsid' => 'mahocsinh']);
    }
}
