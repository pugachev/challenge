<?php include 'header.php' ?>
<?php
$qfd=new QueryFemaleData();
$results = $qfd->getFemaleData();
?>
<style>
  .form {
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
        //チェックボックス全部の状態を感知
        $("input[name='bijin']").change(function(){
            //チェックボックス全部の選択状態を調べる
            $("input[name='bijin']").each(function(){
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
    });
</script>
  <main>
    <div class="container">
        <div class="form">
            <div class="bijin"><input type="checkbox" name="bijin" id="bijin0" class="bijin" value="0">馬場ちゃん</div>
            <div class="bijin"><input type="checkbox" name="bijin" id="bijin1" class="bijin" value="1">たにじー</div>
            <div class="bijin"><input type="checkbox" name="bijin" id="bijin2" class="bijin" value="2">秋田の巨人</div>
            <div class="bijin"><input type="checkbox" name="bijin" id="bijin3" class="bijin" value="3">その他</div>
            <hr>
            <input type="textarea" name="bijin" id="bijintext" style="width:50%;height:100px;"></textarea>
        </div>
    </div>
  </main>

<?php include 'footer.php' ?>