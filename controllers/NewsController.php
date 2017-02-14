<?php
/**
 * Created by PhpStorm.
 * User: lidia
 * Date: 08/02/17
 * Time: 16:22
 */
namespace app\controllers;

use app\models\News;
use yii\data\Pagination;
use yii\web\Controller;



class NewsController extends Controller
{
    public function actionIndex()
    {
        $query = News::find();
        $pagination = new Pagination ([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),

        ]);
        $news = $query-> orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $newsId = $query->where(['id' => 9])->one();
        return $this->render('index',[
            'newsId' => $newsId,
            'news' => $news,
            'pagination'=>$pagination]);
    }
}