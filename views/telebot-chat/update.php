<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\db\TelebotChat */

$this->title = 'Update Telebot Chat: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Telebot Chats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="telebot-chat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
