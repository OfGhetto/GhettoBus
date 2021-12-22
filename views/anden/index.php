<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AndenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Andens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anden-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Anden', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'estado',
            'numero',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
