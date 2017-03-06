<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
        <h1>Добавление новости </h1>
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <label>
            Выберите в какой раздел вставить новость
        </label>

        <select class="form-control" name="sectionid">

            <?php foreach ($sections as $section): ?>

                <option value = "<?=$section->id ?>"><?=Html::encode("{$section->path}")?></option>


            <?php endforeach; ?>
        </select>
        <?= $form->field($model,'title')->textInput()->label('Введите заголовок новости:'); ?>
        <?= $form->field($model,'abstract')->label('Введите краткое содержание новости:'); ?>
        <?= $form->field($model,'text')->textarea()->label('Введите текст новости:'); ?>
        <?= $form->field($modelUpload, 'imageFile')->fileInput()->label("Прикрепить изображение"); ?>

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

