<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('frontend', 'Pieslēgties');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Yii::t('frontend', 'Aizpildi sekojošos laukus, lai pieslēgtos sistēmai') ?>:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['enableClientValidation'=>false]); ?>
                <?= $form->field($model, 'username')->label("Lietotājvārds") ?>
                <?= $form->field($model, 'password')->passwordInput()->label("Parole") ?>
                <?= $form->field($model, 'atcerēties')->checkbox() ?>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('frontend', 'Ielagoties'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
