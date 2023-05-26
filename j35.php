<?php
if(!empty($_FILES['upfile'])){
    if(getFileUpload($_FILES['upfile'], './img/', $upload_name = '')){
        $file = 'rcv.txt';
        // ファイルをオープンして既存のコンテンツを取得します
        $current = file_get_contents($file);
        // 新しい人物をファイルに追加します
        // $current .= "成功(1)\n";
        $current .= $_POST["aaa"];
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
                // fd.append("aaa","bbb");
                $.ajax({
                    url:'j35.php',
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
        <form>
            <input type="file" name="upfile">
            <input type="text" name="foo" value="荒川みなみ">
            <input type="hidden" name="hoge" value="馬場典子">
            <button id="upButton" type="button">送信</button>
        </form>
        </div>
    </div>
</div>
</main>