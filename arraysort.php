<?php
// $foods = [
//     ['NAME' => '(20時)¥12,000 Select Kobe Beef Lunch (Sirloin 150g)', 'CATEGORY_ID' => 4],
//     ['NAME' => '¥15,800(1) Select Kobe Beef Course (Tenderloin 110g)', 'CATEGORY_ID' => 4],
//     ['NAME' => '(Dinner)¥16,800 Select Kobe Beef Course (Tenderloin 130g)', 'CATEGORY_ID' => 5],
//     ['NAME' => '¥18,300 Select Kobe Beef Course (Tenderloin 160g)', 'CATEGORY_ID' => 5],
//     ['NAME' => '¥13,800 Select Kobe Beef Course (Sirloin 130g)', 'CATEGORY_ID' => 4],
// ];


$foods = [
    ['name' => 'Apple', 'category' => 'fruits','sub_category'=>100],
    ['name' => 'Strawberry', 'category' => 'fruits','sub_category'=>100],
    ['name' => 'Peach', 'category' => 'fruits','sub_category'=>200],
    ['name' => 'Melon', 'category' => 'fruits','sub_category'=>100],
    ['name' => 'water', 'category' => 'drink','sub_category'=>100],
    ['name' => 'beer', 'category' => 'drink','sub_category'=>100],
];

function array_group_by(array $items, $keyName,$subKeyName)
{
    $groups = [];
    foreach ($items as $item) {
        $key = $item[$keyName];
        if (array_key_exists($key, $groups)) {
            $groups[$key][] = $item;
            $subKey = $item[$subKeyName];
            if (array_key_exists($subKey, $groups)) {
                $groups[$key][$subKey] = $item;
            }
        } else {
            $groups[$key][] = $item;
//             $subKey = $item[$subKeyName];
//             $groups[$key][$subKey] = $item;
        }
    }
    return $groups;
}

var_dump(array_group_by($foods,'category','sub_category'));

// function array_group_by(array $items, $keyName)
// {
//     $groups = [];
//     foreach ($items as $item) {
//         $key = $item[$keyName];
//         if (array_key_exists($key, $groups)) {
//             $groups[$key][] = $item;
//         } else {
// //             $groups[$key] = [$item];
//             $groups[$key][] = $item;
//         }
//     }
//     return $groups;
// }

// var_dump(array_group_by($foods,'category'));
