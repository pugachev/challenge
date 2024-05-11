<?php
function getCsvColumnAndLabel() {
    return array(
        0 => array('col' => "ID",                               'label' => "コースID")
        ,  1 => array('col' => "NAME_JP",                          'label' => "コース名")
        ,  2 => array('col' => "LANGUAGE_1",                       'label' => "英語")
        ,  3 => array('col' => "LANGUAGE_4",                       'label' => "繁体中文")
        ,  4 => array('col' => "LANGUAGE_3",                       'label' => "簡体中文")
        ,  5 => array('col' => "LANGUAGE_2",                       'label' => "韓国語")
        ,  6 => array('col' => "PRICE",                            'label' => "金額")
        ,  7 => array('col' => "PRICE_FOR_PAYPAL",                 'label' => "Paypal連携用金額")
        ,  8 => array('col' => "STATUS",                           'label' => "ステータス")
        ,  9 => array('col' => "PROVIDE_TIME",                     'label' => "提供時間")
        , 10 => array('col' => "COMMON_PAYPAL_SENTENCE_ID",        'label' => "Paypal連携用共通文言設定")
        , 11 => array('col' => "PROVIDABLE_NUMBER_TYPE",           'label' => "提供可能人数タイプ")
        , 12 => array('col' => "COURCE_SEAT_TYPES",                'label' => "提供可能席タイプ")
        , 13 => array('col' => "IS_CHILD_MENU",                    'label' => "子供用メニュー")
        , 14 => array('col' => "IS_FREE_PRIVATE_ROOM",             'label' => "個室料無料")
        , 15 => array('col' => "PROVIDE_TERM_START_YEAR",          'label' => "提供期間開始(年)")
        , 16 => array('col' => "PROVIDE_TERM_START_MONTH",         'label' => "提供期間開始(月)")
        , 17 => array('col' => "PROVIDE_TERM_START_DAY",           'label' => "提供期間開始(日)")
        , 18 => array('col' => "PROVIDE_TERM_END_YEAR",            'label' => "提供期間終了(年)")
        , 19 => array('col' => "PROVIDE_TERM_END_MONTH",           'label' => "提供期間終了(月)")
        , 20 => array('col' => "PROVIDE_TERM_END_DAY",             'label' => "提供期間終了(日)")
        , 21 => array('col' => "PROVIDE_TIME_TYPE",                'label' => "提供時間帯タイプ")
        , 22 => array('col' => "PROVIDE_TIME_START_HOUR",          'label' => "提供時間帯開始(時)")
        , 23 => array('col' => "PROVIDE_TIME_START_MINUTE",        'label' => "提供時間帯開始(分)")
        , 24 => array('col' => "PROVIDE_TIME_END_HOUR",            'label' => "提供時間帯終了(時)")
        , 25 => array('col' => "PROVIDE_TIME_END_MINUTE",          'label' => "提供時間帯終了(分)")
        , 26 => array('col' => "PROVIDABLE_NUMBER_MIN",            'label' => "提供可能人数(最小)")
        , 27 => array('col' => "PROVIDABLE_NUMBER_MAX",            'label' => "提供可能人数(最大)")
        , 28 => array('col' => "PROVIDABLE_NUMBER_UNIT",           'label' => "提供可能人数(単位)")
        , 29 => array('col' => "PROVIDE_WEEK_DAY",                 'label' => "提供曜日")
        , 30 => array('col' => "DESCRIPTION_JP",                   'label' => "コース説明")
        , 31 => array('col' => "SENTENCE_FOR_PAYPAL_JP",           'label' => "Paypal連携用テキスト")
        , 32 => array('col' => "PROVIDE_DISABLE_TERM_START_YEAR",  'label' => "提供不可期間開始(年)")
        , 33 => array('col' => "PROVIDE_DISABLE_TERM_START_MONTH", 'label' => "提供不可期間開始(月)")
        , 34 => array('col' => "PROVIDE_DISABLE_TERM_START_DAY",   'label' => "提供不可期間開始(日)")
        , 35 => array('col' => "PROVIDE_DISABLE_TERM_END_YEAR",    'label' => "提供不可期間終了(年)")
        , 36 => array('col' => "PROVIDE_DISABLE_TERM_END_MONTH",   'label' => "提供不可期間終了(月)")
        , 37 => array('col' => "PROVIDE_DISABLE_TERM_END_DAY",     'label' => "提供不可期間終了(日)")
        , 38 => array('col' => "IS_UNLIMITED_OFFER",               'label' => "無期限提供")
        , 39 => array('col' => "COURCE_COMMON_CODE",               'label' => "支店間連携")
    );
}

$arrCsvColumnLabel=getCsvColumnAndLabel();

foreach($arrCsvColumnLabel as $col_no => $column) {
    echo 'col_no='.$col_no.'   '.$column['col'].'  '.$column['label'].PHP_EOL;
}