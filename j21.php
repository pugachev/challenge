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
[PHP側]
$data = array(
  'fruits' => array( 
    'apple',
    'banana',
    'cherry'
  ),
  'vegetable' => array( 
    'carot',
    'cabbage',
  ),
);
$json = json_encode($data);

[Javascript側]
let array = ＜?php echo $json; ?＞;←PHPから受信したデータ
for(let key in array){ ←key配列が２つ
    if(Array.isArray(array[key])){←key配列を個別に取り出す(この例では2個 fruitsとvegetable)
        console.log('key='+key);←個別のkey配列のkey(この例では2個 fruitsとvegetable)
        for(let key2 in array[key]){
            console.log('key2='+key2+' '+array[key][key2]);←個別のkey配列のvalueを取り出す(ここでのkeyは数値)
        }
    }
}
key=fruits
apple
banana
cherry
key=vegetable
carot
cabbage

</code></pre>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/components/prism-core.min.js" integrity="sha512-TbHaMJHEmRBDf9W3P7VcRGwEmVEJu7MO6roAE0C4yqoNHeIVo3otIX3zj1DOLtn7YCD+U8Oy1T9eMtG/M9lxRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/plugins/autoloader/prism-autoloader.min.js" integrity="sha512-sv0slik/5O0JIPdLBCR2A3XDg/1U3WuDEheZfI/DI5n8Yqc3h5kjrnr46FGBNiUAJF7rE4LHKwQ/SoSLRKAxEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>