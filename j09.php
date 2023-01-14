<?php include 'header.php' ?>
<?php
$qfd=new QueryFemaleData();
$results = $qfd->getFemaleData();
$qad=new QueryAgeData();
$agelist = $qad->getAgeData();
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
</style>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 
    <script>
    $(function() {

        $("#addSelect").on('click',function(){
            //現在のfemale-groupsの長さを取得する
            let groupCnt = $("#female-groups > .female-group").length;
            //ボタンの1個上ののfemale-groupをコピーする(中身は同じはず)
            //クラスは同じものが複数あるので一番最後のやつをコピーする
            let div =  $(this).prev().find('.female-group').eq(-1).clone(true);
            //femalセレクトボックスのidとnameを書き換える
            div.find('select[id*=female]').attr('id','female'+(Number(groupCnt)));
            div.find('select[name*=female]').attr('name','female'+(Number(groupCnt)));
            //ageセレクトボックスのidとnameを書き換える
            div.find('select[id*=age]').attr('id','age'+(Number(groupCnt)));
            div.find('select[name*=age]').attr('name','age'+(Number(groupCnt)));
            //新たに用意したdivをボタンの1個上のfemale-groupを追加する
            //クラスは同じものが複数あるので一番最後のやつの後ろにコピーする
            $(div).insertAfter($('.female-group').eq(-1));     
        });

        //すべての年代セレクトボックスの状態を感知
        $('select[name*=age]').change(function(){
            //現在の最後の1文字を切り出す
            let lastnum = $(this)[0].name.slice(-1);
            let tgtselectage ='';
            let tgtselectname = '';
            let age = '';
            if(lastnum >=1){
                tgtselectage ='age'+lastnum;
                tgtselectname = 'female'+lastnum;
                age = $('select[name="'+tgtselectage+'"] option:selected').val();
            }else{
                tgtselectage ='age';
                tgtselectname = 'female';
                age = $('select[name="age"] option:selected').val();
            }

            var data = {
                "age": age
            }
            $.ajax({
                    beforeSend: function(xhr){
                        xhr.overrideMimeType("text/html;charset=UTF-8");
                    },
                    type: "POST",
                    url: "restapibyage.php",
                    data: age
                }).done(function(data){
                    //nameセレクトボックスの作成
                    let optionList = JSON.parse(data);
                    let tmp = '#'+tgtselectname+' > option';
                    $(tmp).remove();
                    var select = $('#'+tgtselectname);
                    for(var i in optionList){
                        $('#'+tgtselectname).append("<option value=" +optionList[i].id + ">" + optionList[i].value +  "</option>");
                    }
                }).fail(function(XMLHttpRequest, status, e){
                    console.log(XMLHttpRequest);
                });

        });

    });
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
                      <select id="age" name="age" style="width:200px;height: 30px;font-size:20px;margin-bottom:30px;">
                          <?php foreach($agelist as $age): ?>
                              <option value="<?php echo $age->getAgeValue(); ?>"><?php echo $age->getAgeDisp(); ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
              </div>
              <input type="button" value="+" id="addSelect">
          </div>
          <div id="tgt"></div>
      </div>
    </div>
  </main>

