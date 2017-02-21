<?php
namespace app\controllers;

use app\models\Section;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\News;
use app\models\EntryForm;

/**
 * Created by PhpStorm.
 * User: lidia
 * Date: 14/02/17
 * Time: 17:32
 */
class SectionController extends Controller
{
    public function actionIndex()
    {



        if (Yii::$app->request->isPost) {
            //добавление новой секции в БД
            $newsectioninput = new Section();
            $newsectioninput->load(Yii::$app->request->post(), 'Section');
            //var_dump($newsectioninput);
            //exit();
            /*$newsectionToInsert = new Section();
            $newsectionToInsert->name = $newsectioninput->name;
            $newsectionToInsert->title = $newsectioninput->title;
            $newsectionToInsert->description = $newsectioninput->description;
            //добавить добавление path*/
            $pid = Yii::$app->getRequest()->getBodyParam('parentsectionid');
            $parenElement = Section::findOne($pid);
            $newsectioninput->path = $parenElement->path.'.'.$newsectioninput->name;
            $newsectioninput->pid = $pid;
            //var_dump($newsectioninput->getAttributes());
            //exit();
            $newsectioninput->save();
        }

        $model = new Section();
        $query =Section::find();
        $sections = $query->orderBy('name')
            ->all();
        $query = Section::find();
        $sectionview = $query->select(['title','id','nlevel(path) as level','pid'])
            ->orderby('path')
            ->all();







        return $this->render('index',[
            'sections'=> $sections,'model'=> $model,'sectionview'=>$sectionview
        ]);
    }
}