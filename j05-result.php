<?php include 'header.php' ?>
<?php
$qfd=new QueryFemaleData();
$results = $qfd->getFemaleData();

$arraylist = [0=>"Dカップ以上",1=>"美脚",2=>"スレンダー",3=>"その他"];
$checkboxlist = json_encode($arraylist);
//PHP→javascriptへ渡すjson変数
$femalses = "";
$marriged = "";
$features = "";
$bijintext = "";
//selectboxの受信
$rcvfemales = [];
foreach($_POST as $key => $value){
  if( preg_match('/female/',$key)){
    $rcvfemales[] = array($key,$value);
  }
}
if(isset($rcvfemales) && !empty($rcvfemales)){
  $femalses = json_encode($rcvfemales);
}

//radiobuttonの受信
if(isset($_POST['marriged'])) {
  $marriged = json_encode($_POST['marriged']);
}

//checkboxの受信
if (isset($_POST['bijin']) && is_array($_POST['bijin'])) {
  $features= json_encode($_POST['bijin']);
}

if (isset($_POST['bijintext']) && !empty($_POST['bijintext'])) {
  $bijintext= json_encode($_POST['bijintext']);
  //受信した配列 '["1","2"]'
}
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
      width:50%;
  }

  .raidozone>label{
    margin-top: 30px;
    display: inline-block;
    padding: 5px;
    font-size: 20px;
    cursor: pointer;
  }
  .raidozone>label:hover{
      color: red;
  }
  .raidozone>label>input{
      margin-right: 5px;
      cursor: pointer;
  }
  .checkboxzone {
    display: flex;
    flex-direction: column;
    margin: 30px auto;
  }

  /** 部品側の定義 */
  .bijin {
    text-align: center;
    display: flex;
    align-items: center;
    font-size: 24px;
  }
</style>
<script>
    $(document).ready(function(){
      //セクレトボックスの再現
      let femalses_array = JSON.parse('<?php echo $femalses; ?>');
      console.log(femalses_array);
      for(let i=0;i<femalses_array.length;i++){
        if(i>0){
          addSelectBox();
          console.log('addSelectBox()='+i);
        }
        let tid="#"+femalses_array[i][0];
        $(tid).val(femalses_array[i][1]);
        console.log(i);
      }
      //ラジオボタンの再現
      let marriged_array = JSON.parse('<?php echo $marriged; ?>');
      $('input[name=marriged]:eq('+marriged_array+')').prop('checked',true);

      //チェックボックスの再現
      let features_array = JSON.parse('<?php echo $features; ?>');
      //パースした配列 (2) ['1', '2']
      for(let i=0;i<features_array.length;i++){
        let tid="#bijin"+features_array[i];
        $(tid).prop("checked",true);
      }

      //テキストボックの再現
      $('#bijintext').val(JSON.parse('<?php echo $bijintext; ?>'));

      //全てをdisabledにする
      //セレクトボックスをdisalbed
      for(let i=0;i<$("#female-groups > .female-group").length;i++){
        if(i==0){
          $('#female').prop('disabled',true);
        }else{
          $('#female'+i).prop('disabled',true);
        }
      }

      //ラジオボタンをdisabled
      for(let i=0;i<$('input[name=marriged]').length;i++){
        $('input[name=marriged]:eq('+i+')').prop('disabled',true);
      }

      //チェックボックスをdisabled
      let checkboxlist = JSON.parse('<?php echo $checkboxlist; ?>');
      for(let i=0;i<checkboxlist.length;i++){
        let tid="#bijin"+i;
        $(tid).prop("disabled",true);
      }

      //テキストエリアをdisabled
      $('#bijintext').prop('disabled',true);
    });

    function addSelectBox(){
      //現在のfemale-groupsの長さを取得する
      let groupCnt = $("#female-groups > .female-group").length;
      //ボタンの1個上ののfemale-groupをコピーする(中身は同じはず)
      //クラスは同じものが複数あるので一番最後のやつをコピーする
      // let div =  $(this).prev().find('.female-group').eq(-1).clone(true);
      let div =  $("#female-groups > .female-group").eq(0).clone(true);
      //idとnameを書き換える
      div.find('select[id*=female]').attr('id','female'+(Number(groupCnt)));
      div.find('select[name*=female]').attr('name','female'+(Number(groupCnt)));
      //新たに用意したdivをボタンの1個上のfemale-groupを追加する
      //クラスは同じものが複数あるので一番最後のやつの後ろにコピーする
      $(div).insertAfter($('.female-group').eq(-1));
    }

</script>
  <main>
  <div class="container">
        <div class="wrap">
            <div class="content">
                <div id="female-groups" style="display:flex;flex-flow: column;">
                    <div class="female-group">
                        <select id="female" name="female" style="width:200px;height: 30px;font-size:20px;margin-bottom:30px;">
                            <?php foreach($results as $data): ?>
                                <option value="<?php echo $data['id']; ?>"><?php echo $data['value']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div id="tgt"></div>
                <div class="raidozone">
                    <label><input type="radio" name="marriged" value=0>既婚</label>
                    <label><input type="radio" name="marriged" value=1>未婚</label>
                    <label><input type="radio" name="marriged" value=2>不明</label>
                </div>
                <div class="checkboxzone">
                  <?php
                    foreach($arraylist as $key => $val){
                      $id = "bijin" . $key;
                      echo '<div class="bijin"><input type="checkbox" name="bijin[]" id="'.$id.'" class="bijin" value="'.$key.'">'.$val.'</div>';
                    }
                  ?>
                  <hr>
                  <input type="textarea" name="bijintext" id="bijintext" style="width:100%;height:100px;"></textarea>
                </div>
            </div>
        </div>
    </div>
  </main>

<?php include 'footer.php' ?>