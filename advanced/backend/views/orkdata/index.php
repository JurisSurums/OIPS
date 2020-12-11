<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instrumentu piešķiršana lietotājam';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orkdata-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Piešķirt instrumentu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'label' => 'Instruments',
                'attribute' => 'instrument',
                'format' => 'text',
            ],
            [
                'label' => 'Reģistrācijas datums',
                'attribute' => 'participation',
                'format' => 'text',
            ],
            //'user_id',
            [
                'label' => Yii::t('backend', 'Lietotājs'),
                'value' => 'user.username'
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}'],
        ],
    ]); ?>


</div>
