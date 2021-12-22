<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Multas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Multas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="multas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'valor',
            'fecha',
            [
                'attribute'=>'chofer_id',
                'label'=>"Nombre Chofer",
                'value' =>function($model){
                    return $model->chofer->nombre;
                }
            ],
            [
                'attribute'=>'supervisor_id',
                'label'=>"Supervisor",
                'value' =>function($model){
                    return $model->supervisor->nombre;
                }
            ],  
        ],
    ]) ?>

</div>
