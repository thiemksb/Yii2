<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <h2>Verhicle management</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên xe</th>
				<th>Công ty</th>
				<th>Biển số</th>
				<th>Người lái</th>
				<th>Tên đường</th>
				<th>Ảnh</th>
            </tr>
            </thead>
            <tbody>
            <?php
                if(count($listvir) > 0){
                    $count = 1;
                    foreach($listvir as $item){
                        ?>
                        <tr>
                            <th scope="row"><?= $count ?></th>
                            <td><?=$item->name ?></td>
							<td><?=$item->company->name ?></td>
							<td><?=$item->vehicleType->name ?></td>
							<td><?=$item->user->username ?></td>
							<td><?=$item->line->name ?></td>
							
							
                            <td><?=Html::img($item->image,['class'=>'thumbnails'])?></td>
	
                            <td>
                                <?=Html::a('<span class="glyphicon glyphicon-eye-open"></span>',['vehicle//preview', 'id'=>$item->id] ) ?>
                                <?=Html::a('<span class="glyphicon glyphicon-edit"></span>', ['vehicle/edit', 'id'=>$item->id]) ?>
                                <?=Html::a('<span class="glyphicon glyphicon-remove"></span>',['vehicle/delete', 'id'=>$item->id], ['class' => 'deleteObject']) ?>
                            </td>
                        </tr>
                        <?php
                        $count++;
                    }
                }
            ?>
            <tr>
                <td colspan="6">
                    <?=Html::a('<span class="glyphicon glyphicon-plus"></span> Create new',['vehicle/create'], ['class' => 'btn btn-success pull-right']) ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
