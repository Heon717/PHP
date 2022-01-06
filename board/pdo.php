<?php 
    header('Content-Type: text/html; charset=utf-8');

    $serverName = "localhost";
    $userName = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$serverName;dbname=boardexam;charset=utf8",$userName,$password);
                        // 서버지정 , 사용자 이름 , 사용자 암호
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "PDO 연결 성공<br/>";
    } catch (PDOException $e) {
        echo "PDO 연결 실패".$e->getMessage();
    }
?>
