<?php 
    include('read.php');
    echo $_SERVER['QUERY_STRING'];
    $name = $_GET['name'];
    echo $name;
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
<h1>디테일 페이지</h1>
    <div>
        <div>
            <span width="70px">번호</span>
            <span width="500px">글제목</span>
            <span width="120px">글쓴이</span>
            <span width="100px">작성일</span>
            <span width="100px">조회수</span>
        </div>
        <div>
            글내용
        </div>
    </div>
</body>
</html>