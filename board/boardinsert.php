<?php 
    include_once('pdo.php');

    $title = $_POST['title'];
    $content = $_POST['content'];
    //받아오는 name 값과 이름이 같아야함 ( id or class 상관 x)
    
    // var_dump($_FILES,"1");      // $_FILES 에 담긴 배열 정보 보기
    // ini_set("display_errors","1");
    // $uploaddir = 'D:/php/board/upload/file\\';
    
    // $uploadfile = $uploaddir.basename($_FILES['userfile']['name']);
    // $file_name = $_FILES['userfile']['name'];
    // $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    // echo $ext;
    // if($ext == 'jpg' || $ext =="png") {
    //     echo "업로드 하였습니다";
    // } else {
    //     echo "이미지 파일만 업로드 할 수 있습니다 .";
    // }

    // echo '<pre>';
    // if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    //     // echo "성공적으로업로드 되었습니다";
    // } else {
    //     // echo "파일 업로드공격의 가능성이 있습니다";
    // }
    // // echo '자세한 디버깅 정보입니다.';
    // // echo "</pre>";
    // // echo $_FILES['userfile']['name'];
    
    try {
        $sql = "INSERT INTO board (name,pw,title,content,regdate,hit) VALUES ('홍진호','369369',:title,:content,NOW(),0)";  //,:file_name
        $stmt = $conn->prepare($sql);    

        // if ($title == '') {
        //     echo '<script>alert("글제목을 입력해주세요 !");</script>';
        //     echo '<script>history.back();</script>';
        // } else if ($content == '') {
        //     echo '<script>alert("내용을 입력해주세요 !");</script>';
        //     echo '<script>history.back();</script>';
        // } else {
            // $stmt->execute([$title,$content]);
            // $result = $stmt->fetch(PDO::FETCH_ASSOC);
            //  ***  위의 방식은 나중에 벨류 바인딩할 값이 많아질 때 비교하기가 어려워져서 bindParam을 사용

            $stmt->bindParam(':title',$title);
            $stmt->bindParam(':content',$content);
            // $stmt->bindParam(':file_name',$file_name);
            $stmt->execute(); 
        // }

    } catch (PDOException $e) {
        echo "PDO 연결 실패".$e->getMessage();
    }
    $conn = null;

    echo '<script>location.href="index.php"</script>';
?>