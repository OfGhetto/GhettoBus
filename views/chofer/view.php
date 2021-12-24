<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Chofer */

$this->title = "Rut: ".$model->rut;
$this->params['breadcrumbs'][] = ['label' => 'Chofers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="chofer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea eliminar este chofer?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'nombre',
            'apellido',
            'rut',
            [
                'attribute'=>'bus_id',
                'label'=>"Patente Bus",
                'value' =>function($model){
                    return $model->bus->patente;
                }
            ],
        ],
    ]) ?>

</div>
