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
                <td></td>
                <th>Line Name</th>
                <th>Description</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Edit</th>
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
                            <td><?= Html::img($item->image, ['class'=>'thumbnails']) ?></td>
                            <td><?=Html::a($item->name, 'javascript:void(0)', ['data-toggle'=>'modal', 'data-target'=>'#stationLine-'.$item->id])  ?></td>
                            <td><?= $item->description ?></td>
                            <td><?= $item->start_time ?></td>
                            <td><?= $item->end_time ?></td>
                            <td>
                                <?=Html::a('<span class="glyphicon glyphicon-eye-open"></span>',['line/preview', 'id'=>$item->id] ) ?>
                                <?=Html::a('<span class="glyphicon glyphicon-edit"></span>', ['line/edit', 'id'=>$item->id]) ?>
                                <?=Html::a('<span class="glyphicon glyphicon-remove"></span>',['line/delete', 'id'=>$item->id], ['class' => 'deleteObject']) ?>
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
        <?php
            foreach($listStation as $item){
                $line = $item["line"];
                $stations = $item["stations"];
                ?>
                <div class="modal fade" id="stationLine-<?=$line->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Bến xe</h4>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Station Name</th>
                                            <th>Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                            $count = 1;
                                            foreach($stations as $item){
                                                ?>
                                                <tr>
                                                    <th scope="row"><?= $count ?></th>
                                                    <td><?= $item->name ?></td>
                                                    <td><?= $item->description ?></td>
                                                </tr>
                                                <?php
                                                $count++;
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="6">
                                                <?=Html::a('<span class="glyphicon glyphicon-plus"></span> Create new',['station/create/'.$line->id], ['class' => 'btn btn-success pull-right']) ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</div>
