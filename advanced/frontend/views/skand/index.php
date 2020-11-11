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
<h1>Izvēlies skaņdarbu</h1>

<?php
$prefix = './uploads/';
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
<?= Html::tag('p', "", ['class' => 'username']) ?>

<?php foreach ($allFiles as $resourceMember): ?>
    <p></p>
    <?= Html::a(Yii::t('backend', $resourceMember), ['select', 'id' => $resourceMember],
        [
            'data' => [
            'method' => 'post' ],
        ]);

    ?>
<?php endforeach; ?>

<?php ActiveForm::end() ?>

