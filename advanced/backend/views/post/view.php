<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Rediģēt'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Dzēst'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Vai tiešām vēlaties dzēst postu?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
/*    var_dump($model);
    exit();
    */?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Nosaukums',
                'attribute' => 'title',
                'format' => 'text',
            ],
            [
                'label' => 'Zemraksts',
                'attribute' => 'anons',
            ],
            [
                'label' => 'Saturs',
                'attribute' => 'content',
                'format' => 'text',
            ],
            [
                'label' => 'Kategorija',
                'attribute' => 'category.title'
            ],
            [
                'label' => 'Kategorija',
                'attribute' => 'author.username',
            ],
            [
                'label' => 'Publikācijas statuss',
                'attribute' => 'publish_status',
            ],
            [
                'label' => 'Publikācijas datums',
                'attribute' => 'publish_date',
            ],
        ],
    ]) ?>

</div>
