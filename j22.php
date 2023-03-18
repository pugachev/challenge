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
table
            tr
                th 都道府県 /th
                th 面積 /th
                th 人口 /th
                th 人口密度 /th
            /tr
            tr
                td 愛知県 /td
                td 5,172km2 /td
                td 7,526,911人 /td
                td 1,455人/km2 /td
            /tr
            tr
                td 東京都 /td
                td 2,193km2 /td←◆ここがターゲット
                td 13,742,906人 /td
                td 6,263人/km2 /td
            /tr
            tr
                td 大阪府 /td
                td 1,905km2 /td
                td 8,831,642人 /td
                td 4,635人/km2 /td
            /tr>
 /table

 [jQuery側の処理]
 $('table tr').eq(2).children('td').eq(1).css('fontSize','1.5em');
 ・上から3番目のtr(横の行)
 ・trの子供であるtdを指定する
 ・2番目(eq(1))を指定
 ここでは「2,193km2」がターゲット

</code></pre>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/components/prism-core.min.js" integrity="sha512-TbHaMJHEmRBDf9W3P7VcRGwEmVEJu7MO6roAE0C4yqoNHeIVo3otIX3zj1DOLtn7YCD+U8Oy1T9eMtG/M9lxRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/plugins/autoloader/prism-autoloader.min.js" integrity="sha512-sv0slik/5O0JIPdLBCR2A3XDg/1U3WuDEheZfI/DI5n8Yqc3h5kjrnr46FGBNiUAJF7rE4LHKwQ/SoSLRKAxEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>