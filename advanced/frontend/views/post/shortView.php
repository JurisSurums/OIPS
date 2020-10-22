<?php
use common\models\TagPost; // TagPost model
use yii\helpers\Html;

/* @var $model common\models\Post */
/* @var TagPost $postTag */
?>

<h1><b><?= $model->title ?></b></h1>

<div class="meta">
    <p><?= Yii::t('frontend', 'Author') ?>: <?= $model->author->username ?>
        <br>
        <?= Yii::t('frontend', 'Publish date') ?>:
        <?= $model->publish_date ?>
        <br>
        <?= Yii::t('frontend', 'Category') ?>:
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
        $tags[] = Html::a($tag->title, ['tag/view', 'id' => $tag->id]);
    } ?>
    <?= Yii::t('frontend', 'Tags') ?>: <?= implode($tags, ', ') ?>
</div>

<?= Html::a('Apskatīt postu', ['post/view', 'id' => $model->id], ['class' => 'btn btn-success pull-right']) ?>
