
<?php include 'function.php' ?>
<?php

if(!empty($_FILES['upfile'])){
    if(getFileUpload($_FILES['upfile'], './img/', $upload_name = '')){
        $file = 'rcv.txt';
        // ファイルをオープンして既存のコンテンツを取得します
        $current = file_get_contents($file);
        // 新しい人物をファイルに追加します
        // $current .= "成功(1)\n";
        $current .= $_POST["woman"]."\n";
        // 結果をファイルに書き出します
        file_put_contents($file, $current);
    }else{
        $file = 'people.txt';
        // ファイルをオープンして既存のコンテンツを取得します
        $current = file_get_contents($file);
        // 新しい人物をファイルに追加します
        $current .= "失敗(2)\n";
        // 結果をファイルに書き出します
        file_put_contents($file, $current);
    }
} else {
    $file = 'people.txt';
    // ファイルをオープンして既存のコンテンツを取得します
    $current = file_get_contents($file);
    // 新しい人物をファイルに追加します
    $current .= "失敗(3)\n";
    // 結果をファイルに書き出します
    file_put_contents($file, $current);
}

?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 
    <script type="text/javascript">
        $(function() {

            $('#upButton').on('click', function () {
                let $upfile = $('input[name="upfile"]');
                let fd = new FormData();
                fd.append("upfile", $upfile.prop('files')[0]);
                fd.append("woman",$('input[name="foo"]').val());
                $.ajax({
                    url:'j33.php',
                    type:'post',
                    data: fd,
                    processData: false,
                    contentType: false,
                    cache: false,
                }).done(function (data) {
                    // 成功時の処理
                    console.log(data);
                }).fail(function(data) {
                    // 失敗時の処理
                    console.log(data);
                });
            });
        });
    </script>
<main>
<div class="container">
    <div class="wrap">
        <div class="content">
            <!-- enctype="multipart/form-data"を指定  -->
            <!-- <form action="j33.php" method="post" enctype="multipart/form-data"> -->
            <form>
                <!-- ファイルサイズ上限  -->
                <input type="file" name="upfile" required>
                <input type="text" name="foo" value="荒川みなみ">
                <button id="upButton" type="button">送信</button>
            </form>
        </div>
    </div>
</div>
</main>