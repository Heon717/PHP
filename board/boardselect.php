<?php 
    include_once("pdo.php");

    $sql = "SELECT  * FROM board ORDER BY idx DESC";
    // $stmt = $conn->query($sql);
    $stmt = $conn->prepare($sql);
    $stmt->execute();                           // 쿼리 실행
    // $count = $stmt->rowCount();                 // 쿼리 카운트
    // echo $count;
    // $result = $stmt->fetch(PDO::FETCH_ASSOC);   // 쿼리 결과 저장
    // 만약에 쿼리 결과가 많을 것 같으면 
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);   // 쿼리 결과 한꺼번에 저장
    foreach($result as $row) {
        // print_r($row['name']."<br/>");
        // echo $row['name']."<br />\n";

        // 배열값을 보고 싶을때는 echo 말고 print_r();
    }
    $conn = null;
?>