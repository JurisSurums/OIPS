<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Orkdata */

$this->title = $model->instrument;
$this->params['breadcrumbs'][] = ['label' => 'Lietotāja instrumenti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orkdata-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Dzēst', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Vai tiešām vēlaties dzēst šos lietotāja instrumenta datus?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Lieotāja instruments',
                'attribute' => 'instrument',
            ],
            [
                'label' => 'Instrumentu uzsāka spēlēt',
                'attribute' => 'participation',
            ],
            [
                'label' => 'Lietotājs',
                'attribute' => 'user.username',
            ],
        ],
    ]) ?>

</div>
