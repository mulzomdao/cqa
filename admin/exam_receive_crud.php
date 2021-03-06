<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

	if ($_POST["db_access_flag"] == "exam_receive_add") {

        $birthday = $_POST[birth_year] . '-' . $_POST[birth_month] . '-' . $_POST[birth_date];

        $query = "
            INSERT INTO cqa_exam_receive (exam_seq, member_id, receive_subject, receive_type, receive_status, member_name
                 , member_eng_name, birthday, email, mobile, phone, zip_code, zip_address, detail_address
                 , receive_memo, use_flag, reg_id, reg_date, modify_id, modify_date)
            select '$_POST[exam_seq]'
                 , '$_POST[member_id]'
                 , '$_POST[receive_subject]'
                 , '$_POST[receive_type]'
                 , '$_POST[receive_status]'
                 , '$_POST[member_name]'
                 , '$_POST[member_eng_name]'
                 , '$birthday'
                 , '$_POST[email]'
                 , '$_POST[mobile]'
                 , '$_POST[phone]'
                 , '$_POST[zip_code]'
                 , '$_POST[zip_address]'
                 , '$_POST[detail_address]'
                 , '$_POST[receive_memo]'
                 , 'Y' use_flag
                 , 'admin' reg_id
                 , now() reg_date
                 , 'admin' modify_id
                 , now() modify_date
              from dual
        ";
        
        $result = mysqli_query($connect, $query);
        if ($result === false) {            
            var_dump($query);
            echo mysqli_error($connect);
            // echo("<script>history.go(-1);</script>"); 
        } else {
            echo("<script>location.replace('exam_receive_list.php');</script>"); 
        }

    } else if ($_POST["db_access_flag"] == "exam_receive_edit") {
        
        $birthday = $_POST[birth_year] . '-' . $_POST[birth_month] . '-' . $_POST[birth_date];

        $query = "
            UPDATE cqa_exam_receive
               SET receive_subject = '$_POST[receive_subject]'
                 , receive_type = '$_POST[receive_type]'
                 , receive_status = '$_POST[receive_status]'
                 , member_eng_name = '$_POST[member_eng_name]'
                 , birthday = '$birthday'
                 , email = '$_POST[email]'
                 , mobile = '$_POST[mobile]'
                 , phone = '$_POST[phone]'
                 , zip_code = '$_POST[zip_code]'
                 , zip_address = '$_POST[zip_address]'
                 , detail_address = '$_POST[detail_address]'
                 , receive_memo = '$_POST[receive_memo]'
                 , use_flag = 'Y'
                 , modify_id = 'admin'
                 , modify_date = now()
             WHERE exam_receive_seq = $_POST[exam_receive_seq]
        ";  

        $result = mysqli_query($connect, $query);

        if ($result === false) {            
            var_dump($query);
            echo mysqli_error($connect);
            // echo("<script>history.go(-1);</script>"); 
        } else {
            echo("<script>location.replace('exam_receive_edit.php?exam_receive_seq=". $_POST[exam_receive_seq] ."');</script>"); 
        }

    } else if ($_GET["db_access_flag"] == "exam_receive_delete") {

        $query = "
            UPDATE cqa_exam_receive
               SET use_flag = 'D'
                 , modify_id = 'admin'
                 , modify_date = now()
             WHERE use_flag = 'Y'
               and exam_receive_seq = '$_GET[exam_receive_seq]'
        ";

        $result = mysqli_query($connect, $query);

        if ($result === false) {
            echo mysqli_error($connect);
        } else {
            echo("<script>location.replace('exam_receive_list.php');</script>"); 
        }

	}

?>