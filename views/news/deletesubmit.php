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

$this->title = Html::encode("{$news-> title}");
?>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-2">
            <?php foreach ($sectionview as $view): ///news/index/15 ?>

                <?php if ($view->level ==1):?>
                    <?= Html::a(Html::encode("{$view->title}"), ['section/'.$view->id]) ?><br>

                <?php else : ?>
                    <?php if ($view->level ==2):?>
                        <?= Html::a("------".Html::encode("{$view->title}"), ['section/'.$view->id]) ?><br>
                    <?php else :?>
                        <?= Html::a("----------".Html::encode("{$view->title}"), ['section/'.$view->id]) ?><br>
                    <?php endif; ?>
                <?php endif; ?>


            <?php endforeach; ?>
        </div>
        <div class="col-md-10">
            <h1>Вы действительно хотите удалить данную статью: </h1>
            <h2><?=Html::encode("{$news->title}") ?></h2>
            <h3><?=Html::encode("{$news->abstract}") ?></h3>
            <h4> <?=Html::encode("{$news->text}") ?></h4>
            <?= Html::a('Удалить статью', ['delete/'.$news->id], ['class'=>'btn btn-primary']) ?> <br/>
            <?= Html::a('На главную', ['news/index'], ['class'=>'btn btn-primary']) ?>



            <br class="jumbotron">


            <div class = "story_content">


            </div>
        </div>
    </div>











