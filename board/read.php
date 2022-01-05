<?php 
    include_once("pdo.php");

    // echo $_SERVER['QUERY_STRING'];   // idx=i
    $idx = explode("=", $_SERVER['QUERY_STRING']);


    $sql = "SELECT * FROM board where idx = ? ";
    // $stmt = $conn->query($sql);
    $stmt = $conn->prepare($sql);
    $stmt->execute([$idx[1]]);                           // 쿼리 실행
    // $count = $stmt->rowCount();                 // 쿼리 카운트
    $result = $stmt->fetch(PDO::FETCH_ASSOC);   // 쿼리 결과 저장  
    
    echo "<script>location.href='detail.php?idx='.$idx[1]</script>";
    $conn = null;
?>