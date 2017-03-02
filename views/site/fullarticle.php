<?php
/**
 * Created by PhpStorm.
 * User: lidia
 * Date: 02/03/17
 * Time: 16:48
 */
/**
 * Created by PhpStorm.
 * User: lidia
 * Date: 08/02/17
 * Time: 16:40
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Section;

$this->title = 'Читать полностью';
?>

<div class="row">
    <div class="col-xs-9"></div>
    <div class="col-xs-4">
//ВЫВОД ДЕРЕВА КАТЕГОРИЙ
        <?php foreach ($sectionview as $view):  ?>

            <?php if ($view->level ==1):?>
                <h3><a href=""> <?=Html::encode("{$view->title}")?><br/></a></h3>
            <?php else : ?>
                <?php if ($view->level ==2):?>
                    <h4><a href=""> ---- <?=Html::encode("{$view->title}")?><br/> </a></h4>
                <?php else :?>
                    <a href=""> ---------- <?=Html::encode("{$view->title}")?><br/> </a>
                <?php endif; ?>
            <?php endif; ?>


        <?php endforeach; ?>
        <br/><br/>
        <?= Html::a('Добавить новость', ['site/entry'], ['class'=>'btn btn-primary']) ?> <br/>
        <?= Html::a('Добавить секцию', ['section/index'], ['class'=>'btn btn-primary']) ?> <br/>



    </div>
    <div class="col-xs-6">

        <br class="jumbotron">
        <h1 class = "mainheader">Содержание новости</h1>

            <div class = "story_content">







        <?= LinkPager::widget(['pagination'=>$pagination]) ?>


    </div>
</div>

