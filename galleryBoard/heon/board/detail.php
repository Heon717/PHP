<?
    include_once($_SERVER['DOCUMENT_ROOT']."/heon/inc/header.php");
    
    $idx = $_GET['idx'];
    $stmt = $pdo -> prepare("SELECT * FROM tc_board WHERE idx = {$idx}");
    $stmt -> execute();
    $rs = $stmt -> fetch();
    $date = explode(" ",$rs['wdate']);

    $title = $rs['title'];
    $content = $rs['content'];
    $thumbnail = $rs['thumbnail'];
    $wdate = $date[0];

?>
<style>
    #detail_container {
        width: 1200px;
        height: 100%;
        margin: 0 auto;
    }

    .detail_header {
        /* position: relative; */
        box-sizing: border-box;
        height: 150px;
        padding: 50px;
    }

    .detail_title{
        float: left;
        font-size: 28px;
        font-weight: bold;
    }

    .detail_wdate{
        position: relative;
        top:10px;
        float: right;
    }
    
    .detail_img{
        display: block;
        margin: 0 auto;
        margin-top: 120px;
    }

    .detail_text {
        margin: 100px 0 120px 0;
        font-size: 18px;
    }

    .hr{
        width: 100%;
        height: 1px;
        /* margin-bottom: 80px; */
        background-color: grey;
    }
    .btn_wrap{
        text-align: center;
    }

    .boardBtn{
        width: 255px;
        height: 45px;
        margin-top: 60px;
        background-color: gray;
        border: 1px solid #fff;
        font-size: 24px;
        font-weight: bold;
        color: #fff;
        text-align: center;
    }

    .board_prev_next{
        width: 100%;
        height: 200px;
        margin: 60px 0 200px 0;
    }

    .board_prev , .board_next{
        height: 50%;
        cursor: pointer;
    }

    .prev , .next {
        width: 10%;
        height: 100%;
        float: left;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        padding-top:35px;
        box-sizing: border-box;
    }
    .prev_text , .next_text {
        width: 10%;
        height: 100%;
        float: left;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        padding-top:35px;
        box-sizing: border-box;
    }
    .prev_title , .next_title {
        width: 65%;
        height: 100%;
        float: left;
        text-align: center;
        padding-top:35px;
        box-sizing: border-box;
    }
    .date{
        width: 15%;
        height: 100%;
        float: right;
        text-align: center;
        padding:35px;
        box-sizing: border-box;
    }
    #no {
        cursor: auto;
    }
</style>
<?
    // 이전글 , 다음글 SQL 문
    $pn_sql = "SELECT * FROM tc_board WHERE idx IN((SELECT idx from tc_board where idx < {$idx} ORDER by idx desc LIMIT 1),(SELECT idx from tc_board where idx > {$idx} ORDER by idx LIMIT 1))";
    $pn_stmt = $pdo -> prepare($pn_sql);
    $pn_stmt -> execute();
    $prev_next = $pn_stmt -> fetchAll();

    $prev_idx = $prev_next[0]['idx'];
    $next_idx = $prev_next[1]['idx'];

    $prev_title = $prev_next[0]['title'];
    $next_title = $prev_next[1]['title'];

    $date_1 = explode(' ',$prev_next[0]['wdate']);
    $date_2 = explode(' ',$prev_next[1]['wdate']);
    $prev_date = $date_1[0];
    $next_date = $date_2[0];

    // echo "next :".$next_idx;
    // echo "prev :".$prev_idx;

    // 원본 이미지 SQL
    $img_sql = "SELECT * FROM tc_board_file WHERE sav_file = '{$thumbnail}'";
    $img_stmt = $pdo -> prepare($img_sql);
    $img_stmt -> execute();
    $img_rs = $img_stmt -> fetch();

    $org_file = $img_rs['org_file'];
?>
<div id='detail_container'>
    <div>
        <div class='detail_header'>
            <div class='detail_title'><?=$title?></div>
            <div class='detail_wdate'><?=$wdate?></div>
        </div>
        <div class='hr'></div>
        <div class='detail_content'>
            <?
                if(!empty($thumbnail)) {
                    echo "<img class='detail_img' src='../org_img/{$org_file}'>";
                }
            ?>
            <div class='detail_text'>
                <?= nl2br(str_replace(" ","&nbsp;",$content));?>
            </div>
        </div>
        <div class='hr'></div>
        <div class='btn_wrap'>
            <button class='boardBtn' onclick="location.href='gallery.php'">목록</button>
        </div>
        <div class='board_prev_next'>
            <div class='hr'></div>
            <?
                if(!empty($prev_idx)) :
            ?>
            <div class='board_prev' onclick="location.href='detail.php?idx=<?=$prev_idx?>'">
                <div class='prev'>∧</div>
                <div class='prev_text'>이전글</div>
                <div class='prev_title'><?=$prev_title?></div>
                <div class='date'><?=$prev_date?></div>
            </div>
            <?     
                else :   
            ?>
            <div class='board_prev' id="no">
                <div class='prev'>∧</div>
                <div class='prev_text'>이전글</div>
                <div class='prev_title'>이전글이 존재하지 않습니다.</div>
                <div class='date'></div>
            </div>
            <?
                endif;
            ?>
            <div class='hr'></div>
            <?
                if(!empty($next_idx)) :
            ?>
            <div class='board_next' onclick="location.href='detail.php?idx=<?=$next_idx?>'">
                <div class='next'>∨</div>
                <div class='next_text'>다음글</div>
                <div class='next_title'><?=$next_title?></div>
                <div class='date'><?=$next_date?></div>
            </div>
            <?     
                else :   
            ?>
            <div class='board_next' id='no'>
                <div class='next'>∨</div>
                <div class='next_text'>다음글</div>
                <div class='next_title'>다음글이 존재하지 않습니다.</div>
                <div class='date'></div>
            </div>
            <?
                endif;
            ?>
            <div class='hr'></div>
        </div>
    </div>
</div>
<?
    include_once($_SERVER['DOCUMENT_ROOT']."/heon/inc/footer.php");
?>
