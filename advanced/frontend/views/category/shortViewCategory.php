<?php

/* @var $model common\models\Category */
?>
<li class="allCategories"><?= \yii\helpers\Html::a($model->title, ['category/view', 'id' => $model->id])?></li>