<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    ini_set("display_errors","1");
    $uploaddir = 'C:\BitNami\wampstack-8.1.1-0\apache2\htdocs\upload\file\\';
    $uploadfile = $uploaddir.basename($_FILES['userfile']['name']);

    echo '<pre>';
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        echo "성공적으로업로드 되었습니다";
    } else {
        echo "파일 업로드공격의 가능성이 있습니다";
    }
    print_r($_FILES);
?>
</body>
</html>