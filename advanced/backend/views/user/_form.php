<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput()->label('Lietotājvārds') ?>

    <?= $form->field($model, 'email')->textInput()->label('Epasts') ?>

    <?= $form->field($model, 'new_password')->passwordInput()->label('Parole') ?>

    <?= $form->field($model, 'status')->dropDownList([
        User::STATUS_DELETED => Yii::t('backend', 'Inactive'),
        User::STATUS_ACTIVE => Yii::t('backend', 'Active'),
    ])->label('Statuss') ?>

    <?= $form->field($model, 'role')->dropDownList([
        User::ROLE_USER => Yii::t('backend', 'User'),
        User::ROLE_ADMIN => Yii::t('backend', 'Administrator'),
    ])->label('Loma') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Izveidot') : Yii::t('backend', 'Rediģēt'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
