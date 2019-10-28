<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\db\TelebotChat */

$this->title = 'Create Telebot Chat';
$this->params['breadcrumbs'][] = ['label' => 'Telebot Chats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telebot-chat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
