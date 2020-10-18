<?php

/* @var $this yii\web\View */
$this->title = 'pdf upload';
?>
    <h1>Compose and send an email</h1>

<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\base\model;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<?= $form->field($model, 'temats')->textInput() ?>
<?= $form->field($model, 'saturs')->textarea(['rows' => '6']) ?>
<button>Sūtīt epastu</button>

<?php ActiveForm::end() ?>
