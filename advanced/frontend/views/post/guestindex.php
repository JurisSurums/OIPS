<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $posts yii\data\ActiveDataProvider */
/* @var $categories yii\data\ActiveDataProvider */
/* @var $post common\models\Post */

//LANDING FOR UNREGISTERED
$this->title = Yii::t('frontend', 'Orķestra Informācijas Pārvaldības Sistēma');
?>
<div class="col-sm-8 post-index">
    <div>
        <?= LinkPager::widget([
            'pagination' => $posts->getPagination()
        ]) ?>
    </div>
</div>
    <h1><?= Html::encode($this->title) ?></h1>

<p>asdasd</p>