<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Tag */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tagi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tags-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Rediģēt', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?php echo Html::a(Yii::t('backend', 'Dzēst'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Vai tiešā vēlaties dzēst tagu?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Nosaukums',
                'attribute' => 'title',
            ],
        ],
    ]) ?>

</div>
