<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ViajeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="viaje-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'destino') ?>

    <?= $form->field($model, 'hora_salida') ?>

    <?= $form->field($model, 'duracion_viaje') ?>

    <?= $form->field($model, 'bus_id') ?>

    <?php // echo $form->field($model, 'hora_llegada') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
