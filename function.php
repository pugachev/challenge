<?php
function getFileUpload($file_data, $target_path, $upload_name = '')
{
    // ファイルの有無
    if (empty($file_data)) {
        return FALSE;
    }

    // 0は成功、それ以外は失敗
    if ($file_data['error'] != '0') {
        return FALSE;
        
    }

    // 存在チェック
    if (! file_exists($target_path)) {
        return FALSE;
    }

    try {
        // アップロード後のファイル名が未定義の場合は元ファイルと同じに
        if (empty($upload_name)) {
            $upload_name = $file_data['name'];
        }
        // アップロード後のファイルの移動先
        $destination = $target_path . $upload_name;
        // テンポラリからファイルを移動
        move_uploaded_file($file_data['tmp_name'], $destination);
    } catch (Exception $e) {
        return FALSE;
    }

    return TRUE;
}
?>