<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = Yii::t('frontend', 'Par OIPS');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Orķestra pārvaldības informācijas sistēma (OIPS) ir platforma, kurā orķestra dalībnieki un
        administratori </p>
    <p> var ērti un viegli veikt sekojošās funkcionalitātes:</p>
    <br>
    <ul>
        <li <i class="fas fa-user-shield"></i>  Administratori</li>
        <br>
        <br>
        <ul>
            <li>Veikt CRUD operācijas ar Kategrorijām</li>
            <li>Veikt CRUD operācijas ar Postiem</li>
            <li>Veikt CRUD operācijas ar Komentāriem</li>
            <li>Izsūtīt epastu visiem lietotājiem</li>
            <li>Pievienot skaņdarbu ar visiem instrumentiem</li>
            <li>Pievienot notis</li>
        </ul>
        <br>
        <li <i class="fas fa-user"></i>  Lietotāji</li>
        <br>
        <br>
        <ul>
            <li>Apskatīt notis pēc skaņdarba un instrumenta</li>
            <li>Reģistrēties un pieslēgties</li>
            <li>Apskatīt postus un kategorijas</li>
            <li>Meklēt pēc kategorijas vai taga</li>
            <li>Pievienot komentārus</li>
            <li>Saņemt paziņojumu epastu</li>
        </ul>
    </ul>
</div>
