<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Multas */

$this->title = "Fecha: ".$model->fecha." Rut: ".$model->chofer->rut;
$this->params['breadcrumbs'][] = ['label' => 'Multas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="multas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea eliminar la multa?',
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
