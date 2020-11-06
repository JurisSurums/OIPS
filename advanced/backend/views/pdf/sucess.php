<?php

/* @var $this yii\web\View */
$this->title = 'pdf upload';
?>
<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\base\model;
use yii\helpers\Url;

?>
<h1>Izvēlies, kuram skaņdarbarm pievienot notis</h1>

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
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<?= Html::DropDownList('namo', 'formo', $allFiles) ?>
<?= Html::tag('p', "", ['class' => 'username']) ?>
<?= Html::a(Yii::t('backend', 'Izvēlēties skaņdarbu'), ['upload'], [
    'class' => 'btn btn-success',
    'data' => [
        'method' => 'post',
    ],
]) ?>
<hr>
<h1>Izvēlies, kuram skaņdarbarm dzēst notis</h1>
<?= Html::DropDownList('namoDel', 'formo', $allFiles) ?>
<?= Html::tag('p', "", ['class' => 'username']) ?>
<?= Html::a(Yii::t('backend', 'Dzēst skaņdarbam notis'), ['deleto'], [
    'class' => 'btn btn-danger',
    'data' => [
        'method' => 'post',
    ],
]) ?>

<?php ActiveForm::end() ?>
