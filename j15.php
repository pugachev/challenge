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
[implodeとexplodeの使い方の違い]
・implode:配列→文字列 更にデリミタと呼ばれる区切り文字を付加
$tgt = ["馬場典子","檜山沙耶","相場詩織"];
$result = implode("★",$tgt);

馬場典子★檜山沙耶★相場詩織
確かに指定したデリミタで文字列化されている
※二次元配列には使えない模様

・explode:文字列→配列 指定したデリミタで文字列を区切って配列化する
$tgt="馬場典子★檜山沙耶★相場詩織";
$result = explode("★",$tgt);

Array
(
    [0] => 馬場典子
    [1] => 檜山沙耶
    [2] => 相場詩織
)

※存在しないデリミタを指定した場合は、分割できないので配列は一つのみとなる
$tgt="馬場典子★檜山沙耶★相場詩織";
$result = explode(",",$tgt);

Array
(
    [0] => 馬場典子★檜山沙耶★相場詩織
)

</code></pre>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/components/prism-core.min.js" integrity="sha512-TbHaMJHEmRBDf9W3P7VcRGwEmVEJu7MO6roAE0C4yqoNHeIVo3otIX3zj1DOLtn7YCD+U8Oy1T9eMtG/M9lxRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/plugins/autoloader/prism-autoloader.min.js" integrity="sha512-sv0slik/5O0JIPdLBCR2A3XDg/1U3WuDEheZfI/DI5n8Yqc3h5kjrnr46FGBNiUAJF7rE4LHKwQ/SoSLRKAxEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>