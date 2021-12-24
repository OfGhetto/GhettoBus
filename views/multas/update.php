<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Multas */

$this->title = "Editar multa con fecha: ".$model->fecha." y Rut de chofer: ".$model->chofer->rut;
$this->params['breadcrumbs'][] = ['label' => 'Multas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="multas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
