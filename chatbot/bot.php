<div id="container">
    <div id="search">
        <div class='chat'>
            <div class='title'>탱크챗봇</div>
            <div class='form'>
                <div class='bot-inbox inbox'>
                    <div class='icon'>
                        <i class="fas fa-user"></i>
                    </div>
                    <div class='msg-header'>
                        <p>안녕하세요! 탱크옥션 채팅 상담센터입니다.<br>무엇을 도와드릴까요 ?<br> 궁금하신 내용을 선택하시거나, 하단에 있는 입력창에 입력해주세요! </p>
                    </div>
                </div>

            </div>
            <div class="typing-field">
                <div class="input-data">
                    <input id="data" type="text" placeholder="여기에 입력해주세요.. " required>
                    <button id="send-btn">입력</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(()=>{
        textBtn();
        enterFnc();
    })


    $('#send-btn').on("click",() => {
        textBtn();
    })   
    
    const textBtn = () => {
        $value = $("#data").val();
            if($value == '') {
                return;
            }
            $msg = `<div class='user-inbox inbox'><div class='icon'><i class='fas fa-user'></i></div><div class='msg-header'><p>${$value}</p></div></div>`;
            $(".form").append($msg);
            $("#data").val('');
    
            $.ajax({
                url: 'messgage.php',
                type: 'POST',
                dataType: 'text',
                data: { text : $value },
                success: function(result) {
                    if(result != '') {
                        $msg = `<div class='bot-inbox inbox'><div class='icon'><i class='fas fa-user'></i></div><div class='msg-header'><p>${result}</p></div></div>`;
                        $(".form").append($msg);
                    } else {
                        $msg = `<div class='bot-inbox inbox'><div class='icon'><i class='fas fa-user'></i></div><div class='msg-header'><p>입력하신 내용을 이해하지 못했습니다.</p></div></div>`;
                        $(".form").append($msg);
                    }
                    $(".form").scrollTop($(".form")[0].scrollHeight);
                }
            })
    }

    const enterFnc = () => {
        $('#data').keypress(e => {
            if(e.keyCode == 13) {
                textBtn();
            }
        })
    }
    
</script>
<?
    include_once($_SERVER["DOCUMENT_ROOT"]."/clone/inc/footer.php");
?>