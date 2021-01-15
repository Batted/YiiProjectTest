<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    <div>
        <?= $form->field($model, 'name'); ?>
        <?= $form->field($model, 'email'); ?>
        <?= $form->field($model, 'subject'); ?>
        <?= $form->field($model, 'message'); ?>

        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end() ?>