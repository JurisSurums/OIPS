<?php

use common\models\Comment;
use yii\helpers\Html;

/* @var $model common\models\Post */
/* @var \frontend\models\CommentForm $commentForm \;
/* @var TagPost $post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><b><?= $model->title ?></b></h1>
    <div class="meta">
    <p><?= Yii::t('frontend', 'Author')?>:
        <?= $model->author->username ?>
    <p></p>
        <?= Yii::t('frontend', 'Publish date')?>:
        <?= $model->publish_date ?>
    <p></p>
        <?= Yii::t('frontend', 'Category') ?>:
        <?= Html::a($model->category->title, ['category/view', 'id' => $model->category->id]) ?>
    <p></p>
    <div class="tags">
        <?php
        $tags = [];
        foreach($model->getTagPost()->all() as $postTag) {
            $tag = $postTag->getTag()->one();
            if($tag != null)
            {
                $tags[] = Html::a($tag->title, ['tag/view', 'id' => $tag->id]);
            }
        }?>
        <?= Yii::t('frontend', 'Tags') ?>: <?= implode($tags, ', ') ?>
    </div>
</div>
<hr>
<b>
<div>
    <?= $model->content ?>
</div>
</b>
<hr class="commentHr">
<h1>Komentāri</h1>
<div class="comments">
    <?php /** @var Comment $comment */ ?>
    <?php foreach($model->getPublishedComments()->models as $comment) : ?>
        <div class="comment">
            <h3><?= htmlspecialchars($comment->title) ?></h3>
            <div class="meta"><?= Yii::t('frontend', 'Author') ?>: <strong><?=isset($comment->author) ? $comment->author->username : null?></strong></div>
            <div><?= htmlspecialchars($comment->content) ?></div>
        </div>
    <?php endforeach; ?>
</div>
<br>
<?= $this->render('../comment/_form', [
    'model' => $commentForm
]) ?>
