<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Posti');
$this->params['breadcrumbs'][] = $this->title; //navigational line
//postu skats
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Izveidot Postu'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // four de translation
            'id',
            [
                'label' => 'Nosaukums',
                'attribute' => 'title',
                'format' => 'text',
            ],
            [
                'label' => 'Saturs',
                'attribute' => 'anons',
                'format' => 'text',
            ],
            [
                'label' => Yii::t('backend', 'Kategorija'),
                'value' => 'category.title',
                'format' => 'text',
            ],
            [
                'label' => Yii::t('backend', 'Autors'),
                'value' => 'author.username',
                'format' => 'text',
            ],
            [
                'label' => 'Publikācijas statuss',
                'attribute' => 'publish_status',
                'format' => 'text',
            ],
            [
                'label' => 'Publikācijas datums',
                'attribute' => 'publish_date',
                'format' => 'text',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>

</div>
