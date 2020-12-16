<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Komentāri'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Rediģēt'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Dzēst'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Vai tiešām vēlaties dzēst šo komentāru?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Virsraksts',
                'attribute' => 'title',
            ],
            [
                'label' => 'Saturs',
                'attribute' => 'content',
            ],
            [
                'label' => 'Publikācijas statuss',
                'attribute' => 'publish_status',
            ],
            [
                'label' => 'Posta ID',
                'attribute' => 'post.id',
            ],
            [
                'label' => 'Autors',
                'attribute' => 'author.username',
            ],
        ],
    ]) ?>

</div>
