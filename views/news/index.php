<?php
/**
 * Created by PhpStorm.
 * User: lidia
 * Date: 08/02/17
 * Time: 16:40
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'NEWS';
?>
<br class="jumbotron">
    <h1>Новости</h1>

    <p class="lead">Российские и мировые новости.</p>

<ul>
<?php



foreach ($news as $newsitem): ?>
    <li>
        <?=Html::encode("{$newsitem-> title}, {$newsitem->abstract}, 
        {$newsitem-> text}") ?>:

    </li>

    <?php endforeach; ?>

</ul>

    <?= Html::a('Добавить новость', ['site/entry'], ['class'=>'btn btn-primary']) ?> <br/>
    <?= Html::a('Добавить секцию', ['site/addsection'], ['class'=>'btn btn-primary']) ?> <br/>
<?= LinkPager::widget(['pagination'=>$pagination]) ?>
