<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Orkdata */

$this->title = 'Rediģēt lietotāju instrumentu: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lietotāju instrumenti', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Rediģēt';
?>
<div class="orkdata-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'names' => $names
    ]) ?>

</div>
