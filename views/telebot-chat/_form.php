<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\db\TelebotChat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="telebot-chat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_question')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bot_answer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
