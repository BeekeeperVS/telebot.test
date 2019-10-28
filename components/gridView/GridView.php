<?php


namespace app\components\gridView;


use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;

class GridView extends \yii\grid\GridView
{

    /**
     * @return string
     * @throws \Exception
     */
    public function renderPager()
    {
        $pagination = $this->dataProvider->getPagination();
        if ($pagination === false || $this->dataProvider->getCount() <= 0) {
            return '';
        }
        /* @var $class LinkPager */
        $pager = $this->pager;
        $class = ArrayHelper::remove($pager, 'class', LinkPager::className());
        $pager['pagination'] = $pagination;
        $pager['view'] = $this->getView();
        $pager['linkOptions'] = ['class' => 'page-link'];
        $pager['pageCssClass'] = 'page-item';
        $pager['lastPageCssClass'] = 'last ';
        $pager['disabledPageCssClass'] = 'disabled hide';
        return $class::widget($pager);
    }
}