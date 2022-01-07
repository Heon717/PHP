<?php 
    include_once('pdo.php');

    $title = $_POST['title'];
    $content = $_POST['content'];
    //받아오는 name 값과 이름이 같아야함 ( id or class 상관 x)
    
    try {
        $sql = "INSERT INTO board (name,pw,title,content,regdate,hit) VALUES ('홍진호','369369',:title,:content,NOW(),0)";
        $stmt = $conn->prepare($sql);    

        if ($title == '') {
            echo '<script>alert("글제목을 입력해주세요 !");</script>';
            echo '<script>history.back();</script>';
        } else if ($content == '') {
            echo '<script>alert("내용을 입력해주세요 !");</script>';
            echo '<script>history.back();</script>';
        } else {
            // $stmt->execute([$title,$content]);
            // $result = $stmt->fetch(PDO::FETCH_ASSOC);
            //  ***  위의 방식은 나중에 벨류 바인딩할 값이 많아질 때 비교하기가 어려워져서 bindParam을 사용

            $stmt->bindParam(':title',$title);
            $stmt->bindParam(':content',$content);
            $stmt->execute(); 
        }

    } catch (PDOException $e) {
        echo "PDO 연결 실패".$e->getMessage();
    }
    $conn = null;
    echo '<script>location.href="index.php"</script>';
?>