<?php


namespace app\components\gridView;


class SerialColumn extends \yii\grid\SerialColumn
{
    public $headerOptions = ['scope' => 'col'];

    public $contentOptions = ['scope' => 'row'];
}