<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

	if ($_POST["db_access_flag"] == "education_receive_add") {

        $query = "
            INSERT INTO cqa_education_receive (education_seq, member_id, member_name, mobile, email, receive_status
                 , phone, zip_code, zip_address, detail_address, receive_memo
                 , use_flag, reg_id, reg_date, modify_id, modify_date)
            select '$_POST[education_seq]'
                 , '$_POST[member_id]'
                 , '$_POST[member_name]'
                 , '$_POST[mobile]'
                 , '$_POST[email]'
                 , '$_POST[receive_status]'
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
            echo("<script>location.replace('education_receive_list.php');</script>"); 
        }

    } else if ($_POST["db_access_flag"] == "education_receive_edit") {
        
        $birthday = $_POST[birth_year] . '-' . $_POST[birth_month] . '-' . $_POST[birth_date];

        $query = "
            UPDATE cqa_education_receive
               SET receive_status = '$_POST[receive_status]'
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
             WHERE education_receive_seq = $_POST[education_receive_seq]
        ";  

        $result = mysqli_query($connect, $query);

        if ($result === false) {            
            var_dump($query);
            echo mysqli_error($connect);
            // echo("<script>history.go(-1);</script>"); 
        } else {
            echo("<script>location.replace('education_receive_edit.php?education_receive_seq=". $_POST[education_receive_seq] ."');</script>"); 
        }

    } else if ($_GET["db_access_flag"] == "education_receive_delete") {

        $query = "
            UPDATE cqa_education_receive
               SET use_flag = 'D'
                 , modify_id = 'admin'
                 , modify_date = now()
             WHERE use_flag = 'Y'
               and education_receive_seq = '$_GET[education_receive_seq]'
        ";

        $result = mysqli_query($connect, $query);

        if ($result === false) {
            echo mysqli_error($connect);
        } else {
            echo("<script>location.replace('education_receive_list.php');</script>"); 
        }

	}

?>