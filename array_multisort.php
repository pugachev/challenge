<?php
/** @var array 温泉地テーブル. */
const tgtarray = [
    ['kuni' => '日本', 'todofuken' => '群馬県', 'shi' => '吾妻郡', 'onsen' => '草津'],
    ['kuni' => '日本', 'todofuken' => '群馬県', 'shi' => '渋川市', 'onsen' => '伊香保'],
    ['kuni' => '日本', 'todofuken' => '神奈川県', 'shi' => '足柄下郡', 'onsen' => '湯河原'],
    ['kuni' => '日本', 'todofuken' => '大分県', 'shi' => '別府市', 'onsen' => '観海寺'],
    ['kuni' => '日本', 'todofuken' => '大分県', 'shi' => '別府市', 'onsen' => '浜脇'],
    ['kuni' => '日本', 'todofuken' => '大分県', 'shi' => '別府市', 'onsen' => '堀田'],
    ['kuni' => 'ドイツ', 'todofuken' => 'ヴュルテンベルク州', 'shi' => 'バーデン＝バーデン', 'onsen' => 'フリードリヒス'],
    ['kuni' => 'ドイツ', 'todofuken' => 'ヴュルテンベルク州', 'shi' => 'バーデン＝バーデン', 'onsen' => 'カラカラ'],
    ['kuni' => 'ドイツ', 'todofuken' => 'ヘッセン州', 'shi' => 'ヴィースバーデン', 'onsen' => 'アウカムタル'],
    ['kuni' => 'ドイツ', 'todofuken' => 'ヘッセン州', 'shi' => 'ヴィースバーデン', 'onsen' => 'カイザーフリードリヒ'],
];

/**
 * 2つの項目でGROUP BYする.
 * @param  string $key1 1番目のグループ化する項目の名前.
 * @param  string $key2 2番目のグループ化する項目の名前.
 */


function groupByTwoKey(string $key1, string $key2): void
{
    $grouped = [];
    foreach (tgtarray as $row) {
        $notKeys = array_filter($row, function($key) use ($key1, $key2) {
            return $key !== $key1 && $key !== $key2;
        }, ARRAY_FILTER_USE_KEY);
        
        $grouped[$row[$key1]][$row[$key2]][] = $notKeys;
//         $key = $row[$key1].$row[$key2];
//         //キーが無ければ新規に追加
//         //キーが有ればそのキーに対して追加
//         $grouped[$key][] = $row;
    }

    
    print_r($grouped);
//     return $grouped;
}
// 省略
// $groupBy = new GroupByArray();
groupByTwoKey('kuni','todofuken');