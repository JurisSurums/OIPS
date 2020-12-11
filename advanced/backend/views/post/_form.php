<?php

use common\models\Post;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
/* @var $authors yii\db\ActiveRecord[] */
/* @var $category yii\db\ActiveRecord[] */
/* @var $tags yii\db\ActiveRecord[] */
?>
<!--composer require --prefer-dist yiisoft/yii2-jui-->
<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255])->label('Nosaukums') ?>

    <?= $form->field($model, 'category_id')->label('Kategorija')->dropDownList(
        ArrayHelper::map($category, 'id', 'title')
    ) ?>

    <?= $form->field($model, 'author_id')->label('Autors')->dropDownList(
        ArrayHelper::map($authors, 'id', 'username')
    ) ?>

    <?= $form->field($model, 'anons')->textarea(['rows' => 4, 'maxlength' => 500])->label('Īsais apraksts') ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 7, 'maxlength' => 3000])->label('Posta saturs') ?>

    <?= $form->field($model, 'publish_status')->dropDownList(
        [Post::STATUS_DRAFT => Yii::t('backend', 'Draft'), Post::STATUS_PUBLISH => Yii::t('backend', 'Published')]
    )->label('Publikācijas statuss') ?>

    <?= $form->field($model, 'tags')->checkboxList(
        ArrayHelper::map($tags, 'id', 'title')
    )->label('Tagi') ?>

    <?= $form->field($model, 'publish_date')->widget(DatePicker::className(),['dateFormat' => 'yyyy-MM-dd', 'options' => ['readonly' => true], 'clientOptions' => [ 'changeMonth' => true, 'changeYear' => true, 'yearRange' => '1980:'.date('Y'), 'maxDate' => '+0d']])->label('Posta izveides datums: ')?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Izveidot') : Yii::t('backend', 'Rediģēt'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
