<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">
		<?php foreach ($model as $post_news){
		?>
		<div class=news>
		
		<p><?=Html::img($post_news->img,['class'=>'thumbnails'])?></p>
		<h2><?=$post_news->title?></h2>
		<p><?= $post_news->content?></p>
		<p>Tác giả: <?=$post_news->author;?></p>
		<p>Viết ngày: <?=$post_news->time;?></p>
		</div>
		<?php
		}
		?>
   
</div>
