<?php

// $_FILESの内容を確認
print "<pre>";
print_r($_FILES);
print "</pre>";

if(! empty($_FILES)){

    $errorMsg = "";
    switch($_FILES["file_1"]["error"]){
        case 1:
            $errorMsg = "ファイルの容量が大きすぎます。";
            break;
        case 2:
            $errorMsg = "ファイルの容量が大きすぎます。";
            break;
        case 3:
            $errorMsg = "ファイルのアップロードに失敗しました。";
            break;
        case 4:
            $errorMsg = "ファイルのアップロードに失敗しました。";
            break;
    }
    // switch caseに入れなかったら変数内は空文字なのでこれでオッケー
    print $errorMsg;

    

    // アップロードされたファイルが存在するかを調べる
    if(is_uploaded_file($_FILES["file_1"]["tmp_name"])){
        // アップロードされたファイルにつけるファイル名を作成
        // $date = "img.jpg";
        // print_r($date);

        list($width, $hight) = getimagesize($_FILES["file_1"]["tmp_name"]); // 元の画像名を指定してサイズを取得
        $baseImage = imagecreatefromjpeg($_FILES["file_1"]["tmp_name"]); // 元の画像から新しい画像を作る準備
        $image = imagecreatetruecolor(414, 414 * $hight /$width); // サイズを指定して新しい画像のキャンバスを作成

        // 画像のコピーと伸縮
        imagecopyresampled($image, $baseImage, 0, 0, 0, 0, 414, 414 * $hight /$width, $width, $hight);
        
        // コピーした画像を出力
        imagejpeg($image , 'files/newImg.jpg');
        // move_uploaded_file('newImg.jpg',"files/{$fileName}");

        //日付の元のファイル
        // $fileName = "{$date}";

        // // アップロードしたファイルを移動させる
        // move_uploaded_file($_FILES["file_1"]["tmp_name"],"files/{$fileName}");

        header("Location:img_making.html");
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="keywords" content="ecc,ECC,ecc comp.,...">
  <meta name="description" content="ここに説明文を設定">  
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@twitteraccount">
  <meta property="og:site_name" content="サイト名">
  <meta property="og:title" content="サイトタイトル">
  <meta property="og:description" content="サイト説明文">
  <meta property="og:url" content="https://www.hogehoge.com">
  <meta property="og:image" content="https://www.hogehoge.com./hoge.jpg">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="600">
  <meta property="og:image:height" content="400">
  <meta property="og:type" content="website">
  <!-- <link rel="canonical" hreflang="http://">
  <link rel="alternate" type="" title="" href="http://"> スマホとPCで分ける時-->
  <link rel="shortcut icon" href="http://www.hoge.hoge/favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="apple-touch-icon" href="http://www.hoge.hoge/logo.png">
  <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
        <input type="file" name="file_1" value="">
        <button type="submit" name="">アップロード</button>
    </form>
  
</body>
</html>
<!-- img_making.html -->