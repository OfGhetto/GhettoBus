<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Anden */

$this->title = 'Create Anden';
$this->params['breadcrumbs'][] = ['label' => 'Andens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anden-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
