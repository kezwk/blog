<?php
/**
 * @Title ...
 * ---------------------------------------------
 * @File func.php
 * @Description ...
 *
 * ---------------------------------------------
 * @Author seagm
 * @Date 2019/5/8 11:32
 */

namespace app\common;

class func
{
    public static function changeCategory($row)
    {
        switch ($row) {
            case 0:
                $row = 'PHP';
                break;
            case 1:
                $row = 'JS';
                break;
            case 2:
                $row = 'MYSQL';
                break;
            case 3:
                $row = 'LINUX';
                break;
            case 4:
                $row = 'Other';
                break;
        }
        return $row;
    }
}
