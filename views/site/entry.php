<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>Добавление новости </h1>
<?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model,'title'); ?>
    <?= $form->field($model,'abstract'); ?>
    <?= $form->field($model,'text'); ?>

<div class="form-group">
    <?= Html::submitButton('Submit',['class'=>'btn bth-primary']) ?>

</div>
<?php ActiveForm::end(); ?>

