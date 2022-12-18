<?php
include __DIR__.'/lib/queryFemaleData.php';
// include __DIR__.'/model/femaleData.php';

$qfd=new QueryFemaleData();
$results = $qfd->getFemaleData();

?>
<?php include 'header.php' ?>
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
            //idとnameを書き換える
            div.find('select[id*=female]').attr('id','female'+(Number(groupCnt)));
            div.find('select[name*=female]').attr('name','female'+(Number(groupCnt)));
            //新たに用意したdivをボタンの1個上のfemale-groupを追加する
            //クラスは同じものが複数あるので一番最後のやつの後ろにコピーする
            $(div).insertAfter($('.female-group').eq(-1));     
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
                              <option value="<?php echo $data->getFemaleNumber(); ?>"><?php echo $data->getFemaleName() ?></option>
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

<?php include 'footer.php' ?>