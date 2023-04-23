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
$results_consump=[];
//連想配列という配列を順次追加しているイメージ
//親の配列の中に複数個の連想配列が追加される
$results_consump[]=array('岸明日香'=>'32');
$results_consump[]=array('相場詩織'=>'31');
$results_consump[]=array('宇垣美里'=>'32');

print_r($results_consump).PHP_EOL;
Array
(
    [0] => Array
        (
            [岸明日香] => 32
        )

    [1] => Array
        (
            [相場詩織] => 31
        )

    [2] => Array
        (
            [宇垣美里] => 32
        )

)

$results_consump2=[];
//既にある配列に連想配列を順次追加しているイメージ
//親の配列の中にシンプルに要素が追加される
$results_consump2+=array('岸明日香'=>'32');
$results_consump2+=array('相場詩織'=>'31');
$results_consump2+=array('宇垣美里'=>'32');

print_r($results_consump2).PHP_EOL;
Array
(
    [岸明日香] => 32
    [相場詩織] => 31
    [宇垣美里] => 32
)
</code></pre>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/components/prism-core.min.js" integrity="sha512-TbHaMJHEmRBDf9W3P7VcRGwEmVEJu7MO6roAE0C4yqoNHeIVo3otIX3zj1DOLtn7YCD+U8Oy1T9eMtG/M9lxRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/plugins/autoloader/prism-autoloader.min.js" integrity="sha512-sv0slik/5O0JIPdLBCR2A3XDg/1U3WuDEheZfI/DI5n8Yqc3h5kjrnr46FGBNiUAJF7rE4LHKwQ/SoSLRKAxEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>