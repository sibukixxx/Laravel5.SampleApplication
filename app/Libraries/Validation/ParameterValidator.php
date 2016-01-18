<?php
/**
 * Created by PhpStorm.
 * User: yuichi.takada
 * Date: 2015/11/05
 * Time: 13:37
 */

namespace App\Libraries\Validation;


class ParameterValidator {
    /**
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool
     */
    public function validateNoControlCharacters($attribute, $value, $parameters)
    {
        if (mb_ereg('\A[[:^cntrl:]]*\z', $value)) {
            return true;
        }

        return false;
    }
}