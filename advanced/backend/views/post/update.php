<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $authors yii\db\ActiveRecord[] */
/* @var $tags yii\db\ActiveRecord[] */
/* @var $category yii\db\ActiveRecord[] */

$this->title = Yii::t('backend', 'Rediģēt Postu:') . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Posti'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="post-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category' => $category,
        'tags' => $tags,
        'authors' => $authors
    ]) ?>

</div>
