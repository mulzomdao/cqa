<?
	$_datetime=date("Y-m-d H:i:s");
    $_date=date("Y-m-d");
    $_member_right['00'] = "준회원 (cqa웹사이트 열람만 가능)";
    $_member_right['01'] = "정회원 1년 (30,000원)";
    $_member_right['02'] = "정회원 2년 (50,000원)";
    $_member_right['03'] = "정회원 3년 (70,000원)";
    $_member_right['99'] = "정회원 평생 (300,000원)";
    
    $_member_level['4'] = "준회원";
    $_member_level['3'] = "정회원";
    $_member_level['2'] = "지회장";
    $_member_level['1'] = "관리자";

    $_right_flag['TEMP'] = "준회원";
    $_right_flag['ACTIVE'] = "유효";
    $_right_flag['END'] = "만료";

    $_exam_status['RECEIVE_WAIT'] = "접수대기";
    $_exam_status['RECEIVING'] = "접수중";
    $_exam_status['RECEIVE_END'] = "접수완료";
    $_exam_status['EXAM_END'] = "시험종료";

    $_education_status['RECEIVE_WAIT'] = "접수대기";
    $_education_status['RECEIVING'] = "접수중";
    $_education_status['RECEIVE_END'] = "접수완료";
    $_education_status['EDUCATION_END'] = "교육종료";

    $_receive_subject['HAND_FREE'] = "핸드면제";
    $_receive_subject['MACHINE_FREE'] = "머신면제";
    $_receive_subject['HAND_QUILT'] = "핸드퀼트";
    $_receive_subject['MACHINE_QUILT'] = "머신퀼트";

    $_exam_receive_status['NO_CHARGE'] = "미입금";
    $_exam_receive_status['CHARGE'] = "입금완료";
    $_exam_receive_status['NO_PASS'] = "불합격";
    $_exam_receive_status['PASS'] = "합격";

    $_education_receive_status['NO_CHARGE'] = "미입금";
    $_education_receive_status['CHARGE'] = "입금완료";
    $_education_receive_status['NO_PASS'] = "미수료";
    $_education_receive_status['PASS'] = "수료";

    $_receive_type['EXAM'] = "검정시험";
    $_receive_type['EXAM_FREE'] = "시험면제";
    $_receive_type['TRANS'] = "강사이관";    

    $_book_type['TEXT_BOOK'] = "교재";
    $_book_type['TEMPLATE'] = "템플릿";  
      
    $_book_state['EXPECT'] = "판매예정";    
    $_book_state['ON_SALE'] = "판매중";    
    $_book_state['PAUSE'] = "일시판매중지";    
    $_book_state['SUSPEND'] = "판매중지";    

    $_sex['W'] = "여";
    $_sex['M'] = "남";

    //이미지 업로드 확장자명
    $_file_upload_extention = "jpg|jpeg|gif|png";
    
	//첨부파일용량 10M
    $_file_upload_size = 10 * 1000000;
    
    $_file_upload_error['OVER_SIZE'] = "UPLOAD 파일 용량을 초과하였습니다.";
    $_file_upload_error['NO_EXTENSION'] = "파일 확장자가 없습니다.";
    $_file_upload_error['NOT_EXTENSION'] = "허용된 확장자가 아닙니다.";
    $_file_upload_error['NO_DIRECTORY'] = "UPLOAD 디렉토리가 없습니다.";
    $_file_upload_error['ERROR'] = "에러가 발생하였습니다.";
?>