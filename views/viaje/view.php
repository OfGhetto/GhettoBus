<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */

$this->title = 'Actualizar Viaje con destino '.$model->destino." y patente del bus: ".$model->bus->patente;
$this->params['breadcrumbs'][] = ['label' => 'Viajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="viaje-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea eliminar el viaje?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'destino',
            'hora_salida',
            'duracion_viaje',
            [
                'attribute'=>'bus_id',
                'label'=>"Patente Bus",
                'value' =>function($model){
                    return $model->bus->patente;
                }
            ],
            'hora_llegada',
        ],
    ]) ?>

</div>
