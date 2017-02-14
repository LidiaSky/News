<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>Добавление новости </h1>
<?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model,'title')->textInput()->label('Введите заголовок новости:'); ?>
    <?= $form->field($model,'abstract')->label('Введите кратокое содержание новости:'); ?>
    <?= $form->field($model,'text')->label('Введите текст новости:'); ?>

<div class="form-group">
    <?= Html::submitButton('Отправить',['class'=>'btn bth-primary']) ?>

</div>
<?php ActiveForm::end(); ?>

