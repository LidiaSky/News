<?php
/**
 * Created by PhpStorm.
 * User: lidia
 * Date: 20/02/17
 * Time: 17:03
 */

namespace app\models;


class News_section extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'news_section';
    }
    public function  rules() {
        return [
            //[['name','title','abstruct','text'],'required'],
            [
                ['news_id', 'section_id'],
                'trim'
            ]

        ];
    }

}