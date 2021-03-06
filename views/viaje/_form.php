<?php

use app\models\Bus;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Viaje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="viaje-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'destino')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hora_salida')->textInput() ?>

    <?= $form->field($model, 'duracion_viaje')->textInput() ?>

    <?= $form->field($model, 'bus_id')->dropdownList(
            ArrayHelper::map(Bus::find()->all(),'id','patente',),
            ['prompt' => 'Seleccione el bus'])->label('Patente del bus') ?>


    <?= $form->field($model, 'hora_llegada')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
