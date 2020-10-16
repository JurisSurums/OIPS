<?php

/* @var $this yii\web\View */
$this->title = 'pdf upload';
?>
<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\base\model;
?>
<h1>Uploaded pdf file succesfully</h1>

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
<button>Submit</button>

<?php ActiveForm::end() ?>
