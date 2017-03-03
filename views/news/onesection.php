<?php
/**
 * Created by PhpStorm.
 * User: lidia
 * Date: 03/03/17
 * Time: 16:15
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Section; ?>

<div class="row">
    <div class="col-xs-9"></div>
    <div class="col-xs-4">
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
<div class="col-xs-6">




    <div class="form-group">
        <?php
        foreach ($newsOfTheSection as $newsOfSection): ?>



        <?php $imagePath = '/images/thumb_'.$newsOfSection->images->id.".".$newsOfSection->images->mimetype;
        ?>




        <div class = "news_item">

            <a class="picturelink" href="http://basic.lydia.ns.local/news/index">
                <?= Html::img($imagePath, ['alt'=>'some', 'class'=>'thing']);?>
            </a>


        </div>
        <div class = "story_content">
            <?php
            $date = substr($newsOfSection->created,0,16);
            ?>
            <h5><?=Html::encode("{$date}") ?></h5>
            <h4><a href=""><?=Html::encode("{$newsOfSection-> title}") ?></a></h4>
            <h5><?=Html::encode("{$newsOfSection->abstract}") ?></h5>


            <?= Html::a('Читать полностью', ['news/'.$newsOfSection->id], ['class'=>'btn btn-primary']) ?> <br/>
        </div>

        <?php endforeach; ?>

        <?= Html::submitButton('Отправить',['class'=>'btn bth-primary']) ?>
        <?= Html::a('На главную', ['news/index'], ['class'=>'btn btn-primary']) ?> <br/>

    </div>


</div>
</div>





