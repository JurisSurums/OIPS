<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Orkdata */

$this->title = 'Create Orkdata';
$this->params['breadcrumbs'][] = ['label' => 'Orkdatas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orkdata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'names' => $names
    ]) ?>

</div>
