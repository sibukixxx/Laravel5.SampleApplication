<?php
/**
 * Created by PhpStorm.
 * User: yuichi.takada
 * Date: 2015/11/05
 * Time: 13:44
 */

namespace App\Libraries\Validation;


class ImageFileValidator {

    /**
     * GIF/JPEG/PNG のみ対象
     * @param String $filepath
     * @return bool
     */
    function isValidImageFile($filepath)
    {
        try {
            // WARNING, NOTICE が発生する可能性有り
            $img_info = getimagesize($filepath);

            switch ($img_info[2]) {
                case IMAGETYPE_GIF:
                case IMAGETYPE_JPEG:
                case IMAGETYPE_PNG:
                    // getimagesize関数はマジックバイトを見ているだけ
                    // イメージリソースが生成できるかどうかでファイルの中身を判定する。
                    // データに問題がある場合、WARNING が発生する可能性有り
                    if (imagecreatefromstring(file_get_contents($filepath)) !== false) {
                        return true;
                    }
            }

        } catch (\ErrorException $e) {

            $err_msg = sprintf("%s(%d): %s (%d) filepath = %s",
                __METHOD__, $e->getLine(), $e->getMessage(), $e->getCode(), $filepath);

            switch ($e->getSeverity()) {
                case E_WARNING:
                    \Log::warning($err_msg);
                    break;
                case E_NOTICE:
                    \Log::notice($err_msg);
                    break;
                default:
                    \Log::error($err_msg);
            }
        }

        return false;
    }

}