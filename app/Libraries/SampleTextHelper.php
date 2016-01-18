<?php
/**
 * Created by PhpStorm.
 * User: yuichi.takada
 * Date: 2016/01/18
 * Time: 19:00
 */

namespace App\Libraries;


class SampleTextHelper
{

    /**
     * Returns an excerpt from a given string (between 0 and passed limit variable).
     *
     * @param $string
     * @param int $limit
     * @param string $suffix
     * @return string
     */
    public static function shorten($string, $limit = 100, $suffix = '…')
    {
        if (strlen($string) < $limit) {
            return $string;
        }

        return substr($string, 0, $limit) . $suffix;
    }
}