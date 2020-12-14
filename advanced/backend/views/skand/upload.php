<?php
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Skandarbi */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'pdf upload';
?>
    <h1>Pievienot skaņdarbu</h1>
<br>
<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\base\model;
?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'name_field')->textInput() ?>
<?= $form->field($model, 'description')->textarea(['rows' => '6']) ?>

<?= Html::a(Yii::t('frontend', 'Pievienot skaņdarbu'), ['final'], [
    'class' => 'btn btn-success',
    'data' => [
        'method' => 'post',
    ],
]) ?>
<?php ActiveForm::end(); ?>
<hr>
    <h1>Dzēst skaņdarbu</h1>
<br>
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