<?php include 'header.php' ?>
<?php
$bijin = "";
$arraylist = [0=>"馬場ちゃん",1=>"たにじー",2=>"秋田の巨人",3=>"その他"];
if (isset($_POST['bijin']) && is_array($_POST['bijin'])) {
  $bijin= json_encode($_POST['bijin']);
}
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
      let js_array = JSON.parse('<?php echo $bijin; ?>');
      for(let i=0;i<js_array.length;i++){
        let tid="#bijin"+js_array[i];
        $(tid).prop("checked",true);
      }
    });
</script>
  <main>
    <div class="container">
      <?php
        foreach($arraylist as $key => $val){
          $id = "bijin" . $key;
          echo '<div class="bijin"><input type="checkbox" name="bijin[]" id="'.$id.'" class="bijin" value="'.$key.'">'.$val.'</div>';
        }
      ?>
    </div>
  </main>

<?php include 'footer.php' ?>