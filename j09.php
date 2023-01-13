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

        $('#age').change(function(){
            let age = $('select[name="age"] option:selected').val();
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
                    //nameセレクトボックスの作成方法
                    //1.現在のnodeを削除する
                    // $('#female').remove();
                    //2.受信た配列用のjsonデータでセレクトボックスを作成する
                    // let optionList = [];
                    let optionList = JSON.parse(data);
                    $('#female > option').remove();
                    var select = $('#female');
                    for(var i in optionList){
                        
                        $("#female").append("<option value=" +optionList[i].id + ">" + optionList[i].value +  "</option>");
                    }
                    // $.each(optionList, function(id, value) {
                    //     var option = $('<option>')
                    //     .text(obj['id'])
                    //     .val(obj['value']);
                    //     select.append(option);
                    // });
                    // var keys = Object.keys(optionCntList);
                    // keys.forEach(function(key, i){
                    //     /// option要素を動的に生成＆追加
                    //     var content = this[key];
                    //     var option = $('<option>')
                    //     .text(content['id'])
                    //     .val(content['value']);
                    //     select.append(option);
                    //     console.log(option);
                    // }, optionCntList);
                    //3.female-groupに作成したセレクトボックスをつける

                    // console.log('送信済'+JSON.parse(data));
                    // $('select[name="female"]').val(data.result);
                    // $('select[name="age"]').val(age);
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

