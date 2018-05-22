<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

	if ($_POST["db_access_flag"] == "member_add") {

        $birthday = $_POST[birth_year] . '-' . $_POST[birth_month] . '-' . $_POST[birth_date];

        $query = "
            INSERT INTO cqa_member (member_id, member_no, recommend_id, member_name, member_eng_name, member_password, member_level
                 , member_right, right_start_date, right_end_date, birthday, sex, mobile, email, homepage, phone, zip_code
                 , zip_address, detail_address, member_memo, use_flag, reg_id, reg_date, modify_id, modify_date)
            SELECT '$_POST[member_id]'
                 , (select CONCAT(col2, '-', col1) member_no
                      from (select lpad(count(*) + 1, 4, 0) col1
                                 , CONCAT(SUBSTRING(DATE_FORMAT(now(), '%Y'), 3, 2), '-', '$_POST[recommend_id]') col2
                              from cqa_member
                             where member_no like concat(CONCAT(SUBSTRING(DATE_FORMAT(now(), '%Y'), 3, 2), '-', '$_POST[recommend_id]'), '%')) a) member_no
                 , '$_POST[recommend_id]'
                 , '$_POST[member_name]'
                 , '$_POST[member_eng_name]'
                 , '$_POST[member_password]'
                 , '$_POST[member_level]'
                 , '$_POST[member_right]'
                 , '$_POST[right_start_date]'
                 , date_add(STR_TO_DATE('$_POST[right_start_date]', '%Y-%m-%d'), INTERVAL $_POST[member_right] year) right_end_date
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
            echo("<script>location.replace('member_manager_list.php');</script>"); 
        }

    } else if ($_POST["db_access_flag"] == "member_edit") {

        $birthday = $_POST[birth_year] . '-' . $_POST[birth_month] . '-' . $_POST[birth_date];

        $query = "
            UPDATE cqaquilt.cqa_member
               SET recommend_id = '$_POST[recommend_id]'
                 , member_name = '$_POST[member_name]'
                 , member_eng_name = '$_POST[member_eng_name]'
                 , member_password = '$_POST[member_password]'
                 , member_level = '$_POST[member_level]'
                 , member_right = '$_POST[member_right]'
                 , right_start_date = '$_POST[right_start_date]'
                 , right_end_date = date_add(STR_TO_DATE('$_POST[right_start_date]', '%Y-%m-%d'), INTERVAL $_POST[member_right] year)
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
            echo("<script>location.replace('member_manager_edit.php?member_id=". $_POST[member_id] ."');</script>"); 
        }

    } else if ($_GET["db_access_flag"] == "member_manager_delete") {

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
            echo("<script>location.replace('member_manager_list.php');</script>"); 
        }

	}

?>