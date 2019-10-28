<?php

use app\models\db\Configuration;
use app\models\db\TelebotConfiguration;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TelebotConfigurationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $this View */
/* @var $models TelebotConfiguration[] */

$this->title = 'Telebot Configurations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuration-index">

    <?php if ($models): ?>
        <div class="configuration-form">

            <?php $form = ActiveForm::begin(); ?>

            <?php foreach ($models as $model): ?>
                <?
                $name = "TelebotConfiguration[$model->type]";
                $id = "telebotconfiguration-$model->type";
                ?>
                <?= $form->field($model, 'value', [
//                    'name' => "TelebotConfiguration[$model->type]",
//                    'id' => "telebotconfiguration-$model->type"
                ])->label($model->title, ['for' => $id])->textInput([
                    'maxlength' => true,
                    'name' => $name,
                    'id' => $id

                ]) ?>

            <?php endforeach; ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    <?php endif; ?>

</div>