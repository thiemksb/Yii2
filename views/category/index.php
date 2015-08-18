<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <h2>Category management</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên </th>
				<th>Ảnh</th>
                <th>Mô Tả</th>
                <th>Thời gian</th>
                <th></th>
				
				
            </tr>
            </thead>
            <tbody>
            <?php
                if(count($lst) > 0){
                    $count = 1;
                    foreach($lst as $item){
                        ?>
                        <tr>
                            <th scope="row"><?= $count ?></th>
                            <td><?=Html::a($item->name,['news/index','id'=>$item->id]) ?></td>
                            <td><?=Html::img($item->image,['class'=>'thumbnails'])?></td>
							
                            <td><?= $item->des ?></td>
                            <td><?= $item->created_date?></td>
                            <td>
                                <?=Html::a('<span class="glyphicon glyphicon-edit"></span>', ['category/edit', 'id'=>$item->id]) ?>
                                <?=Html::a('<span class="glyphicon glyphicon-remove"></span>',['category/delete', 'id'=>$item->id], ['class' => 'deleteObject']) ?>
                            </td>
                        </tr>
                        <?php
                        $count++;
                    }
                }
            ?>
            <tr>
                <td colspan="6">
                    <?=Html::a('<span class="glyphicon glyphicon-plus"></span> Create new',['category/create'], ['class' => 'btn btn-success pull-right']) ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
