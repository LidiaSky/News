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
use app\models\EntryForm;
use app\models\UploadForm;
use app\models\News_image;
use app\models\News_section;

use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;

use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

use app\models\Images;



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

    public function actionEdit($id)
    {
        //to output previous news data
        $news = News::find()->where(["id" => $id])->one();
        $model = new Section();
        $query =Section::find();
        $sections = $query->orderBy('name')
            ->all();
        $query = Section::find();
        $sectionview = $query->select(['title','id','nlevel(path) as level'])
            ->orderby('path')
            ->all();
        $query = Section::find();
        $sections = $query->orderBy('name')
            ->all();
        $query = Section::find();
        $sectionview = $query->select(['title', 'id', 'nlevel(path) as level'])
            ->orderby('path')
            ->all();
        //imput form with filled fields
        $modelForm = new EntryForm();
        // картинка

        $modelUpload = new UploadForm();






        if (!Yii::$app->request->isPost)
            return $this->render('edit', ['model' => $modelForm, 'sections' => $sections, 'sectionview' => $sectionview,'modelUpload' => $modelUpload,'news'=>$news ]);

        $modelForm->load(Yii::$app->request->post(), 'EntryForm');

        if ($modelForm->validate()) {

            //var_dump($news);
            //exit();

                // file is uploaded successfully
                //добавление в таблицу images
                //if ($modelUpload != NULL) {
                $news = new News();
                $news->load(Yii::$app->request->post(), 'EntryForm');
                //$news->save();
                $newsupdate = News::findOne($id);
                $newsupdate->title = $news->title;
                $newsupdate->abstract = $news->abstract;
                $newsupdate->text = $news->text;
                $newsupdate->update();
                return $this->render('edit', ['model' => $modelForm, 'news' => $news, 'sections' => $sections, 'sectionview' => $sectionview, 'modelUpload' => $modelUpload]);





            return $this->render('edit', ['model' => $modelForm, 'sections' => $sections, 'sectionview' => $sectionview,'modelUpload' => $modelUpload]);
        } else {
            // show form validation error
            //either the page is initially displayed or there is some validation error
            return $this->render('edit', ['model' => $modelForm, 'sections' => $sections, 'sectionview' => $sectionview,'modelUpload' => $modelUpload]);
        }





        return $this->render('edit',['news'=>$news,'sections'=> $sections,'model'=> $model,'sectionview'=>$sectionview]);


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
        //вывод дерева слева
        $model = new Section();
        $query =Section::find();
        $sections = $query->orderBy('name')
            ->all();
        $query = Section::find();
        $sectionview = $query->select(['title','id','nlevel(path) as level'])
            ->orderby('path')
            ->all();


        $query = News::find();
        //сортировка по id
        $query->orderBy(['id' => SORT_DESC])
            ->innerJoinWith('sections')
            ->where(['news_section.section_id'=> $id  ]);

        $newsOfTheSection = $query->all();


        return $this->render('onesection',['newsOfTheSection'=>$newsOfTheSection,'sectionview'=>$sectionview,]);

    }
}