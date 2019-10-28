<?php


namespace app\components\gridView;


use kartik\select2\Select2;
use yii\grid\DataColumn;
use yii\helpers\Html;

class DataColumnSelect2Filter extends DataColumn
{
    /**
     * {@inheritdoc}
     */
    protected function renderFilterCellContent()
    {

        $model = $this->grid->filterModel;

        return Html::activeDropDownList(
            $model,
            $this->attribute,
            $this->filter,
            [
                'class' => 'form-control selectize-filter',
                'prompt' => '',
                ]
        );

        //        return Select2::widget([
//            'model' => $model,
//            'name' => $this->attribute,
//            'attribute' => $this->attribute,
//            'data' => $this->filter,
//            'options' => [
//                'placeholder' => '',
//                'class' => 'form-control',
//            ],
//            'pluginOptions' => [
//                'allowClear' => true
//            ],
//
//        ]);
    }
}