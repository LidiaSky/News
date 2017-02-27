<?php
/**
 * Created by PhpStorm.
 * User: lidia
 * Date: 27/02/17
 * Time: 11:56
 */

namespace app\models;


class News_image extends \yii\db\ActiveRecord
{
    public static function tableName() {

        return 'news_image';
    }

    public function rules() {
return [
        [
            ['news_id','image_id'],'trim'
        ]
];
    }

}
