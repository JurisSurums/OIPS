<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Komentāri');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Izveidot komentāru'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'label' => 'Nosaukums',
                'attribute' => 'title',
                'format' => 'text',
            ],
            [
                'label' => 'Saturs',
                'attribute' => 'content',
                'format' => 'text',
            ],
            [
                'label' => 'Publikācijas statuss',
                'attribute' => 'publish_status',
                'format' => 'text',
            ],
            [
                'label' => 'Komentāra posts',
                'attribute' => 'post.title',
                'format' => 'text',
            ],
            [
                'label' => 'Autora ID',
                'attribute' => 'author.username',
                'format' => 'text',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>

</div>
