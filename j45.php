<?php include 'header.php' ?>
<?php
$qfd=new QueryFemaleData();
$results = $qfd->getFemaleData();
// $tgt = "これが<p>文章となります</p>";
// $tgt = "これが<font id='tgt' color='red'>文章</font>となります";

$tgt = "当日個室料 5555円\n請求時の案内：アレルギーについて、全員生魚は食べれますか？";
//         $tgt = str_replace($tgt,"あああ",10,0);
    //    echo $tgt.PHP_EOL;
       
    //   echo mb_strpos($tgt,"請求時の案内").PHP_EOL;
      
      $result = mb_str_split($tgt,12);
      
//    echo $result[0].PHP_EOL;
//    echo $result[1].PHP_EOL;
   
   $result = $result[0].'<p id="tgt">'.$result[1].'</p>'.PHP_EOL;

?>
<style>
        .wrap {
            display:flex;
            flex-flow: column;
            height:300px;
            margin:0 0 1em;
        }
        .content {
            padding:1em;
            margin:0.5em auto;
            width:80%;
        }

        table{
        width: 100%;
        border-collapse:separate;
        border-spacing: 0;
        }

        table th:first-child{
        border-radius: 5px 0 0 0;
        }

        table th:last-child{
        border-radius: 0 5px 0 0;
        border-right: 1px solid #3c6690;
        }

        table th{
        text-align: center;
        color:white;
        background: linear-gradient(#829ebc,#225588);
        border-left: 1px solid #3c6690;
        border-top: 1px solid #3c6690;
        border-bottom: 1px solid #3c6690;
        box-shadow: 0px 1px 1px rgba(255,255,255,0.3) inset;
        width: 25%;
        padding: 10px 0;
        }

        table td{
        text-align: center;
        border-left: 1px solid #a8b7c5;
        border-bottom: 1px solid #a8b7c5;
        border-top:none;
        box-shadow: 0px -3px 5px 1px #eee inset;
        width: 25%;
        padding: 10px 0;
        }

        table td:last-child{
        border-right: 1px solid #a8b7c5;
        }

        table tr:last-child td:first-child {
        border-radius: 0 0 0 5px;
        }

        table tr:last-child td:last-child {
        border-radius: 0 0 5px 0;
        }
</style>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 
    <script>
    $(function() {
        // let tmp = 'CoCo壱カレー';
        // test(`${tmp}`+'を食べるぞー');
        // test(tmp+'を食べるぞー');
        // var col_no = $("table th").index(this);
        // // $("td:contains('東京都')").parent('tr').css('fontSize','1.1em');
        // //2カラム目の面積を太字にする
        // $('table tr').eq(2).children('td').eq(1).css('fontSize','1.5em');
        // // $('table tr').eq(2).children('td').eq(3).before(maketooltip($('table tr').eq(2).children('td').eq(3)[0]));

        // $('table tr').eq(2).children('td').eq(3).click(function(){
        //     // ここにクリックしたら発火する処理を記述する
        //     alert('Hello World!');
        // });
        // let pos = $("#tgt").text().indexOf("文章");
        // console.log($("#tgt").text().slice(pos));
        $("#tgt").css("color","red");

    });
    function test(tmp){
        console.log(tmp);
    }
    // function maketooltip(result){
    //     // ツールチップ作成
    //     let tooltip = document.createElement('div');
    //     tooltip.innerText = 'Copied';
    //     tooltip.classList.add('tooltip');
    //     tooltip.onclick="alert('Hello')";
    //     tooltip.style.left = result.getBoundingClientRect().left + 10 + "px";
    //     tooltip.style.top = result.getBoundingClientRect().top - 35 + "px";
    //     return tooltip;
    // }
</script>
  <main>
    <div class="container">
      <div class="wrap">
          <div class="content">
            <table>
                <tr>
                    <th>都道府県</th>
                    <th>面積</th>
                    <th>人口</th>
                    <th>人口密度</th>
                </tr>
                <tr>
                    <td>愛知県</td>
                    <td>5,172km2</td>
                    <td>7,526,911人</td>
                    <td>1,455人/km2</td>
                </tr>
                <tr>
                    <td>東京都</td>
                    <td>2,193km2</td>
                    <td><?php echo $result; ?></td>
                    <td>6,263人/km2</td>
                </tr>
                <tr>
                    <td>大阪府</td>
                    <td>1,905km2</td>
                    <td>8,831,642人</td>
                    <td>4,635人/km2</td>
                </tr>
            </table>
         </div>
      </div>
    </div>
  </main>

<?php include 'footer.php' ?>