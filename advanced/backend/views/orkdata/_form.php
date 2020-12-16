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

    <?= $form->field($model, 'instrument')->radioList($items, ['class' => 'yolo'])->label('Izvēlies instrumentu') ?>

    <?= $form->field($model, 'participation')->widget(DatePicker::className(),['dateFormat' => 'yyyy-MM-dd', 'options' => ['readonly' => true], 'clientOptions' => [ 'changeMonth' => true, 'changeYear' => true, 'yearRange' => '1980:'.date('Y'), 'maxDate' => '+0d']])->label('Uzsākšanas datums: ')?>

    <?= $form->field($model, 'user_id')->hiddenInput()->label(false); ?>

    <p><b>Lietotājs:</b><p>

    <?= Html::DropDownList('Lietotāji', 'formo', $names) ?>
    <p></p>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
