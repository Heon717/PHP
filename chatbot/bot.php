<?
    include_once($_SERVER["DOCUMENT_ROOT"]."/clone/inc/pdo.php");
?>
<script type="text/javascript" src="/clone/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="/clone/js/ajax.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="/clone/css/chat.css">
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
                        <div id='msg'>안녕하세요! 탱크옥션 채팅 상담센터입니다.<br>무엇을 도와드릴까요 ?<br> 궁금하신 내용을 선택하시거나, 하단에 있는 입력창에 입력해주세요!</div>
                        <button class='msg-header-btn' onclick="choice('회원가입안내')">회원가입안내</button>
                        <button class='msg-header-btn' onclick="choice('요금결제')">요금결제</button>
                        <button class='msg-header-btn' onclick="choice('무료체험')">무료체험</button>
                        <button class='msg-header-btn' onclick="choice('일반채팅상담')">일반채팅상담</button>
                        <button class='msg-header-btn' onclick="choice('경매채팅상담')">경매채팅상담</button>
                    </div>
                    <!-- <div><?=date("H:i") ?></div> -->
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
            $msg = `<div class='user-inbox inbox'><div class='icon'><i class='fas fa-user'></i></div><div class='msg-header'><div id='msg'>${$value}</div></div></div>`;
            $(".form").append($msg);
            $("#data").val('');
    
            $.ajax({
                url: 'messgage.php',
                type: 'POST',
                dataType: 'json',
                data: { text : $value },
                success: function(result) {
                    if(result != '') {
                        // console.log(result['option']);
                        let str = result['option'];
                        let opt = str.split(',');
                        console.log(opt);
                        for(let i=0; i<opt.length; i++) {
                            `<button>${opt[i]}</button>`
                        }
                        $msg = `<div class='bot-inbox inbox'>
                                    <div class='icon'>
                                        <i class='fas fa-user'></i>
                                    </div>
                                    <div class='msg-header'>
                                        <div id='msg'>${result['replies']}`
                                        for(var i=0; i<opt.length; i++) {
                                            $msg += `<button onclick="choice('${opt[i]}')">${opt[i]}</button>`
                                        }
                        $msg +=         `</div>
                                    </div>
                                </div>`;
                        

                        $(".form").append($msg);
                    } else {
                        $msg = `<div class='bot-inbox inbox'><div class='icon'><i class='fas fa-user'></i></div><div class='msg-header'><div id='msg'>입력하신 내용을 이해하지 못했습니다.</div></div></div>`;
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

    const choice = (e) => {
        $value = $("#data").val(e);
        console.log($value);
        textBtn();
    }
    
</script>