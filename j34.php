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

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div id="content" style="margin:0 auto;">
    <div class="input-group">
        <label class="input-group-btn">
            <span class="btn btn-primary">
                Choose File<input type="file" style="display:none" onchange="changeFile(this);" id="tgtfile">
            </span>
        </label>
        <input type="text" class="form-control" readonly="">
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function changeFile(){
            var input = $("#tgtfile");
            numFiles = input.get(0).files ? input.get(0).files.length : 1;
            label = input.val().replace(/\\/g, '/');
            label =label.replace(/.*\//, '');
            // label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.parent().parent().next(':text').val(label);
        }
        // $(document).on('change', ':file', function() {
        //     var input = $(this);
        //     numFiles = input.get(0).files ? input.get(0).files.length : 1;
        //     label = input.val().replace(/\\/g, '/');
        //     label =label.replace(/.*\//, '');
        //     // label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        //     input.parent().parent().next(':text').val(label);
        // });
    </script>

</body>
</html>