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
use yii\widgets\ActiveForm;

$this->title = Html::encode("{$news-> title}");
?>

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
            <div class="col-xs-6">
                <h1>Редактирование новости </h1>
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


                <?= $form->field($model,'title') ->textarea(['value' => $news->title])->label('Отредактировать заголовок новости:'); ?>
                <?= $form->field($model,'abstract')->textarea(['value' => $news->abstract])->label('Отредактировать краткое содержание новости:'); ?>
                <?= $form->field($model,'text')->textarea(['value' => $news->text])->label('Отредактировать текст новости:'); ?>


                <!---->
                <!---->
                <!---->
                <?php //ActiveForm::end() ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить',['class'=>'btn bth-primary']) ?>
                    <?= Html::a('На главную', ['news/index'], ['class'=>'btn btn-primary']) ?> <br/>

                </div>


            </div>
        </div>




        <?php ActiveForm::end(); ?>

