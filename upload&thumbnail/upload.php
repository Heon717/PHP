<?
    include_once($_SERVER['DOCUMENT_ROOT']."/heon/inc/pdo.php");
    define('limit_width',450);
    define('limit_height',450);
    
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $userfile = $_POST['userfile'];
    // $uploaddir = './img/';
    // $dir = "./img/";
    // if(is_dir($dir)) {
        //     mkdir($dir,777);
        // } 
        
        // 실제 파일명
        $fileName = $_FILES['userfile1']['name'];
        $file_type = $_FILES['userfile1']['type'];
        $file_size = $_FILES['userfile1']['size'];
        $wdate = date("Y-m-d");
        $wdate_time = date("Y-m-d H:i:s");
        
        if(!empty($fileName)) {
            $baseDownFolder = '../org_img/';
            
        // 파일 확장자 체크
        $nameArr = explode('.',$fileName);
        $extension = $nameArr[sizeof($nameArr) -1];
        
        // 임시 파일명 (현재시간_랜덤수.파일확장자)
        $tmp_filename = time().'_'.mt_rand(0,99999).'.'.strtolower($extension);
        
        // 저장 파일명 (실제파일명@@@임시명)
        $thumbnail = $fileName.'@@@'.$tmp_filename;
        $thumbnail_file = '../img/'.$fileName.'@@@'.$tmp_filename;
        
        if(!move_uploaded_file($_FILES['userfile1']["tmp_name"], $baseDownFolder.$fileName)) {
            echo "이미지 업로드 실패 ㅠㅠ ";
        } else {
            echo "이미지 업로드 성공 !!";
            // echo "<img src='$thumbnail_file'>";
        }
        
        // 파일 권한 변경
        // chmod($baseDownFolder.$tmp_filename,0735);
    }
    
    resize_img('../org_img/'.$fileName,$thumbnail_file,350,350);
    // resize_img('../org_img/'.$fileName,$thumbnail_file,limit_width,limit_height);
    
    // 리사이징 함수
    // resize_img(원본파일명,대상파일명,가로크기,세로크기)
    function resize_img($file,$newfile,$width,$height) {
        list($w,$h) = getimagesize($file);

        //// 가로길이가 limit 보다 크거나 세로길이가 limit 보다 클 경우
        // if($w>limit_width || $h > limit_height) {
        //     if($w<$h) {
        //         $sumw = (100*limit_height)/$h;
        //         $img_width = ceil($w*$sumw/100);
        //         $img_height = limit_height;
        //     } else {
        //         $sumh = (100*limit_width)/$w;
        //         $img_height = ceil($h*$sumh/100);
        //         $img_width = limit_width;
        //     }
        // } else {
        //     $img_width = $w;
        //     $img_height = $h;
        // }
        ////

        if(strpos(strtolower($file), ".jpg")) {
            $src = imagecreatefromjpeg($file);
        } else if (strpos(strtolower($file),".png")) {
            $src = imagecreatefrompng($file);
        } else if (strpos(strtolower($file),".gif")) {
            $src = imagecreatefromgif($file);
        }
        $virtual_image = imagecreatetruecolor($width,$height);
        imagecopyresampled($virtual_image, $src, 0, 0, 0, 0, $width, $height, $w, $h);
        // imagecopyresampled($virtual_image, $src, 0, 0, 0, 0, $img_width, $img_height, $w, $h);

        if(strpos(strtolower($newfile),".jpg")) {
            imagejpeg($virtual_image,$newfile);
        } else if(strpos(strtolower($newfile),".png")) {
            imagepng($virtual_image,$newfile);
        } else if(strpos(strtolower($newfile),".gif")) {
            imagegif($virtual_image,$newfile);            
        }
    }
    // attach 추가해야함
    $sql = "INSERT INTO tc_board (board_id,grp_idx,step,seq,id,name,title,content,thumbnail,wdate,read_count,tail_count,noti,site_code,category,si_key,gu_key,del) VALUES ('notice2',0,0,0,'{$user_id}','{$user_name}','{$title}','{$content}','{$thumbnail}','{$wdate_time}',0,0,0,0,0,0,0,0)";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();

    if(!isset($userfile)) {
        $sql = "INSERT INTO tc_board_file (board_id,ref_idx,file_type,org_file,sav_file,file_size,mime_type,dn,wdate) VALUES (0,0,0,'{$fileName}','{$thumbnail}','{$file_size}',0,0,'{$wdate}')";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute();
    }

    echo "<script>location.href = './gallery.php'</script>";
?>