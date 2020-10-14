<?php

/* @var $this yii\web\View */
$this->title = 'pdf upload';
?>
    <h1>Upload pdf file</h1>

<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\base\model;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'pdfFile')->fileInput(['multiple'=>'multiple']); ?>

<?php
    $prefix = 'uploads/';
    $dirnum = 0;
    foreach ($allFiles as $filo)
    {
        if (substr($filo, 0, strlen($prefix)) == $prefix) {
            $allFiles[$dirnum] = substr($filo, strlen($prefix));
        }
        $dirnum = $dirnum + 1;
    }
?>

<?= Html::DropDownList('namo', 'formo', $allFiles) ?>

<button>Submit</button>

<?php ActiveForm::end() ?>
