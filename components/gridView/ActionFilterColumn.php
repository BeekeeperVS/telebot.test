<?php
/**
 * Created by PhpStorm.
 * User: beeke
 * Date: 26.06.2019
 * Time: 15:40
 */

namespace app\components\gridView;

use Yii;
use yii\grid\ActionColumn;
use yii\helpers\Html;


class ActionFilterColumn extends ActionColumn
{

    public $filterButtons = true;
    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->header = translate('Actions');
    }

    protected function renderFilterCellContent()
    {
        $buttons = [
            'submit' => Html::submitButton(translate('Find'), ['class'=>"btn btn-primary submit"]),
            'reset' =>  Html::a( translate('Reset'), ['index'], ['class' => 'btn btn-default reset']),//Html::resetButton(Yii::t('backend', 'Reset'), ['class'=>"btn btn-default reset"]),
        ];
        if ($this->filterButtons) {
            return $buttons['submit'].' '.$buttons['reset'];
        }

    }

    /**
     * @inheritDoc
     */
    protected function initDefaultButtons()
    {
        $this->initDefaultButton('view', 'eye');
        $this->initDefaultButton('update', 'pencil');
        $this->initDefaultButton('delete', 'trash', [
            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
            'data-method' => 'post',
        ]);
    }

    /**
     * @inheritDoc
     */
    protected function initDefaultButton($name, $iconName, $additionalOptions = [])
    {
        if (!isset($this->buttons[$name]) && strpos($this->template, '{' . $name . '}') !== false) {
            $this->buttons[$name] = function ($url, $model, $key) use ($name, $iconName, $additionalOptions) {
                switch ($name) {
                    case 'view':
                        $title = Yii::t('yii', 'View');
                        break;
                    case 'update':
                        $title = Yii::t('yii', 'Update');
                        break;
                    case 'delete':
                        $title = Yii::t('yii', 'Delete');
                        break;
                    default:
                        $title = ucfirst($name);
                }
                $options = array_merge([
                    'title' => $title,
                    'aria-label' => $title,
                    'data-pjax' => '0',
                ], $additionalOptions, $this->buttonOptions);
                $icon = Html::tag('i', '', ['class' => "fa fa-$iconName", 'style' => 'font-size: 20px;']);
                return Html::a($icon, $url, $options);
            };
        }
    }

}