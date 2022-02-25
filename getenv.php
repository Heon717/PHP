<?
    getenv(); // 인자의 값에 따라 해당되는 환경변수 값을 알려주는 함수;

    // 인자 종류와 값
    getenv("http_host");  // 홈페이지 주소값을 얻을 때
    getenv("http_referer"); // 어디서부터 정보가 왔는지 알아볼 때 (현재페이지 이전의 페이지 주소값을 가져올 때)
    getenv("request_method");  // 데이터 전송방식(method) 확인 할 때
    getenv("romote_addr");  // 웹사이트에 접속한 컴퓨터의 ip 주소 출력
    getenv("document_root");  // 서버 디렉토리 경로
    getenv("temp");  // temp 폴더 경로
    getenv("http_user_agent");  // 웹 사이트를 접속한 컴퓨터의 웹브라우저 정보
    getenv("server_software");  // 웹서버의 소프트웨어
    getenv("server_port");  // 사용중인 포트번호
?>