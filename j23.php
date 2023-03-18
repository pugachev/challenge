<?php include 'header.php' ?>
<?php
$qfd=new QueryFemaleData();
$results = $qfd->getFemaleData();
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
        .design01 {
            width: 100%;
            text-align: center;
            border-collapse: collapse;
            border-spacing: 0;
        }
        .design01 th {
            padding: 10px;
            background: #e9faf9;
            border: solid 1px #778ca3;
        }
        .design01 td {
            padding: 10px;
            border: solid 1px #778ca3;
        }
</style>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 
    <script>
    $(function() {
        // $("#tgt").css('word-break','break-all');
        $("#tgt").css('word-break','break-word');
        // $("#tgt").css('width','300px');
        // $("#tgt").css('max-width','100%');
    });
</script>
  <main>
    <div class="container">
      <div class="wrap">
          <div class="content">
            <table class="XXX" style="width:300px;">
                <tr>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                </tr>
                <tr>
                    <td>D</td>
                    <td>E</td>
                    <td>F</td>
                </tr>
                <tr>
                    <td>G</td>
                    <td>H</td>
                    <td>I</td>
                </tr>
                <tr>
                    <td>J</td>
                    <td>K</td>
                    <td>
                        <div class="" id="tgt">12345678901234567890123456789012aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</div>
                    </td>
                </tr>
            </table>
          </div>
      </div>
    </div>
  </main>

<?php include 'footer.php' ?>