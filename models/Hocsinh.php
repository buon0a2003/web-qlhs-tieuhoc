<?php

namespace app\models;

use app\models\searchs\LopSearch;
use Yii;

/**
 * This is the model class for table "hocsinh".
 *
 * @property int $hsid
 * @property string $tenhs
 * @property string|null $gioitinh
 * @property string $ngaysinh
 * @property string $sdtbome
 * @property string $diachi
 * @property int $malop
 * @property string|null $ghichu
 *
 * @property Chitietdiem[] $chitietdiems
 * @property Lop $malop0
 */
class Hocsinh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hocsinh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hsid', 'tenhs', 'ngaysinh', 'sdtbome', 'diachi', 'malop'], 'required'],
            [['hsid', 'malop'], 'integer'],
            [['gioitinh'], 'string'],
            [['ngaysinh'], 'safe'],
            [['tenhs', 'sdtbome', 'diachi', 'ghichu'], 'string', 'max' => 50],
            [['hsid'], 'unique'],
            [['malop'], 'exist', 'skipOnError' => true, 'targetClass' => Lop::class, 'targetAttribute' => ['malop' => 'lopid']],
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
            'sdtbome' => 'sđt phụ huynh',
            'diachi' => 'Địa chỉ',
            'malop' => 'Lớp',
            'ghichu' => 'Ghi chú',
        ];
    }

    /**
     * Gets query for [[Chitietdiems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChitietdiems()
    {
        return $this->hasMany(Chitietdiem::class, ['mahocsinh' => 'hsid']);
    }

    /**
     * Gets query for [[Malop0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMalop0()
    {
        return $this->hasOne(Lop::class, ['lopid' => 'malop']);
    }

    public function getLop()
    {
        return $this->hasOne(Lop::class, ['lopid' => 'malop']);
    }

}
