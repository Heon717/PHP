<?
    include_once($_SERVER['DOCUMENT_ROOT']."/clone/inc/pdo.php");

    $getMsg = $_POST['text'];
    // $sql = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMsg%'";
    // $stmt= $pdo -> prepare($sql);
    // $stmt->execute();
    // $rs = $stmt -> fetch();
    
    // print_r($rs['replies']);

    $sql = "SELECT * FROM chatbot WHERE queries LIKE '%$getMsg%'";
    $stmt= $pdo -> prepare($sql);
    $stmt->execute();
    $rs = $stmt -> fetch();
    
    // print_r($rs['replies']);
    $jsonData = json_encode($rs,JSON_UNESCAPED_UNICODE);
    print_r($jsonData);
?>