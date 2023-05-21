
<?php include 'function.php' ?>
<?php

if(!empty($_FILES['userfile']) && getFileUpload($_FILES['userfile'], './img/', $upload_name = '')){
    echo "成功";
} else {
 echo "失敗";
}

?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 
    <script type="text/javascript">
        $(function() {
            let $upfile = $('input[name="upfile"]');
            let fd = new FormData();
            fd.append("upfile", $upfile.prop('files')[0]);
            $('#upButton').on('click', function () {
                $.ajax({
                    url:'j33.php',
                    type:'post',
                    data: fd,
                    processData: false,
                    contentType: false,
                    cache: false,
                }).done(function (data) {
                    // 成功時の処理
                }).fail(function() {
                // 失敗時の処理
                });
            });
        });
    </script>
<main>
<div class="container">
    <div class="wrap">
        <div class="content">
            <!-- enctype="multipart/form-data"を指定  -->
            <form action="j33.php" method="post" enctype="multipart/form-data">
                <!-- ファイルサイズ上限  -->
                <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                <input type="file" name="userfile" required>
                <input type="submit">
            </form>
        </div>
    </div>
</div>
</main>
<?php include 'footer.php' ?>