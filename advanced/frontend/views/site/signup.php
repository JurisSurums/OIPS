<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = Yii::t('frontend', 'Reģistrējies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Yii::t('frontend', 'Aizpildi sekojošos laukus, lai reģistrētos') ?>:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username')->label('Lietotājvārds') ?>
                <?= $form->field($model, 'email')->label('Epasts'); ?>
                <?= $form->field($model, 'password')->passwordInput()->label('Parole') ?>
                <div class="form-group">
                    <?= Html::submitButton('Reģistrēties', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
