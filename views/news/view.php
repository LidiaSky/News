<?php
/**
 * Created by PhpStorm.
 * User: lidia
 * Date: 02/03/17
 * Time: 17:08
 */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Section;

$this->title = 'Читать полностью';
?>

<div class="row">
    <div class="col-xs-9"></div>
    <div class="col-xs-4">
    </div>
    <div class="col-xs-6">

        <br class="jumbotron">
        <h1 class = "mainheader">Содержание новости</h1>

        <div class = "story_content">
            <?php print_r($news) ?>
        </div>
    </div>

