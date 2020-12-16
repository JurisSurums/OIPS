<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Lietotāji'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Rediģēt'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
            $role = $model->getRole($model->id);
        ?>
        <?php if ($role == 10): ?>
            <?= Html::a(Yii::t('backend', 'Dzēst'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('backend', 'Vai tiešām vēlaties dzēst šo lietotāju?'),
                    'method' => 'USER',
                ],
            ]) ?>
        <?php else: ?>
    <li class="text-danger">Administratoru nevar izdzēst</li>
    <?php endif; ?>


    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'lietotājvārds',
                'attribute' => 'username',
            ],
            [
                'label' => 'epasts',
                'attribute' => 'email:email',
            ],
            [
                'label' => 'loma',
                'attribute' => 'role',
            ],
            [
                'label' => 'statuss',
                'attribute' => 'status',
            ],
            [
                'label' => 'Izveides datums',
                'attribute' => 'created_at',
            ],
            [
                'label' => 'Rediģēšanas datums',
                'attribute' => 'updated_at',
            ],
        ],
    ]) ?>

</div>
