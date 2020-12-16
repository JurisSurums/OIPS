<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Lietotāji');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Izveidot lietotāju'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'label' => 'Lietotājvārds',
                'attribute' => 'username',
                'format' => 'text',
            ],
            [
                'label' => 'Epasts',
                'attribute' => 'email',
                'format' => 'text',
            ],
            [
                'label' => 'Loma',
                'attribute' => 'role',
                'format' => 'text',
            ],
            [
                'label' => 'Statuss',
                'attribute' => 'status',
                'format' => 'text',
            ],
            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view}'
            ],
        ],
    ]) ?>

</div>
