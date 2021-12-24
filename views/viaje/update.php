<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */

$this->title = 'Actualizar Viaje con fecha: ' . $model->id." destino ".$model->destino." y patente del bus: ".$model->bus->patente;
$this->params['breadcrumbs'][] = ['label' => 'Viajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="viaje-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
