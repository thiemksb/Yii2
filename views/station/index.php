<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <h2>Station management</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên bến xe</th>
				<th>Đường</th>
                <th>Mô Tả</th>
                <th>Ảnh</th>
            </tr>
            </thead>
            <tbody>
            <?php
                if(count($listLine) > 0){
                    $count = 1;
                    foreach($listLine as $item){
                        ?>
                        <tr>
                            <th scope="row"><?= $count ?></th>
                            <td><?= $item->name ?></td>
                            <td><?= $item->line->name ?></td>
							
                            <td><?= $item->description ?></td>
                            <td><?=Html::img($item->image,['class'=>'thumbnails'])?></td>
                            <td>
                                <?=Html::a('<span class="glyphicon glyphicon-eye-open"></span>',['station/preview', 'id'=>$item->id] ) ?>
                                <?=Html::a('<span class="glyphicon glyphicon-edit"></span>', ['station/edit', 'id'=>$item->id]) ?>
                                <?=Html::a('<span class="glyphicon glyphicon-remove"></span>',['station/delete', 'id'=>$item->id], ['class' => 'deleteObject']) ?>
                            </td>
                        </tr>
                        <?php
                        $count++;
                    }
                }
            ?>
            <tr>
                <td colspan="6">
                    <?=Html::a('<span class="glyphicon glyphicon-plus"></span> Create new',['station/create'], ['class' => 'btn btn-success pull-right']) ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
