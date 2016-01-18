<?php namespace App\Library;

/**
 * Class Master
 *
 * master data
 */
class MasterData {

public function sayHello(){
        return "Hello!";
}

    public static function all()
    {
        $master_data = array();
        $master_data['sex'] = self::sex();
        $master_data['pref'] = self::pref();
        $master_data['job'] = self::job();
        $master_data['marriage'] = self::marriage();
        $master_data['children'] = self::children();
        $master_data['income_setai'] = self::income_setai();

        return $master_data;
    }

	public static function sex()
    {
        $sex = array(
            "0" => "指定なし",
            "1" => "男性",
            "2" => "女性"
        );
        return $sex;
	}

    public static function pref()
    {
        $pref = array(
            "0" => "指定なし",
            "1" => "北海道",
            "2" => "青森県",
            "3" => "岩手県",
            "4" => "宮城県",
            "5" => "秋田県",
            "6" => "山形県",
            "7" => "福島県",
            "8" => "茨城県",
            "9" => "栃木県",
            "10" => "群馬県",
            "11" => "埼玉県",
            "12" => "千葉県",
            "13" => "東京都",
            "14" => "神奈川県",
            "15" => "新潟県",
            "16" => "富山県",
            "17" => "石川県",
            "18" => "福井県",
            "19" => "山梨県",
            "20" => "長野県",
            "21" => "岐阜県",
            "22" => "静岡県",
            "23" => "愛知県",
            "24" => "三重県",
            "25" => "滋賀県",
            "26" => "京都府",
            "27" => "大阪府",
            "28" => "兵庫県",
            "29" => "奈良県",
            "30" => "和歌山県",
            "31" => "鳥取県",
            "32" => "島根県",
            "33" => "岡山県",
            "34" => "広島県",
            "35" => "山口県",
            "36" => "徳島県",
            "37" => "香川県",
            "38" => "愛媛県",
            "39" => "高知県",
            "40" => "福岡県",
            "41" => "佐賀県",
            "42" => "長崎県",
            "43" => "熊本県",
            "44" => "大分県",
            "45" => "宮崎県",
            "46" => "鹿児島県",
            "47" => "沖縄県"
        );
        return $pref;
    }

    public static function job()
    {
        $job = array(
            "0" => "指定なし",
            "1" => "公務員",
            "2" => "経営者・役員",
            "3" => "会社員(事務系)",
            "4" => "会社員(技術系)",
            "5" => "会社員(その他)",
            "6" => "自営業",
            "7" => "自由業",
            "8" => "専業主婦",
            "9" => "パート・アルバイト",
            "10" => "学生",
            "11" => "その他"
        );
        return $job;
    }

    public static function marriage()
    {
        $marriage = array(
            "0" => "指定なし",
            "1" =>  "未婚",
            "2" =>  "既婚"
        );
        return $marriage;
    }

    public static function children()
    {
        $children = array(
            "0" => "指定なし",
            "1" => "子供有り",
            "2" => "子供無し"
        );
        return $children;
    }

    public static function income_setai()
    {
        $income_setai = array(
            "0" => "指定なし",
            "1" => "200万円未満",
            "2" => "200～400万円未満",
            "3" => "400～600万円未満",
            "4" => "600～800万円未満",
            "5" => "800～1000万円未満",
            "6" => "1000～1200万円未満",
            "7" => "1200～1500万円未満",
            "8" => "1500～2000万円未満",
            "9" => "2000万円以上",
            "10" => "わからない"
        );
        return $income_setai;
    }

}

