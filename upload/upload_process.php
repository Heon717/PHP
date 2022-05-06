<?
    print_r($_FILES['myfile']);

    if(isset($_FILES)) {
        $name = $_FILES['myfile']['name'];
        $type = $_FILES['myfile']['type'];
        $size = $_FILES['myfile']['size'];
        $tmp_name = $_FILES['myfile']['tmp_name'];
        $error = $_FILES['myfile']['error'];

        $file = '../img/'.$name;
                    // move_uploaded_file(임시저장위치 , 옮길저장위치)
        $upload_result = move_uploaded_file($tmp_name,$file);

        if($upload_result) {
            echo " 파일 업로드 성공 경로 =" . $file;
        } else {
            echo " 첨부 된 파일이 없습니다.";
        }
    }
?>

<div>
    <a href="http://192.168.10.200/heon/upload/file_download.php?filepath=<?=$name?>">다운로드</a>
</div>