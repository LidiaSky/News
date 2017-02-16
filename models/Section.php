<?php
/**
 * Created by PhpStorm.
 * User: lidia
 * Date: 07/02/17
 * Time: 12:45
 */

namespace app\models;

use \yii\db\ActiveRecord;

class Section extends \yii\db\ActiveRecord
{
    /*public $name;
    public $title;
    public $abstract;
    public $text;*/
    public static function tableName()
    {
        return 'section';
    }


    public function  rules() {
        return [
            //[['name','title','abstruct','text'],'required'],
            [
                ['path','title','name','description'],
                'trim'
            ]

        ];
    }

}