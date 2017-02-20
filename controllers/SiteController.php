<?php

namespace app\controllers;

use app\models\News_section;
use app\models\Section;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\News;
use app\models\EntryForm;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    //my first action ...
    public function actionSay($message = 'Hello')
    {
        return $this->render('say', ['message' => $message]);
    }

    public function actionNews($id = null)
    {
        /*$news = News::find()->where(['id' => $id])->all();
        print_r($news);
        $posts = Yii::$app->db->createCommand('SELECT abstract FROM news')
            ->queryAll();
        print_r($posts);
        $post1 = Yii::$app->db->createCommand('SELECT * FROM news WHERE id=2');
        print_r($post1);
        $post = Yii::$app->db->createCommand('SELECT * FROM news WHERE name=:name')
            ->bindValue('id:',1)

            ->queryOne();*/
        $news_item = new News();

        $news_item->name = 'news3';
        $news_item->abstract = 'abstract_abstract';
        $news_item->text = 'text_text_text';
        $news_item->save();

        /* if we have an EntryForm object populated with the data entered by the user you may call its validate ()
        to trigger the data validation routines.
        $model = new EntryForm();
        $model-> name='Lidia';
        $model->email='bad';
        if ($model -> validate()) {
        //Good!
        } else {
        //Failure!
        }
        */
    }

    //здесь выводим дерево слева,
    // выводим форму для добавления логики
    // вся логика для одного view должна содержаться в одном методе контроллера
    //так как каждый метод контроллера - это отдельная страница
    public function actionEntry()
    {



        $query =Section::find();
        $sections = $query->orderBy('name')
            ->all();
        $query = Section::find();
        $sectionview = $query->select(['title','id','nlevel(path) as level'])
            ->orderby('path')
            ->all();
        $modelForm = new EntryForm();

        if (!Yii::$app->request->isPost)
            return $this->render('entry', ['model' => $modelForm,'sections' => $sections, 'sectionview' => $sectionview]);

        $modelForm->load(Yii::$app->request->post(), 'EntryForm');

        if ($modelForm->validate()) {
            $news = new News();
            $news->load(Yii::$app->request->post(), 'EntryForm');
            //var_dump($news);
            //exit();


            if ($news->save()) {

                $newssection = new News_section();
                $newssection->news_id = $news->id;
                $newssection->section_id = Yii::$app->getRequest()->getBodyParam('sectionid');
                $newssection->save();
                // well done. redirect
                return $this->render('entry', ['model' => $modelForm,'news' => $news, 'sections' => $sections, 'sectionview' => $sectionview]);

            } else {
                // show save error
            }
            return $this->render('entry', ['model' => $modelForm, 'sections' => $sections, 'sectionview' => $sectionview]);
        } else {
            // show form validation error
            //either the page is initially displayed or there is some validation error
            return $this->render('entry', ['model' => $modelForm, 'sections' => $sections, 'sectionview' => $sectionview]);
        }
    }

    public function actionSection()
    {
        $model = new Section();
        if (!Yii::$app->request->isPost)
            return $this->render('addsection', ['model' => $model]);

        if ($model->validate()) {
            $section = new Section();
            $section->load(Yii::$app->request->post(), 'Section');
            if ($section->save()) {
                // well done. redirect
                return $this->render('sectaddsuccess', ['section' => $section]);

            } else {
                // show save error
            }
            return $this->render('entry-confirm', ['model' => $model]);

        }

    }
}













