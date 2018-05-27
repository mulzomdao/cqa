<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

	if ($_POST["db_access_flag"] == "member_add") {

        if ($_POST[birth_year] != "" && $_POST[birth_month] != "" && $_POST[birth_mbirth_dateonth] != "") {
            $birthday = $_POST[birth_year] . '-' . $_POST[birth_month] . '-' . $_POST[birth_date];
        }

        $query = "
            INSERT INTO cqa_member (member_id, member_no, office_id, member_name, member_eng_name, member_password, member_level
                 , member_right, right_start_date, right_end_date, birthday, sex, mobile, email, homepage, phone, zip_code
                 , zip_address, detail_address, member_memo, use_flag, reg_id, reg_date, modify_id, modify_date)
            SELECT '$_POST[member_id]'
                 , (select CONCAT(SUBSTRING(DATE_FORMAT(now(), '%Y'), 3, 2), '-', '$_POST[office_id]', '-', (select max(member_seq) + 1 from cqa_member)) from dual)
                 , '$_POST[office_id]'
                 , '$_POST[member_name]'
                 , '$_POST[member_eng_name]'
                 , '$_POST[member_password]'
                 , '$_POST[member_level]'
                 , '$_POST[member_right]'
                 , '$_POST[right_start_date]'
                 , date_add(date_add(STR_TO_DATE('$_POST[right_start_date]', '%Y-%m-%d'), INTERVAL - 1 DAY), INTERVAL $_POST[member_right] year) right_end_date
                 , '$birthday'
                 , '$_POST[sex]'
                 , '$_POST[mobile]'
                 , '$_POST[email]'
                 , '$_POST[homepage]'
                 , '$_POST[phone]'
                 , '$_POST[zip_code]'
                 , '$_POST[zip_address]'
                 , '$_POST[detail_address]'
                 , '$_POST[member_memo]'
                 , 'Y' use_flag
                 , 'admin' reg_id
                 , now() reg_date
                 , 'admin' modify_id
                 , now() modify_date
              FROM dual
        ";
        
        $result = mysqli_query($connect, $query);
        if ($result === false) {            
            var_dump($_POST);
            echo "</br>";
            var_dump($query);
            echo "</br>";
            echo mysqli_error($connect);
            // echo("<script>history.go(-1);</script>"); 
        } else {
            echo("<script>location.replace('member_list.php');</script>"); 
        }

    } else if ($_POST["db_access_flag"] == "member_edit") {

        if ($_POST[birth_year] != "" && $_POST[birth_month] != "" && $_POST[birth_date] != "") {
            $birthday = $_POST[birth_year] . '-' . $_POST[birth_month] . '-' . $_POST[birth_date];
        }

        $query = "
            UPDATE cqa_member
               SET office_id = '$_POST[office_id]'
                 , member_name = '$_POST[member_name]'
                 , member_eng_name = '$_POST[member_eng_name]'
                 , member_password = '$_POST[member_password]'
                 , member_level = '$_POST[member_level]'
                 , member_right = '$_POST[member_right]'
                 , right_start_date = '$_POST[right_start_date]'
                 , right_end_date = date_add(date_add(STR_TO_DATE('$_POST[right_start_date]', '%Y-%m-%d'), INTERVAL - 1 DAY), INTERVAL $_POST[member_right] year)
                 , birthday = '$birthday'
                 , sex = '$_POST[sex]'
                 , mobile = '$_POST[mobile]'
                 , phone = '$_POST[phone]'
                 , email = '$_POST[email]'
                 , homepage = '$_POST[homepage]'
                 , zip_code = '$_POST[zip_code]'
                 , zip_address = '$_POST[zip_address]'
                 , detail_address = '$_POST[detail_address]'
                 , member_memo = '$_POST[member_memo]'
                 , use_flag = 'Y'
                 , modify_id = 'admin'
                 , modify_date = now()
             WHERE use_flag = 'Y'
               and member_id = '$_POST[member_id]'
        ";

        $result = mysqli_query($connect, $query);

        if ($result === false) {            
            var_dump($_POST);
            echo "</br>";
            var_dump($query);
            echo "</br>";
            echo mysqli_error($connect);
            // echo("<script>history.go(-1);</script>"); 
        } else {
            echo("<script>location.replace('member_edit.php?member_id=". $_POST[member_id] ."');</script>"); 
        }

    } else if ($_GET["db_access_flag"] == "member_delete") {

        $query = "
            UPDATE cqa_member
               SET use_flag = 'D'
                 , modify_id = 'admin'
                 , modify_date = now()
             WHERE use_flag = 'Y'
               and member_id = '$_GET[member_id]'
        ";

        $result = mysqli_query($connect, $query);
        if ($result === false) {
            echo mysqli_error($connect);
        } else {
            echo("<script>location.replace('member_list.php');</script>"); 
        }

	}

?>