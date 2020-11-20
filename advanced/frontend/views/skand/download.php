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
<hr>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<?php $count = 0; ?>
<?php foreach ($allInstruments as $instrument): ?>
    <p></p>
    <h2><?= html::encode($instrument) ?></h2>
    <?php foreach ($locations[$count] as $f): ?>
        <p></p>
        <?php
        $remove = "./uploads"."/".$skand."/".$instrument."/";
        $temp = str_replace($remove, "", $f);
        ?>

        <?=
        Html::a(Yii::t('backend', $temp), ['download', 'id' => $skand."/".$instrument."/".$temp],
            [
                'data' => [
                    'method' => 'post' ],
            ]);
        ?>
    <?php endforeach; ?>
    <?php $count++; ?>
<?php endforeach; ?>

<?php ActiveForm::end() ?>

