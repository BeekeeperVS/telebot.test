<?php


namespace app\components\gridView;


class DataColumn extends \yii\grid\DataColumn
{
    public $headerOptions = [
        'scope' => 'col',
        'style' => 'border: 1px solid #dee2e6;'
    ];
}