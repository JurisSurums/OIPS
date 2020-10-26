<?php

/* @var $this yii\web\View */
$this->title = 'pdf ielāde';
?>
<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\base\model;
use yii\helpers\Url;

?>
<h1>PDF fails tika veiksmīgi pievinots</h1>
<br>
<p1>Pievienotās notis šobrīd ir pieejamas orķestra dalībniekam.</p1>
<br>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<?= Html::hiddenInput('namo', $namo) ?>
<br>
<?= Html::a(Yii::t('backend', 'Pievienot vel notis šim skaņdarbam'), ['upload'], [
    'data' => [
        'method' => 'post',
    ],
]) ?>
<br>
<br>
<?= Html::a(Yii::t('backend', 'Pievienot notis citam skaņdarbam'), [''], [
    'data' => [
        'method' => 'post',
    ],
]) ?>
<br>
<br>
<?= Html::a(Yii::t('backend', 'Pievienot jaunu skaņdarbu'), ['skand/upload'], [
    'data' => [
        'method' => 'post',
    ],
]) ?>
<?php ActiveForm::end() ?>
