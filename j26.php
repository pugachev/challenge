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
//[stdClass]の生成
$stdObj = new stdClass;
$stdObj->stdVal1 = 1111;
$stdObj->stdVal2 = "2222";

echo "[stdClass]の参照".PHP_EOL;
echo $stdObj->stdVal1.PHP_EOL;
echo $stdObj->stdVal2.PHP_EOL;

echo PHP_EOL;

echo "配列化の参照".PHP_EOL;
$arrObj = (array)$stdObj; 
echo $arrObj['stdVal1'].PHP_EOL;
echo $arrObj['stdVal2'].PHP_EOL;

echo PHP_EOL;

echo "プロパティ名の変数化".PHP_EOL;
$key1 = "stdVal1";//
$key2 = "stdVal2"; 
echo $stdObj->$key1.PHP_EOL;
echo $stdObj->$key2.PHP_EOL;

echo PHP_EOL;

echo "プロパティの追加".PHP_EOL;
$stdObj->stdVal3 = "プロパティの追加";
echo $stdObj->stdVal1.PHP_EOL;
echo $stdObj->stdVal2.PHP_EOL;
echo $stdObj->stdVal3.PHP_EOL;
</code></pre>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/components/prism-core.min.js" integrity="sha512-TbHaMJHEmRBDf9W3P7VcRGwEmVEJu7MO6roAE0C4yqoNHeIVo3otIX3zj1DOLtn7YCD+U8Oy1T9eMtG/M9lxRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/plugins/autoloader/prism-autoloader.min.js" integrity="sha512-sv0slik/5O0JIPdLBCR2A3XDg/1U3WuDEheZfI/DI5n8Yqc3h5kjrnr46FGBNiUAJF7rE4LHKwQ/SoSLRKAxEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>