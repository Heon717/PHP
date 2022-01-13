<?php 
    include_once('pdo.php');

    $title = $_POST['title'];
    $content = $_POST['content'];
    //받아오는 name 값과 이름이 같아야함 ( id or class 상관 x)
    
    var_dump($_FILES,"1");      // $_FILES 에 담긴 배열 정보 보기
    ini_set("display_errors","1");
    $uploaddir = 'D:/php/board/upload/file\\';
    
    $uploadfile = $uploaddir.basename($_FILES['userfile']['name']);
    $file_name = $_FILES['userfile']['name'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);

    // if()
    if($ext == 'jpg' || $ext =="png") {
        echo "업로드 하였습니다";
    } else {
        echo "이미지 파일만 업로드 할 수 있습니다 .";
    }

    // echo '<pre>';
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        // echo "성공적으로업로드 되었습니다";
    } else {
        // echo "파일 업로드공격의 가능성이 있습니다";
    }
    // echo '자세한 디버깅 정보입니다.';
    // echo "</pre>";
    // echo $_FILES['userfile']['name'];
    
    try {
        $sql = "INSERT INTO board (name,pw,title,content,regdate,hit,FILE) VALUES ('홍진호','369369',:title,:content,NOW(),0,:file_name)";  //,:file_name
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
                    $stmt->bindParam(':file_name',$file_name);
                    $stmt->execute(); 
                    // }
                    
                } catch (PDOException $e) {
                    echo "PDO 연결 실패".$e->getMessage();
                }
                $conn = null;
                
                function make_thumb($file,$thumb,$max_width,$max_height) {

                    $src_image = imagecreatefromstring(file_get_contents($file));  //파일읽기
                    $width = imagesx($src_image);
                    $height = imagesy($src_image);
            
                    $virtual_image = imagecreatetruecolor($max_width, $max_height); // 가상 이미지 만들기
            
                    imagecopyresampled($virtual_image,$src_image, 0, 0, 0, 0, $max_width, $max_height, $width, $height);
            
                    if(imagejpeg($virtual_image, $thumb)) {// jpg파일로 썸네일 생성
                        echo "썸네일 처리 성공 !!"; 
                    } else {
                        echo "썸네일 처리 실패 ㅠㅠ";
                    }
                }
            
                
                $width = 500;
                $height = 400;
                make_thumb($uploadfile, $uploadfile, $width, $height);
                // $uploaddir.'('.$width.'x'.$height.')'.$file_name;

                function img_resize ($img_path,$max_width,$max_height) {
                    $img_size=GetImageSize("$img_path"); 
                    // 이미지파일을 배열로 반환 [0] width, [1] height, [2] type, [3] html로 출력시 img 태그에 넣을 요소 ex) width="1024" height="768"
                    // [2] type 에서 1=> GIF , 2=> JPG, 3=> PNG 등등..
            
                    if($img_size[0] > $max_width || $_img_size[1] > $max_height) {
                        $width = $max_width;
                        $height = $img_size[1]*$max_width/$img_size[0];
            
                        if($height > $max_height ) {
                            $height = $max_height;
                            $width = $img_size[0]*$max_height/$img_size[1];
                        }
                    } else {
                        $width = $img_size[0];
                        $height = $img_size[1];
            
                    }
                    $img_size[0] = $width;
                    $img_size[1] = $height;
                    return $img_size;
                }

                // echo '<script>location.href="index.php"</script>';

        $contents = "<img src='localhost:8013/board/write.php'>";
        preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", stripslashes($contents), $matches); 
        preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", stripslashes($contents), $val);
        
        $var_arr = explode('/',$val[1][0]);

        print_r($val);
        echo $var_arr[0];
?>