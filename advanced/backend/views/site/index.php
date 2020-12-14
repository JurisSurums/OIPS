<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

?>
<div class="site-index">

    <div class="body-content">
        <div class="backendVirsraksts">
        <h3><?= Yii::t('backend', 'OIPS admin') ?></h3>
        </div>
        <ul class="list-group">
            <li class="list-group-item"><a href="<?= Url::toRoute('post/index'); ?>"><?= 'Posti' ?></a></li>
            <li class="list-group-item"><a href="<?= Url::toRoute('category/index'); ?>"><?= 'Kategorijas' ?></a></li>
            <li class="list-group-item"><a href="<?= Url::toRoute('tags/index'); ?>"><?= 'Tagi' ?></a></li>
            <li class="list-group-item"><a href="<?= Url::toRoute('comment/index'); ?>"><?= 'Komentāri' ?></a></li>
            <li class="list-group-item"><a href="<?= Url::toRoute('user/index'); ?>"><?= 'Lietotāji' ?></a></li>
            <li class="list-group-item"><a href="<?= Url::toRoute('pdf/begin'); ?>"><?= 'Ielādēt vai dzēst notis' ?></a></li>
            <li class="list-group-item"><a href="<?= Url::toRoute('skand/upload'); ?>"><?= 'Pievienot vai dzēst skaņdarbu' ?></a></li>
            <li class="list-group-item"><a href="<?= Url::toRoute('mail/upload'); ?>"><?= 'Nosūtīt epastu visiem lietotājiem' ?></a></li>
            <li class="list-group-item"><a href="<?= Url::toRoute('orkdata/index'); ?>"><?= 'Dalībnieku instrumenti' ?></a></li>
        </ul>
    </div>
</div>
