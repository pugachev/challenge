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
            width:50%;
        }
        .inline{
            display: block;
            width: 300px;
            padding: 15px 0;
            margin: auto;
            background: #569f3c;
            color: #FFF;
            text-decoration: none;
            text-align: center;
        }
        .inline:hover{
            background: #225f0d;
        }
</style>
<script>
    $(document).ready(function(){
        // $(".inline").colorbox({inline:true, width:"50%"});
        $("#opendialog").click(function(){
            trigger();
            function trigger(){
                $('a.colorbox-trigger').colorbox({
                    inline: true,
                    maxWidth: '90%',
                    maxHeight: '70%',
                    open: true
                });
                $('a.colorbox-trigger').click();
            }
        });
    });
</script>
  <main>
    <div class="container">
        <p><input type="button" value="送信" id="opendialog" class="btns submit"></p>
        <!-- <p><button class='inline' onclick="href='#inline_contet'">モーダルダイアログ</button></p> -->
    </div>
    <p class="hidden"><a href="#inline_content" class="colorbox-trigger"></a></p>
    <!-- This contains the hidden content for inline calls -->
    <div style='display:none'>
        <div id='inline_content' class="colorbox-trigger" style='padding:10px; background:#fff;'>
        <p><strong>This content comes from a hidden element on this page.</strong></p>
        <p>The inline option preserves bound JavaScript events and changes, and it puts the content back where it came from when it is closed.</p>
        <p><a id="click" href="#" style='padding:5px; background:#ccc;'>Click me, it will be preserved!</a></p>
        
        <p><strong>If you try to open a new Colorbox while it is already open, it will update itself with the new content.</strong></p>
        <p>Updating Content Example:<br />
        <a class="ajax" href="../content/ajax.html">Click here to load new content</a></p>
        </div>
    </div>
  </main>

<?php include 'footer.php' ?>