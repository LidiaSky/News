<?php
/**
 * Created by PhpStorm.
 * User: lidia
 * Date: 08/02/17
 * Time: 14:51
 */
namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;

class CountryController extends Controller{
    public function actionIndex()
    {

        $query = Country::find();
        $pagination = new Pagination([
            'defaultPageSize'=>5,
            'totalCount'=> $query->count(),
        ]);
        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination-> limit)
            ->all();

        return $this-> render('index', [
            'countries'=>$countries,
        'pagination'=>$pagination,
    ]);

    }
}