<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <h2>Line management</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <td>Tên công ty</td>
                <th>Mô tả</th>
                <th>Image</th>
				<th>Image</th>
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
							<td><?= $item->description ?></td>
                            <td><?= Html::img($item->image, ['class'=>'thumbnails']) ?></td>
                            <td>
                                <?=Html::a('<span class="glyphicon glyphicon-eye-open"></span>',['company/preview', 'id'=>$item->id] ) ?>
                                <?=Html::a('<span class="glyphicon glyphicon-edit"></span>', ['company/edit', 'id'=>$item->id]) ?>
                                <?=Html::a('<span class="glyphicon glyphicon-remove"></span>',['company/delete', 'id'=>$item->id], ['class' => 'deleteObject']) ?>
                            </td>
                        </tr>
                        <?php
                        $count++;
                    }
                }
            ?>
            <tr>
                <td colspan="7">
                    <?=Html::a('<span class="glyphicon glyphicon-plus"></span> Create new',['line/create'], ['class' => 'btn btn-success pull-right']) ?>
                </td>
            </tr>
            </tbody>
        </table>
        
    </div>
</div>
