<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Orkdata */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orkdata-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'instrument')->radioList($items, ['class' => 'yolo']) ?>

    <?= $form->field($model, 'participation')->widget(DatePicker::className(),['dateFormat' => 'yyyy-MM-dd', 'options' => ['readonly' => true], 'clientOptions' => [ 'changeMonth' => true, 'changeYear' => true, 'yearRange' => '1980:'.date('Y'), 'maxDate' => '+0d']])?>

    <?= $form->field($model, 'user_id')->hiddenInput()->label(false); ?>

    <?= Html::DropDownList('namo', 'formo', $names) ?>
    <p></p>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
