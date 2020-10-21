<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Orkdata */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orkdata-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'instrument')->textInput() ?>

    <?= $form->field($model, 'participation')->textInput() ?>

    <?= $form->field($model, 'user_id')->hiddenInput()->label(false); ?>

    <?= Html::DropDownList('namo', 'formo', $names) ?>
    <p></p>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
