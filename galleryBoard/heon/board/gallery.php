<?
    include_once($_SERVER['DOCUMENT_ROOT']."/heon/inc/header.php");
?>
<style>
    * {
        text-decoration: none;
        list-style-type: none;
    }
    #gallery_wrap {
        width: 1500px;
        height: 100%;
        margin: 0 auto;
        display: flex;
        flex-direction: row;
        flex-wrap:wrap;
        /* background-color: aquamarine; */
    }

    #gallery_wrap>ul {
        margin: 0 auto;
        margin-top: 100px;
    }
    
    #gallery_wrap>ul>li {
        float: left;
        margin: 20px 25px 60px 25px;
        /* margin-bottom: 40px; */
    }

    .img_wrap{
        background-color: wheat;
        width: 350px;
        height: 350px;
    }
    .img_wrap>img{
        /* width: 425px;
        height: 425px; */
    }
    .text_wrap {
        width: 350px;
        height: 140px;
        box-sizing: border-box;
        /* background-color: whitesmoke; */
    }
    .notice{
        height: 20px;
        padding-top: 10px;
        padding-left: 10px;
        font-size: 14px;
        font-weight: bold;
        color: orange;
    }

    .text_title {
        height: 90px;
        padding-top: 10px;
        text-align: center;
        font-weight: bold;
        font-size: 18px;
        color: black;
    }
    .text_day{
        height: 20px;
        padding-left: 10px;
        padding-bottom: 10px;
        font-size: 13px;
    }
    .paging{
        margin: 0 auto;
        margin-bottom: 50px;
        width: 100px;
    }

    .search_wrap{
        position: absolute;
        top: 50px;
        right:105px;
        width: 320px;
        height: 55px;
        background-color: tan;
    }
    .search_wrap>input{
        width: 83%;
        height: 100%;
        box-sizing: border-box;
    }
    .search_wrap>button{
        box-sizing: border-box;
        width: 15%;
        height: 100%;
    }

</style>
<?
    $stmt = $pdo -> prepare("SELECT * FROM tc_board WHERE board_id = 'notice2'");
    $stmt -> execute();
    $num = $stmt -> rowCount();

    // ??? ???????????? ????????? ???
    $list_num = 9;      
    // ??? ????????? ????????? ???
    $page_num = 3;    
    // ?????? ????????? (?????? ????????? / ???????????? ????????? ???)
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    // ?????? ??????
    $start = ($page -1) * $list_num;
   // ?????? ????????? ??? (?????? ????????? ??? / ????????? ????????? ???)
    $total_page = ceil($num / $list_num); 
    // ?????? ?????? ??? (?????? ????????? ??? / ????????? ????????? ???)          
    $total_block = ceil($total_page/$page_num);    
    // ?????? ?????? ?????? (?????? ????????? ?????? / ????????? ????????? ???)
    $now_block = ceil($page/$page_num);    
    // ?????? ??? ?????? ????????? ?????? (?????? ?????? ???????????? -1) * ????????? ???????????? + 1
    $s_pageNum = ($now_block - 1) * $page_num + 1;
    // ???????????? 0?????? ??????
    if($s_pageNum <= 0) {
        $s_pageNum = 1;
    }     
    // ?????? ??? ????????? ????????? ?????? (?????? ?????? ?????? * ????????? ????????? ???)
    $e_pageNum = $now_block * $page_num;
    if($e_pageNum > $total_page) {
        $e_pageNum = $total_block;
    }
?>
<div id="gallery_wrap">
    <div class="search_wrap">
        <input class="gallery_search" type="text">
        <button class="searchBtn">??????</button>
    </div>
    <div>
        <button>????????????</button>
    </div>
    <ul class='test'>
    </ul>
</div>
<div class="paging">
<?  // ?????? ?????????
  if($page <= 1) {  
?>
    <!-- <a href="gallery.php?page=1"><< </a> -->
<?} else {?>
    <a class='paging' href="__gallery.php?page=<?=$page-1?>"><< </a>
<?} ?>
    
<?
    for($print_page = $s_pageNum; $print_page <= $e_pageNum+1; $print_page++) {
?>
    <a class='paging' href="__gallery.php?page=<?= $print_page?>"><?= $print_page?></a>
<?        
    }
?>
<?  // ?????? ?????????
if($page >= $total_page) {
?>
    <!-- <a href="gallery.php?page=<?= $total_page?>"> >></a> -->
<?
} else {
?>
    <a class='paging' href="__gallery.php?page=<?=$page+1?>"> >></a>
<? } ?>
</div>
<?
    include_once($_SERVER['DOCUMENT_ROOT']."/heon/inc/footer.php");
?>

<script>
    $(document).ready(function() {
        listAll();
        listSearch();
    });

    const listAll = () => {
        $.ajax({
            type:'post',
            url:'./searchProcess.php',
            dataType:'text',
            data: {
                mod : '1',
                list_num : '<?=$list_num?>',
                page_num : '<?=$page_num?>',
                page : '<?=$_GET['page']?>',
                start : '<?=$start?>'
            },
            success: (result) => {
                $('.test').html(result);
            },
            error: (err) => {
                console.log(err);
            }
        })
    }

    const listSearch = () => {
        $('.searchBtn').click(() =>{
        $.ajax({
            type:'post',
            url:'./searchProcess.php',
            dataType:'text',
            data: {
                text : $('.gallery_search').val(),
                mod : '2',
                list_num : '<?=$list_num?>',
                page_num : '<?=$page_num?>',
                page : '<?=$page?>',
                start : '<?=$start?>'
            },
            success: (result) => {
                console.log(result);
            },
            error: (err) => {
                console.log(err);
            }
        })
    })
    }


</script>