<?php include 'header.php' ?>
<style>

</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/dubrox/Multiple-Dates-Picker-for-jQuery-UI@master/jquery-ui.multidatespicker.js"></script>
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script>
    $(function() {
      var y = new Date().getFullYear();
      $('#altField').multiDatesPicker({
        defaultDate: 'yyyy-mm-dd',
      });

      $('#ui-datepicker-div > div > div.ui-datepicker-title').on('click',function(){
        alert('テストアラート');
      });
      $('#altField2').on('click',function(){
        alert('aaa');
      });
      $(".type1").click(function(){
        alert("Click");
      });  
    });

    // var y = new Date().getFullYear();
    //   $('#altField').multiDatesPicker({
    //     defaultDate: 'yyyy-mm-dd',
    //     numberOfMonths: [3, 4],
    //     firstDay: '4-1'+y,
    //   });
    // jQuery(document).on('cred_form_ready', function(){
    //   $('#altField').multiDatesPicker({
    //     defaultDate: 'yyyy-mm-dd',
    //   });
    // });
</script>
  <main>
    <div class="container">
      <input type="text" id="altField" />
      <input type="text" id="altField2" />
      <input type="text" value="Click" class="type1">(type1クラス指定あり)<br>
    </div>
  </main>

<?php include 'footer.php' ?>