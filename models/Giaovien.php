<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "giaovien".
 *
 * @property int $gvid
 * @property string|null $hotengv
 * @property string $ngay_sinh
 * @property string|null $diachi
 * @property string|null $sdt
 * @property int|null $mamon
 *
 * @property Lop[] $lops
 * @property Monhoc $mamon0
 */
class Giaovien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'giaovien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ngay_sinh'], 'required'],
            [['ngay_sinh'], 'safe'],
            [['mamon'], 'integer'],
            [['hotengv', 'sdt'], 'string', 'max' => 20],
            [['diachi'], 'string', 'max' => 100],
            [['mamon'], 'exist', 'skipOnError' => true, 'targetClass' => Monhoc::class, 'targetAttribute' => ['mamon' => 'idmonhoc']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gvid' => 'Mã Giáo viên',
            'hotengv' => 'Tên giáo viên',
            'ngay_sinh' => 'Ngày sinh',
            'diachi' => 'Địa chỉ',
            'sdt' => 'Số ĐT',
            'mamon' => 'Môn học ',
        ];
    }

    /**
     * Gets query for [[Lops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLops()
    {
        return $this->hasMany(Lop::class, ['id_gvcn' => 'gvid']);
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

    public function getMonhoc(){
        return $this->hasOne(Monhoc::class, ['idmonhoc'=> 'mamon']);
    }
}
