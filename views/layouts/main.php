<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Breadcrumbs;
use app\widgets\Alert;

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerCssFile('@web/css/estilos.css', [
    'depends' => [\yii\bootstrap5\BootstrapAsset::class],
]);
$this->title = Html::encode($this->title);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= Html::encode($this->title) ?> | <?= Html::encode(Yii::$app->name) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => '<span class="brand-text">' . Html::encode(Yii::$app->name) . '</span>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar navbar-expand-md navbar-dark bg-primary shadow-sm fixed-top'],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        'items' => array_filter([
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Acerca de Nosotros', 'url' => ['/site/about']],
            ['label' => 'Contáctanos', 'url' => ['/site/contact']],
            !Yii::$app->user->isGuest ? [
                'label' => 'Gestionar Registro',
                'items' => array_filter([
                    ['label' => 'Persona', 'url' => ['/persona/index']],
                    ['label' => 'Estado', 'url' => ['/estado/index']],
                    ['label' => 'Dirección', 'url' => ['/direccion/index']],
                    ['label' => 'Documento', 'url' => ['/documento/index']],
                    ['label' => 'Contacto', 'url' => ['/contacto/index']],
                    Yii::$app->user->identity->role === 'admin'
                        ? ['label' => 'Usuarios', 'url' => ['/user/index']]
                        : null,
                ]),
                'dropDownOptions' => ['class' => 'dropdown-menu'],
                'options' => ['class' => 'nav-item dropdown'],
                'linkOptions' => [
                    'class' => 'nav-link dropdown-toggle',
                    'data-bs-toggle' => 'dropdown',
                    'role' => 'button',
                    'aria-expanded' => 'false'
                ],
            ] : null,
            Yii::$app->user->isGuest
                ? ['label' => 'Iniciar Sesión', 'url' => ['/site/login']]
                : ['label' => 'Cambiar contraseña', 'url' => ['/user/change-password']],
            !Yii::$app->user->isGuest
                ? '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'd-inline'])
                    . Html::submitButton(
                        'Cerrar Sesión (' . Html::encode(Yii::$app->user->identity->apellido . ' ' . Yii::$app->user->identity->nombre) . ')' . Html::encode(Yii::$app->user->identity->role),
                        ['class' => 'nav-link btn btn-link text-white logout']
                    )
                    . Html::endForm()
                    . '</li>'
                : null,
        ]),
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container mt-5 pt-5">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto bg-dark text-white py-3">
    <div class="container text-center small">
        &copy; <?= date('Y') ?> <?= Html::encode(Yii::$app->name) ?>. Todos los derechos reservados.
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
