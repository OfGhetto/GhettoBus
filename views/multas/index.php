<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MultasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Multas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="multas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Multas', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Grafico de multas', ['grafico'], ['class' => 'btn btn-info']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'valor',
            'fecha',
            [
                'header'=>"Nombre Chofer",
                'value' =>function($model){
                    return $model->chofer->nombre;
                }
            ],
            [
                'header'=>"Nombre Supervisor",
                'value' =>function($model){
                    return $model->supervisor->nombre;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
