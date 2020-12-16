<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Orkdata */

$this->title = 'Piešķirt lietotājam instrumentu';
$this->params['breadcrumbs'][] = ['label' => 'Lietotāju instrumenti', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orkdata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'names' => $names,
        'items' => $items
    ]) ?>

</div>
