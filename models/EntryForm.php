<?php
/**
 * Created by PhpStorm.
 * User: lidia
 * Date: 07/02/17
 * Time: 15:57
 */
namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model {
    //public $name;
    public $title;
    public $abstract;
    public $text;

    public function  rules() {
        return [
            //[['name','title','abstruct','text'],'required'],
            [
                ['text', 'title', 'abstract'],
                'trim'
            ]

            ];
    }

}