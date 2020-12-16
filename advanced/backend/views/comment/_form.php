<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255])->label('Nosaukums') ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6, 'maxlength' => 3000])->label('Saturs') ?>

    <?= $form->field($model, 'publish_status')->dropDownList([ 'moderate' => Yii::t('backend', 'Moderate'), 'publish' => Yii::t('backend', 'Publish'), ], ['prompt' => ''])->label('Publikācijas statuss') ?>

    <?= $form->field($model, 'post_id')->textInput()->label('Posta ID') ?>

    <?= $form->field($model, 'author_id')->textInput()->label('Autora ID') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Izveidot') : Yii::t('backend', 'Rediģēt'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
