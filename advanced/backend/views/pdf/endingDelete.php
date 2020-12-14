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
<h1>PDF faili zem šī instrumenta un skaņdarba ir dzēsti</h1>
<br>
<p1>Pievienotās notis šobrīd ir pieejamas orķestra dalībniekam.</p1>
<br>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<?= Html::hiddenInput('namo', $namo) ?>
<br>
<?= Html::a(Yii::t('backend', 'Pievienot jaunas notis šim skaņdarbam'), ['upload'], [
    'data' => [
        'method' => 'post',
    ],
]) ?>
<br>
<br>
<?= Html::a(Yii::t('backend', 'Pievienot notis citam skaņdarbam'), ['sucess'], [
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
