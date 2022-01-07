<?php

use app\models\Chofer;
use app\models\Supervisor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Multas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="multas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'valor')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'chofer_id')->dropdownList(
            ArrayHelper::map(Chofer::find()->all(),'id','rut',
            function($model) {
                return $model['nombre'].' '.$model['apellido'];
            }),
            ['prompt' => 'Seleccione el chofer'])->label('Rut del chofer') ?>

    <?= $form->field($model, 'supervisor_id')->dropdownList(
            ArrayHelper::map(Supervisor::find()->all(),'id','rut',
            function($model) {
                return $model['nombre'].' '.$model['apellido'];
            }),
            ['prompt' => 'Seleccione el supervisor'])->label('Rut del supervisor') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
