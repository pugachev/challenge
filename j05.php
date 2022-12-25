<?php include 'header.php' ?>
<?php
$qfd=new QueryFemaleData();
$results = $qfd->getFemaleData();
$arraylist = [0=>"Dカップ以上",1=>"美脚",2=>"スレンダー",3=>"その他"];
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
        $("#addSelect").on('click',function(){
            //現在のfemale-groupsの長さを取得する
            let groupCnt = $("#female-groups > .female-group").length;
            //ボタンの1個上ののfemale-groupをコピーする(中身は同じはず)
            //クラスは同じものが複数あるので一番最後のやつをコピーする
            let div =  $(this).prev().find('.female-group').eq(-1).clone(true);
            //idとnameを書き換える
            div.find('select[id*=female]').attr('id','female'+(Number(groupCnt)));
            div.find('select[name*=female]').attr('name','female'+(Number(groupCnt)));
            //新たに用意したdivをボタンの1個上のfemale-groupを追加する
            //クラスは同じものが複数あるので一番最後のやつの後ろにコピーする
            $(div).insertAfter($('.female-group').eq(-1));     
        });


        //チェックボックス全部の状態を感知
        $("input[name='bijin[]']").change(function(){
            //チェックボックス全部の選択状態を調べる
            $("input[name='bijin[]']").each(function(){
                //「その他」のチェックのON/OFFを知らべる
                let bijin3_status = $("#bijin3").prop("checked") ? 1 : 0;
                //「その他」がチェックされている場合
                if(bijin3_status){
                    $("#bijin0").prop("disabled","true");
                    $("#bijin1").prop("disabled","true");
                    $("#bijin2").prop("disabled","true");
                    $("#bijintext").prop("disabled","true");
                    $("#bijintext").val("");
                    return false;
                }else{
                    //「その他」がチェックされていない場合初期化する
                    $("#bijin0").removeAttr('disabled');
                    $("#bijin1").removeAttr('disabled');
                    $("#bijin2").removeAttr('disabled');
                    $("#bijintext").removeAttr('disabled');
                    //「その他」以外がチェックされた場合の措置
                    if($("#bijin0").prop("checked") || $("#bijin1").prop("checked") || $("#bijin2").prop("checked")){
                        $("#bijin3").prop("disabled","true");
                    }else{
                        //「その他」以外がチェックされていない場合の措置
                        $("#bijin3").removeAttr('disabled');
                    }
                    return false;
                }
            });
        });

        //
    });
</script>
  <main>
    <div class="container">
      <form action ="j05-result.php" method="post">
        <div class="wrap">
            <div class="content">
                <div id="female-groups" style="display:flex;flex-flow: column;">
                    <div class="female-group">
                        <select id="female" name="female" style="width:200px;height: 30px;font-size:20px;margin-bottom:30px;">
                            <?php foreach($results as $data): ?>
                                <option value="<?php echo $data->getFemaleNumber(); ?>"><?php echo $data->getFemaleName() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <input type="button" value="+" id="addSelect">
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


                <input type="submit" value="送信"/>
            </div>
            
        </div>
        
      </form>
    </div>
  </main>

<?php include 'footer.php' ?>