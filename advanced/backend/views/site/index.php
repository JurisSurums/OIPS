<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

?>
<div class="site-index">

    <div class="body-content">
        <div class="backendVirsraksts">
        <h3><?= Yii::t('backend', 'OIPS backend') ?></h3>
        </div>
        <ul class="list-group">
            <li class="list-group-item"><a href="<?= Url::toRoute('post/index'); ?>"><?= 'Posts' ?></a></li>
            <li class="list-group-item"><a href="<?= Url::toRoute('category/index'); ?>"><?= 'Categories' ?></a></li>
            <li class="list-group-item"><a href="<?= Url::toRoute('tags/index'); ?>"><?= 'Tags' ?></a></li>
            <li class="list-group-item"><a href="<?= Url::toRoute('comment/index'); ?>"><?= 'Comments' ?></a></li>
            <li class="list-group-item"><a href="<?= Url::toRoute('user/index'); ?>"><?= 'Users' ?></a></li>
            <li class="list-group-item"><a href="<?= Url::toRoute('pdf/upload'); ?>"><?= 'Ielādēt notis' ?></a></li>
        </ul>

    </div>
</div>
