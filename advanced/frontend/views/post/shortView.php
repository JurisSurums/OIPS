<?php
use common\models\TagPost; // TagPost model
use yii\helpers\Html;

/* @var $model common\models\Post */
/* @var TagPost $postTag */
?>

<h1><b><?= Html::a($model->title, ['post/view', 'id' => $model->id]) ?></b></h1>

<div class="meta">
    <p><?= Yii::t('frontend', 'Autors') ?>: <?= $model->author->username ?>
        <br>
        <?= Yii::t('frontend', 'Izveides datums') ?>:
        <?= $model->publish_date ?>
        <br>
        <?= Yii::t('frontend', 'Kategorija') ?>:
        <?= Html::a($model->category->title, ['category/view', 'id' => $model->category->id]) ?></p>
</div>
<div class="content">
    <i><?= $model->anons ?></i>
</div>
<div class="tags">
    <?php
    $tags = [];
    foreach($model->getTagPost()->all() as $postTag) {
        $tag = $postTag->getTag()->one();
        if ($postTag["tag_id"] != NULL)
        {
        $tags[] = Html::a($tag->title, ['tag/view', 'id' => $tag->id]);
        }
    }
    ?>
    <?= Yii::t('frontend', 'Tagi') ?>: <?= implode($tags, ', ') ?>
</div>
