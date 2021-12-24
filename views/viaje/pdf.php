<?php 

use  yii\helpers\Html;
use yii\grid\GridView;

$this -> params['breadcrumbs'][] = $this->title;
?>
<link rel = "stylesheet" href="<?= Yii::$app->request->baseUrl.'/css/pdf.css'?>">
<div>

    <h2>Informe de viajes</h2>
    <div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Destino</th>
            <th>Hora de salida</th>
            <th>Duracion</th>
            <th>Patente</th>
            <th>Hora de llegada</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach($dataProvider ->getModels() as $model){?>    
                <tr>
                    <th><?= $model ->destino ?></th>
                    <th><?= $model ->hora_salida ?></th>
                    <th><?= $model ->duracion_viaje ?></th>
                    <th><?= $model ->bus -> patente ?></th>
                    <th><?= $model ->hora_llegada ?></th>
            <?php }?>
        <tbody>
    </table>
</div>   
    <hr>

    <div class="timesdate">
        <?php echo date("Y-m-d");?>
    </div>
</div>