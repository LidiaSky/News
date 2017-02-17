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