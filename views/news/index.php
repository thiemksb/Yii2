<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">
	<div>
	<h1>News</h1>
	<table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Thể loại</th>
                <th>Image</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php
                    $count = 1;
                    foreach($model as $item){
                        ?>
                        <tr>
                            <th scope="row"><?= $count ?></th>
                            <td><?=Html::a($item->title,['news/view','id'=>$item->id] ) ?></td>
                            <td><?=$item->des ?></td>
                            <td><?=$item->cat->name ?></td>
                            <td><?= Html::img($item->img, ['class'=>'thumbnails']) ?></td>
                            <td>
                                <?=Html::a('<span class="glyphicon glyphicon-edit"></span>', ['news/edit', 'id'=>$item->id]) ?>
                                <?=Html::a('<span class="glyphicon glyphicon-remove"></span>',['news/delete', 'id'=>$item->id], ['class' => 'deleteObject']) ?>
                            </td>
                        </tr>
                        <?php
                        $count++;
                    }
            ?>
            <tr>
                <td colspan="7">
                    <?=Html::a('<span class="glyphicon glyphicon-plus"></span> Create news',['news/create'], ['class' => 'btn btn-success pull-right']) ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>