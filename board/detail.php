<?php 
    include('header.php');
    include_once("pdo.php");

    // echo $_SERVER['QUERY_STRING'];   // idx=i
    $idx = explode("=", $_SERVER['QUERY_STRING']);

    $sql = "SELECT * FROM board where idx = ? ";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$idx[1]]);                           // 쿼리 실행
    $result = $stmt->fetch(PDO::FETCH_ASSOC);   // 쿼리 결과 저장  
    
    $conn = null;
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>
<body>
<button onClick="history.back();">뒤로가기</button>
<h1>디테일 페이지</h1>
    <div>
        <hr>
        <div>
            <span width="70px"><?=$result['idx']?></span>
            <span width="500px"><?=$result['title']?></span>
            <span width="120px"><?=$result['name']?></span>
            <span width="100px"><?=$result['regdate']?></span>
            <span width="100px"><?=$result['hit']?></span>
        </div>
        <hr>
        <div>
            <?=$result['content']?>
        </div>
    </div>
</body>
</html>