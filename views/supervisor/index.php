<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SupervisorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Supervisors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supervisor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Supervisor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'apellido',
            'rut',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
