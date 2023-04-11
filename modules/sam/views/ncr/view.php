<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
// use kartik\detail\DetailView;
use dosamigos\gallery\Gallery;

//
use app\modules\sam\models\NcrStatus;
use app\modules\sam\models\Department;
use app\models\Uploads;

/* @var $this yii\web\View */
/* @var $model app\models\PhotoLibrary */

$this->title = $model->event_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'NCR'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ncr-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a(Yii::t('app', 'Home'), ['index'], ['class' => 'btn btn-dark']) ?>
        <div class="float-right">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="card">
        <div class="card-header bg-secondary">
            <b style="color:white"><?= ' เลขที่ : '. Html::encode($this->title) ?></b>
        </div>
        <div class="card-body">
            <?= DetailView::widget([
                'model' => $model,
                'template'=>'<tr><th style="width:250px">{label}</th><td>{value}</td></tr>',
                'attributes' => [
                    
                    // 'status',
                    'event_name',
                    [
                        'attribute' => 'status',
                        'format' => 'html',
                        'value' => function ($model) {
                            return '<b><span style="color:' . $model->ncrStatus0->color . ';">' . $model->ncrStatus0->status_name . '</span></b>';
                        },
                    ],
                    'created_at:date',
                    // 'to_department',
                    [
                        'attribute'=>'to_department',
                        'value'=>function($model){
                            return $model->todepartmentName;
                        }
                      ],

                    // 'problem',
                    [
                        'attribute'=>'problem',
                        'value'=>function($model){
                            return $model->problemName;
                        }
                      ],
                    'lot',
                    'production_date',
                    'product_name',
                    'customer_name',
                    'detail:ntext',
                    
                    // 'from_department',
                    [
                        'attribute' => 'from_department',
                        'format' => 'html',
                        'value' => function ($model) {
                            return $model->fromDepartment0->details;
                        },
                    ],
                    'notify_by',
                    'proplem_date:date',
                    'recheck',
                    [
                        'attribute' => 'images',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Gallery::widget(['items' => $model->getThumbnails($model->ref, $model->event_name)]);
                        },
                    ],

                    // 'updated_at:date',
                    // 'customer_mobile_phone',
                    // 'location',
                    // 'start_date:date',
                    // 'end_date:date',
                ],
            ]) ?>
            <div class="card-footer">
                <!-- <div class="panel panel-dark">
                    <div class="panel-body">
                        <?= Gallery::widget(['items' => $model->getThumbnails($model->ref, $model->event_name)]); ?>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

</div>