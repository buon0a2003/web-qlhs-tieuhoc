<?php
namespace app\assets\thuvien;

use app\models\User;
use Yii;

class Encrypt {

    public static function encrypt($data)
    {
        $str = $data;
        $hashedString = md5($str);
        return $hashedString;
    }
}

?>