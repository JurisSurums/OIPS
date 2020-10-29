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
<h1>Izvēlies skaņdarbuu</h1>

<?php
$dirnum = 0;

foreach ($allFiles as $filo)
{
    if (substr($filo, 0, strlen($selected)) == $selected) {
        $allFiles[$dirnum] = substr($filo, strlen($selected));
    }
    $dirnum = $dirnum + 1;
}
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<?= Html::DropDownList('namo', 'formo', $allFiles) ?>
<?= Html::tag('p', "", ['class' => 'username']) ?>
<?= Html::hiddenInput('dire', $selected) ?>
<?= Html::a(Yii::t('backend', 'Izvēlies failu'), ['download'], [
    'class' => 'btn btn-success',
    'data' => [
        'method' => 'post',
    ],
]) ?>

<?php ActiveForm::end() ?>

