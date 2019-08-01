<?php

namespace MySite\Helper;

class Textgen
{

    const POOL = '的一是不了我有來在好人這到看他個沒說要還以大麼然天也得家啊時'
               . '就你去很可想開著為知生子上道們出都只什自裡覺樣下起真後新那但'
               . '小己兩事聽學因又日多心十怎會而經老早太東文所中次全喔第最見能'
               . '面之過回對用身本果地哈間年笑於點前頭現嗚幾定完才喜活三已外女'
               . '西愛些放給話直常同望感部玩今動便成理意王安張書方台且種少實結'
               . '像原如半圖吃底站再做似當者記氣買路故走手重神死孩雖較電分問色'
               . '未許久叫國她特近肚先發片決其包並讓整機始比班正候車剛美總聞位'
               . '滿聲幫情錄關此跟打錯歡表或邊應彷奇月乎每掉場快午各行加卻無明'
               . '服終睡白二九命界門作希四親該別夜社至紀床角衣莊劇七輕進祖影狀'
               . '工弟假管被依存題使吧變力異爆件坐呢紅提酒喝刻八般注況空聊昨';

    public static function gen(int $seed, int $length, $lineBreak = false)
    {
        static $poolNoLB, $poolLB;
        if (!$poolLB) {
            $poolLB = $poolNoLB = static::pool2array();
            for ($i = 0; $i < 300; $i++) {
                $poolLB[] = "\n\n";
            }
        }

        $poolUsed = ($lineBreak) ? $poolLB : $poolNoLB;

        $result = '';
        $periodInterval = 0;
        for ($i = 1; $i <= $length; $i++) {
            if ($i > 1 && $i < $length - 1 && $periodInterval && rand($periodInterval, 20) > 19) {
                $result .= "，";
                $periodInterval = 0;
            } else {
                $result .= $poolUsed[array_rand($poolUsed)];
                $periodInterval++;
            }
        }

        $result = str_replace("，\n\n", "\n\n", $result);
        $result = str_replace("\n\n，", "\n\n", $result);
        $result = trim($result);
        $result = str_replace("\n\n", "。\n\n", $result);

        return $result;
    }

    private static function pool2array()
    {
        $ary = [];

        $pool = preg_split('//u', static::POOL);
        $len = count($pool);
        foreach ($pool as $i => $c) {
            $size = $len - $i;
            for ($j = 0; $j < $size; $j++) {
                $ary[] = $c;
            }
        }

        return $ary;
    }
}
