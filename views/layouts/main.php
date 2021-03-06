<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100" style="background: #ADA996;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-light bg-light navbar-expand-md',
            'style' => 'color: #000000;
            background: #ADA996;
            background: -webkit-linear-gradient(to right, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996);
            background: linear-gradient(to right, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996);'
        ],
    ]);
    $navItem = [
        ['label' => 'Inicio', 'url' => ['/site/index']],
        ['label' => 'Anden', 'url' => ['/anden'], 'visible'=>!Yii::$app->user->isGuest],
        ['label' => 'Bus', 'url' => ['/bus'], 'visible'=>!Yii::$app->user->isGuest],
        ['label' => 'Chofer', 'url' => ['/chofer'], 'visible'=>!Yii::$app->user->isGuest],
        ['label' => 'Multas', 'url' => ['/multas'], 'visible'=>!Yii::$app->user->isGuest],
        ['label' => 'Supervisor', 'url' => ['/supervisor'], 'visible'=>!Yii::$app->user->isGuest],
        ['label' => 'Viaje', 'url' => ['/viaje'], 'visible'=>!Yii::$app->user->isGuest],

    ];
        if(Yii::$app->user->isGuest){
            array_push($navItem, ['label' => 'Login', 'url' => ['/site/login']],['label' => 'Register', 'url' => ['/site/register']]);
         }else{
            array_push($navItem ,'<li>'. Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline']) . Html::submitButton( 'Logout (' . Yii::$app->user->identity->username . ')',['class' => 'btn btn-link logout','style'=>'color: #000000']). Html::endForm(). '</li>');
            }
        
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $navItem
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted" style="background: #ADA996;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
    <div class="container">
        <p class="float-left">&copy; OfGhetto Dev <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
