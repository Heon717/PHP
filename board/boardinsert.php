<?php 
    include_once('pdo.php');

    $title = $_POST['title'];
    $content = $_POST['content'];
    //받아오는 name 값과 이름이 같아야함 ( id or class 상관 x)
    
    try {
        $sql = "INSERT INTO board (name,pw,title,content,regdate,hit) VALUES ('홍진호','369369',?,?,NOW(),0)";
        $stmt = $conn->prepare($sql);    

        if ($title == '') {
            echo '<script>alert("글제목을 입력해주세요 !");</script>';
            echo '<script>history.back();</script>';
        } else if ($content == '') {
            echo '<script>alert("내용을 입력해주세요 !");</script>';
            echo '<script>history.back();</script>';
        } else {
            // $stmt = $conn->prepare($sql);    
            $stmt->execute([$title,$content]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }

    } catch (PDOException $e) {
        echo "PDO 연결 실패".$e->getMessage();
    }
    $conn = null;
    echo '<script>location.href="index.php"</script>';
?>