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


        ;


        //Вывод по страницам с сортировкой LIFO
        //изменить запрос на join
       /* $newsquery = $query->orderBy(['(id)' => SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit); */
       //запрос join
        /*$newsquery = $query->select ('*')
            ->from('news')
            ->Join('LEFT OUTER JOIN','images','news.image_id=images.id')

                //->leftJoin('images','news.image_id=images.id')
            ->offset($pagination->offset)
                ->limit($pagination->limit); */


        // если задана категория, то выполняем запрос с JOIN
        if ($categoryId !== NULL) {
           // $news->where

        }
        $pagination = new Pagination ([
            'defaultPageSize' => 3,
            'totalCount' => $query->count(),

        ]);

        //сортировка по id
        $query->orderBy(['(id)' => SORT_DESC])
        ->with('images')
        ->offset($pagination->offset)
        ->limit($pagination->limit);
        $news = $query->all();
       // var_dump($news[0]->images->filename);
      // die();
           // $newsId = $query->from('news')
            //->where(['id' => 9])->one();






        $query =Section::find();
        $sections = $query->orderBy('name')
            ->all();
        $query = Section::find();
        $sectionview = $query->select(['title','id','nlevel(path) as level'])
            ->orderby('path')
            ->all();


        return $this->render('index',[
            //'newsId' => $newsId,
            'news' => $news,
            'pagination'=>$pagination,
            'sections'=> $sections,
            'sectionview'=>$sectionview
        ]);
    }

    public function actionView($id)
    {
        $news = News::find()->where(["id" => $id])->one();
        $model = new Section();
        $query =Section::find();
        $sections = $query->orderBy('name')
            ->all();
        $query = Section::find();
        $sectionview = $query->select(['title','id','nlevel(path) as level'])
            ->orderby('path')
            ->all();




        return $this->render('view',['news'=>$news,'sections'=> $sections,'model'=> $model,'sectionview'=>$sectionview]);


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
    public function actionOnesection($id){

        $query = Section::find();
        $oneSectionNews = $query->select(['title','id','nlevel(path) as level'])
            ->orderby('path')
            ->all();

        //Запрос в БД
        //SELECT * FROM news ns INNER JOIN  (SELECT * FROM news_section WHERE section_id = 25) sec ON ns.id = sec.news_id;
        SELECT * from news AS n JOIN news_section as ns ON (n.id = ns.news_id) where ns.section_id = 25 ;
        return $this->render('onesection',['news'=>$oneSectionNews]);

    }
}