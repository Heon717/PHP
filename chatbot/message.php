<?
    include_once($_SERVER['DOCUMENT_ROOT']."/clone/inc/pdo.php");

    $getMsg = $_POST['text'];
    // $getMsg = '';
    $sql = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMsg%'";
    $stmt= $pdo -> prepare($sql);
    $stmt->execute();
    $rs = $stmt -> fetch();
    
    print_r($rs['replies']);
?>