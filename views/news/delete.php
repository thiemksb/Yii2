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
		<p>Viết ngày: <?=$post_news->time;?></p>
		<p><?=Html::img($post_news->img,['class'=>'thumbnails'])?></p>
		<h2><?=Html::a($post_news->title,['detail/view','idp'=>$post_news->id]) ?></h2>
		<p><?= $post_news->content?></p>
		<p>Tác giả: <?=$post_news->author;?></p>
		<h2><?=Html::a('Delete',['detail/delete','idp'=>$post_news->id]) ?></h2>
		</div>
		<?php
		}
		?>
   
</div>
