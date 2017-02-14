<?php
/**
 * Created by PhpStorm.
 * User: lidia
 * Date: 07/02/17
 * Time: 16:40
 */
use yii\helpers\Html;
 ?>

<p> You have entered the following information:</p>

<ui>
    <li><label>Title</label></li>: <?= Html::encode($model->title)?></ui></li>
    <li><label>Abstruct</label></li>: <?= Html::encode($model->abstract)?></li>
    <li><label>Text</label></li>: <?= Html::encode($model->text)?></ui></li>

</ui>

