<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
    <h1>Добавление новой секции</h1>
    <h2>Существующие секции</h2>
<select class="custom-select">
<?php foreach ($sections as $section): ?>

    <option ><?=Html::encode("{$section->path}")?></option>


    <?php endforeach; ?>
</select>









<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model,'path')->label('Выберите в какой раздел вставить новую секцию'); ?>
<?= $form->field($model,'title')->label('Введите имя для новой секции на русском:'); ?>
<?= $form->field($model,'name')->label('Введите имя для новой секции на английском:'); ?>


<?= $form->field($model,'description')->label('Введите описание для новой секции:'); ?>
    <div class="form-group">
        <?= Html::submitButton('Добавить',['class'=>'btn bth-primary']) ?>

    </div>
<?php ActiveForm::end(); ?>