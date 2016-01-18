<?php

namespace App\Libraries;

class BaseHelper
{

    protected static $manager;

    // アップロード 基底ディレクトリ
    protected static $upload_base = 'storage/upload';

    /**
     * モデルから $key=id, $value=description の連想配列を返却する。
     * @return  Array   連想配列 key=id, value=description
     */
    public static function getDescriptions()
    {
        $manager = static::$manager;
        $objects = $manager::get('all');
        $items = array();
        foreach ($objects as $item) {
            $items[$item->id] = $item->description;
        }
        return $items;
    }

    protected static function makeSelectValue($options, $items)
    {
        $html = array();
        if (!is_array($items)) {
            $items = array($items);
        }
        foreach ($items as $id) {
            $html[] = '<option value="' . $id . '">' . $options[$id] . '</option>';
        }
        return implode("\n", $html);
    }


    protected static function makeSelectValueWithGroup($group, $options, $items)
    {
        $html = array();
        $html[] = '<optgroup label="' . $group . '">';
        foreach ($items as $id) {
            $html[] = static::makeSelectValue($options, $id);
        }
        $html[] = '</optgroup>';
        return implode("\n", $html);
    }

    /**
     * あかさたな順で使用する、段を返却する（SQLクエリで使用する）
     * @param   $q      各段の先頭の一文字
     * @return  Array   段の配列を返却
     */
    public static function getListQueries($q)
    {
        if ($q === 'あ') {
            $list = 'あ い う え お';
        } elseif ($q === 'か') {
            $list = 'か き く け こ が ぎ ぐ げ ご';
        } elseif ($q === 'さ') {
            $list = 'さ し す せ そ ざ じ ず ぜ ぞ';
        } elseif ($q === 'た') {
            $list = 'た ち つ て と だ ぢ づ で ど';
        } elseif ($q === 'な') {
            $list = 'な に ぬ ね の';
        } elseif ($q === 'は') {
            $list = 'は ひ ふ へ ほ ば び ぶ べ ぼ ぱ ぴ ぷ ぺ ぽ';
        } elseif ($q === 'ま') {
            $list = 'ま み む め も';
        } elseif ($q === 'や') {
            $list = 'や ゆ よ';
        } elseif ($q === 'ら') {
            $list = 'ら り る れ ろ';
        } elseif ($q === 'わ') {
            $list = 'わ を ん';
        } elseif ($q === 'A') {
            $list = 'A B C D E F G';
        } elseif ($q === 'H') {
            $list = 'H I J K L M N';
        } elseif ($q === 'O') {
            $list = 'O P Q R S T U';
        } elseif ($q === 'V') {
            $list = 'V W X Y Z';
        } else {
            return false;
        }
        return explode(' ', $list);
    }


    /**
     * 数値を日本円の表記に変換する
     * @return  str
     */
    public static function convertJapaneseYen($int)
    {
        if (empty($int)) {
            return $int;
        }
        setlocale(LC_MONETARY, 'ja_JP.utf8');
        return money_format("%n", $int);
    }

    /**
     * 数値を通過の表記に変換する
     * @return  str
     */
    public static function convertCurrency($int, $locale = false)
    {
        if (empty($int)) {
            return $int;
        }
        if ($locale === false) {
            return number_format($int);
        } elseif ($locale === true) {
            setlocale(LC_MONETARY, 'ja_JP.utf8');
        } else {
            setlocale(LC_MONETARY, $locale);
        }
        return money_format("%n", $int);
    }

    /**
     * ファイルパスを作成する（現状の実装では、YYYYMMDD_HHMMSS_fffff の日付+時刻+マイクロ秒3桁+拡張子 を作成）
     * @input   $name   str   ファイル名
     * @return  str
     */
    public static function getFilePath($name, $project = null)
    {
        $fmt = 'Ymd_His_';
        $msec_digit = 5;
        $time = date($fmt) . substr((string)microtime(), 2, $msec_digit);
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        return $time . '.' . $ext;
    }

    /**
     * ファイルパスを生成（$pathは継承クラスで定義）
     * @return  str
     */
    public static function getNewFilePath()
    {
        return static::$path . '/' . Helpers_Time::getYear('now', 4) . '/' . Helpers_Time::getMonth('now', 2);
    }

    /**
     * POST値で送られたファイルを保存する
     * @input   $file   str     保存ファイルのPOST名
     * @input   $name   str     保存先（パス名を含むファイル名）
     * @return  str
     */
    public static function saveFile($file, $path, $name)
    {
        Input::upload($file, $path, $name);
        $created = $path . '/' . $name;
        return $created;
    }


    /**
     * オブジェクトのプロパティにNULLや0でない有効な値が含まれているかを確認する
     * @input   $object         Object  オブジェクト
     * @input   $conditions     Array   プロパティの配列
     * @return  Array
     */
    public static function hasNonZero($object, $conditions)
    {
        $errors = array();
        $status = true;
        foreach ($conditions as $condition) {
            $value = $object->$condition['key'];
            if (!isset($value) || $value === '' || count($value) === 0 || $value === 0) {
                $errors[] = $condition['name'];
                $status = false;
            }
        }
        $result = ['status' => $status, 'errors' => $errors];
        return $result;
    }

    /**
     * アップロードファイルの保存パスを取得
     * @param   $quota  Object  アップロードファイルモデルオブジェクト
     * @return  str     ファイル保存パス
     */
    public static function getUploadPath($file)
    {
        $path = static::$upload_base . '/' . $file->filepath->filepath;
        return $path;
    }

    /**
     * アップロードファイルを保存
     * @param   $file   str   保存ファイルのPOST名
     * @param   $name   str   ファイル名
     * @return  str     ファイル保存パス
     */
//    public static function saveUploadFile($file, $name)
//    {
//        $path = static::$upload_base . '/' . static::getNewFilePath();
//        if (!File::exists($path)) {
//            File::mkdir($path);
//            if (!File::exists($path)) {
//                throw new FileMakeException('cannot make directory : $path=' . $path);
//            }
//        }
//        return static::saveFile($file, $path, $name);
//    }

    /**
     * 見積書・請求書に出力する税率を取得する
     * @param $date
     * @return string
     */
    public static function getTaxRate($date)
    {
        $dateVal = intval(date("Ymd", strtotime($date)));
        if ($dateVal < 20140401) {
            return '5.0';
        } else if ($dateVal < 20170401) {
            return '8.0';
        } else {
            return '10.0';
        }
        return '';
    }
}
