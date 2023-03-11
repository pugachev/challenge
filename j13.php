<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/themes/prism.min.css" integrity="sha512-tN7Ec6zAFaVSG3TpNAKtk4DOHNpSwKHxxrsiw4GHKESGPs5njn/0sMCUMl2svV4wo4BK/rCP7juYz+zx+l6oeQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<pre><code class="language-php">
[array_mergeの使い方まとめ]

(1) keyが数値の場合は再採番されてしまう
$hoge = array(1=>'馬場典子');
$hoge = array_merge($hoge,array(2=>'良原安美'));
$hoge = array_merge($hoge,array(3=>'堤礼実'));
Array
(
    [馬場典子] => 0
    [良原安美] => 1
    [堤礼実] => 2
)

(2) +演算子はそのまま(再採番はされない)
$hoge = array(1=>'馬場典子');
$hoge = $hoge + array(2=>'良原安美');
$hoge = $hoge + array(3=>'堤礼実');

Array
(
    [1] => 馬場典子
    [2] => 良原安美
    [3] => 堤礼実
)

(3) +=演算子もそのまま(再採番はされない)
$hoge = array(1=>'馬場典子');
$hoge += array(2=>'良原安美');
$hoge += array(3=>'堤礼実');

Array
(
    [1] => 馬場典子
    [2] => 良原安美
    [3] => 堤礼実
)

(4) +演算子(シンプル版)
$hoge_1 = array(1=>'馬場典子');
$hoge_2 = array(2=>'良原安美');

Array
(
    [1] => 馬場典子
    [2] => 良原安美
)

(5) 通常の配列でもarray_mergeの結果は同じ
※PHPでは通常の配列でも隠れて[0]=>xxxや[1]=>yyyといった具合にkeyが振り分けられる
$test1 = array('AAA','BBB');
$test2 = array('CCC','DDD');
$test3 = array_merge($test1,$test2);

Array
(
    [0] => AAA
    [1] => BBB
    [2] => CCC
    [3] => DDD
)

(番外編) キーが文字列の連想配列はarray_push関数ではを扱えません
以下の例をみると配列2番目の要素に連想配列が追加されている。
文字通り「配列が追加」されている。
なんだか不思議な形をしている。採番はされてない。

$hoge2 = array(1=>'馬場典子');
array_push($hoge2,array(2=>'良原安美'));

Array
(
    [1] => 馬場典子
    [2] => Array
        (
            [2] => 良原安美
        )

)


$test3 = array('AAA','BBB');
$test4 = array('CCC','DDD');
array_push($test4,$test3);

Array
(
    [0] => CCC
    [1] => DDD
    [2] => Array
        (
            [0] => AAA
            [1] => BBB
        )

)

※この場合はうまくいく。結論、要素を足し込むのだけarray_pushは期待通り
まがいなりにも、array('AAA','BBB')こうすると連想配列になってしまうからっぽい
$test3 = array('AAA','BBB');
$test4 = array('CCC','DDD');
array_push($test4,'AAA','BBB');

Array
(
    [0] => CCC
    [1] => DDD
    [2] => AAA
    [3] => BBB
)






</code></pre>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/components/prism-core.min.js" integrity="sha512-TbHaMJHEmRBDf9W3P7VcRGwEmVEJu7MO6roAE0C4yqoNHeIVo3otIX3zj1DOLtn7YCD+U8Oy1T9eMtG/M9lxRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/plugins/autoloader/prism-autoloader.min.js" integrity="sha512-sv0slik/5O0JIPdLBCR2A3XDg/1U3WuDEheZfI/DI5n8Yqc3h5kjrnr46FGBNiUAJF7rE4LHKwQ/SoSLRKAxEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script></body>
</html>