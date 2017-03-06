<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="row">
    <div class="col-xs-9">



    </div>
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
        <h1>Добавление новой секции</h1>
        <br/>

        <label>
            Выберите в какой раздел вставить новую секцию
        </label>

        <?php $form = ActiveForm::begin(); ?>
        <select class="form-control" name="parentsectionid">
            <?php foreach ($sections as $section): ?>

                <option value="<?= $section->id ?>"><?=Html::encode("{$section->path}")?></option>




            <?php endforeach; ?>

        </select>
        <!--//$form->field($model,'path')->label('Выберите в какой раздел вставить новую секцию'); -->
        <?= $form->field($model,'title')->label('Введите имя для новой секции на русском:'); ?>
        <?= $form->field($model,'name')->label('Введите имя для новой секции на английском:'); ?>


        <?= $form->field($model,'description')->label('Введите описание для новой секции:'); ?>
        <div class="form-group">
            <?= Html::submitButton('Добавить',['class'=>'btn bth-primary']) ?>
            <?= Html::a('На главную', ['news/index'], ['class'=>'btn btn-primary']) ?> <br/>

        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>







































