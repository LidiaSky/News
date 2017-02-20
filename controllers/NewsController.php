<?php
/**
 * Created by PhpStorm.
 * User: lidia
 * Date: 08/02/17
 * Time: 16:22
 */
namespace app\controllers;

use app\models\News;
use app\models\Section;

use yii\data\Pagination;
use yii\web\Controller;



class NewsController extends Controller
{
    public function actionIndex($categoryId = NULL)
    {
        $query = News::find();
        $pagination = new Pagination ([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),

        ]);
        $newsquery = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit);
        // если задана категория, то выполняем запрос с JOIN
        if ($categoryId !== NULL) {
           // $news->where

        }
        $news = $newsquery->all();
            $newsId = $query->where(['id' => 9])->one();




        $query =Section::find();
        $sections = $query->orderBy('name')
            ->all();
        $query = Section::find();
        $sectionview = $query->select(['title','id','nlevel(path) as level'])
            ->orderby('path')
            ->all();


        return $this->render('index',[
            'newsId' => $newsId,
            'news' => $news,
            'pagination'=>$pagination,
            'sections'=> $sections,
            'sectionview'=>$sectionview
        ]);
    }

    public function actionSections()
    {
        $model = new Section();
        $query =Section::find();
        $sections = $query->orderBy('name')
            ->all();
        $query = Section::find();
        $sectionview = $query->select(['title','id','nlevel(path) as level'])
            ->orderby('path')
            ->all();


        return $this->render('index',[
            'sections'=> $sections,'model'=> $model,'sectionview'=>$sectionview
        ]);
    }
}