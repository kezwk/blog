<?php

namespace app\index\service;

class IndexService
{
    public static function getCategory()
    {
        $category = \app\index\model\IndexModel::getCategory();
        $categoryCount = \app\index\model\IndexModel::countCategory();
        foreach ($category as &$item) {
            foreach ($categoryCount as $_item) {
                if ($item['id'] == $_item['id']) {
                    $item['count'] = $_item['count'];
                }
            }
        }
        unset($item);
        return $category;
    }
}