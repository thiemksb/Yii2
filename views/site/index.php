<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">



    <div class="body-content">

        <h2>Welcome to LVB Leipzig</h2>
        <p>The largest transport company in Leipzig, LVB (Leipziger VerkehrsBetriebe) translated into English as the “Leipzig Transport Company”, operates the tramway and bus transport services in Leipzig.</p>
        <p>The LVB route network is a part of the regional public transport association and was formed by merger, from January 1917. Public transport in Leipzig is characterized by a dense light-rail system.</p>
        <p>13 tram lines serve a transport area of about 152 kilometers, complemented by more than 30 bus lines in large part being en-route in the suburban area.</p>
        <div class="col-md-10">
            <?= Html::img('@web/assets/images/Routes.svg', ['class'=>'images']);?>
        </div>


    </div>
</div>
