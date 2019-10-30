<?php

use app\components\gridView\ActionFilterColumn;
use app\components\gridView\SerialColumn;

use app\models\db\TelebotConfiguration;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use app\components\gridView\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TelebotChatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Telebot Chats';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="telebot-chat-index">

    <div class="row">
        <div class="col-md-4"><?= Html::a('Create Telebot Chat', ['create'], ['class' => 'btn btn-success']) ?></div>
        <div class="col-md-5"></div>
        <div class="col-md-3">
            <?= Html::a('To Telebot', TelebotConfiguration::getTelebotUrl(), ['class' => 'btn btn-primary']) ?>
            <?= Html::button(TelebotConfiguration::getStatus() ? 'Active' : 'Disactive', [
                'class' => ['btn', TelebotConfiguration::getStatus() ? 'btn-success' : 'btn-error', 'web-hook-active'],
                'data' => [
                    'url' => Url::to(['web-hook/status']),
                ]
            ]) ?>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            'user_question',
            'bot_answer',

            [
                'class' => ActionFilterColumn::class,
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>


</div>
