<?php
/**
 * Created by PhpStorm.
 * User: lidia
 * Date: 27/02/17
 * Time: 11:23
 */

namespace app\models;


use Codeception\Lib\Interfaces\ActiveRecord;

class Images extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'images';
    }


    public function  rules() {
        return [

            [
                ['filename', 'mimetype', 'filesize'],
                'trim'
            ]

        ];
    }

}

