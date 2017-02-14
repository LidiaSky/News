
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
    <h1>Добавление новой секции</h1>

<?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model,'sectionName')->label('Введите имя для новой секции:'); ?>


    <div class="form-group">
        <?= Html::submitButton('Submit',['class'=>'btn bth-primary']) ?>

    </div>
<?php ActiveForm::end(); ?>