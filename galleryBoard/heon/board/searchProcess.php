<?
    include_once($_SERVER['DOCUMENT_ROOT']."/heon/inc/pdo.php");

    $mod = $_POST['mod'];
    $text = $_POST['text'];
    $list_num = $_POST['list_num'];      
    $page_num = $_POST['page_num'];
    $page = $_POST['page'];
    $start = $_POST['start'];
    
    if($start == 0) {
        $start = ($page -1) * $list_num;
    }
    
    switch($mod) {
        case 1:
            {
                $sql = "SELECT * FROM tc_board WHERE board_id = 'notice2' ORDER BY idx desc limit $start,$list_num";
                $stmt = $pdo -> prepare($sql);
                $stmt -> execute();   
                
                while($rs = $stmt ->fetch()) {
                    $date = explode(' ',$rs['wdate']);
                    $wdate = $date[0];
                    echo "
                    <li>
                        <a href='detail.php?idx={$rs['idx']}'>
                            <div class='img_wrap'><img src='../img/{$rs['thumbnail']}'></div>
                            <div class='text_wrap'>
                                <div class='notice'>공지사항</div>
                                <div class='text_title'>{$rs['title']}</div>
                                <div class='text_day'>{$wdate}</div>
                            </div>
                        </a>
                    </li>
                ";
                }
            } break;
        case 2:
            {
                $sql = "SELECT title FROM tc_board WHERE title LIKE '%{$text}%' OR content LIKE '%{$text}%'";
                $stmt = $pdo -> prepare($sql);
                $stmt -> execute();
                $rs = $stmt -> fetchAll();

                print_r($rs);      
            } break;
    }
?>