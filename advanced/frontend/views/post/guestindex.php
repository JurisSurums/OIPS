<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $posts yii\data\ActiveDataProvider */
/* @var $categories yii\data\ActiveDataProvider */
/* @var $post common\models\Post */

//LANDING FOR UNREGISTERED
// Sākuma lapai jānomaina Home
// 'label' => Yii::t('yii', 'Sākums'), => yii2/widgets/Breadcrumbs.php
$this->title = Yii::t('frontend', 'Orķestra Informācijas Pārvaldības Sistēma');
?>
<div class="col-sm-8 post-index">
    <div>
        <?= LinkPager::widget([
            'pagination' => $posts->getPagination()
        ]) ?>
    </div>
</div>
<div class="started">
    <hr>
    <h1><?= Html::encode($this->title) ?></h1>
    <hr>
<?php echo Html::img('@web/images/home.jpg', [
        'alt' => 'pic not found',
        'width' => '1000px',
        'height' => '500px']) ?>
</div>