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

<?php
$dirnum = 0;
$prefix = $prefix . '/';
foreach ($allFiles as $filo)
{
    if (substr($filo, 0, strlen($prefix)) == $prefix) {
        $allFiles[$dirnum] = substr($filo, strlen($prefix));
    }
    $dirnum = $dirnum + 1;
}
$dirnum = 0;
foreach ($fullOnes as $filo)
{
    if (substr($filo, 0, strlen($prefix)) == $prefix) {
        $fullOnes[$dirnum] = substr($filo, strlen($prefix));
    }
    $dirnum = $dirnum + 1;
}
/*var_dump($fullOnes);
exit();*/
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'pdfFile[]')->fileInput(['multiple' => true]); ?>

<?= Html::DropDownList('namo', 'formo', $allFiles) ?>
<?= Html::hiddenInput('dire', $prefix) ?>
<?= Html::a(Yii::t('backend', 'Pievienot notis'), ['final'], [
    'class' => 'btn btn-success',
    'data' => [
        'method' => 'post',
    ],
]) ?>
<?php ActiveForm::end() ?>
<hr>
    <div class="col-sm-7 post-index">
        <h2>Instrumenti ar notīm</h2>
        <p></p>
        <br>
        <?= html::ul($fullOnes) ?>
    </div>

<div class="col-sm-4 col-sm-offset-1 blog-sidebar">
    <h2>Instrumenti bez notīm</h2>
    <p></p>
    <br>
    <?php
    $filteredFoo = array();
    $filteredFoo = array_diff($allFiles, $fullOnes);
    ?>
    <?=
    html::ul($filteredFoo) ?>
</div>


