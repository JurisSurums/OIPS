<?php

/* @var $this yii\web\View */
$this->title = 'Izdzēst skandarbu';
?>
<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\base\model;
use yii\helpers\Url;

?>
    <h1>Izvēlies, kuru skaņdarbu dzēst</h1>

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
<?= Html::a(Yii::t('backend', 'Dzēst skaņdarbu'), ['delete'], [
    'class' => 'btn btn-danger',
    'data' => [
        'confirm' => Yii::t('backend', 'Vai tiešām vēlaties dzēst skaņdarbu?'),
        'method' => 'post',
    ],
]) ?>

<?php ActiveForm::end() ?>