<?php

/* @var $this yii\web\View */
$this->title = 'pdf upload';
?>
    <h1>Pievieno jaunu skaņdarbu</h1>

<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\base\model;
?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'name_field')->textInput() ?>
<?= $form->field($model, 'description')->textarea(['rows' => '6']) ?>
<button>Pievienot</button>
<?php ActiveForm::end(); ?>
