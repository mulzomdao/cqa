<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

	if ($_POST["db_access_flag"] == "office_add") {

        $query = "
            INSERT INTO cqaquilt.cqa_office (office_num, sub_office_num, member_id, member_name, office_name, office_area, mobile
                 , email, homepage, confirm_flag, phone, zip_code, zip_address, detail_address, shop_phone, shop_zip_code
                 , shop_zip_address, shop_detail_address, office_memo, use_flag, reg_id, reg_date, modify_id, modify_date)
            SELECT '$_POST[office_num]'
                 , '$_POST[sub_office_num]'
                 , '$_POST[member_id]'
                 , '$_POST[member_name]'
                 , '$_POST[office_name]'
                 , '$_POST[office_area]'
                 , '$_POST[mobile]'
                 , '$_POST[email]'
                 , '$_POST[homepage]'
                 , '$_POST[confirm_flag]'
                 , '$_POST[phone]'
                 , '$_POST[zip_code]'
                 , '$_POST[zip_address]'
                 , '$_POST[detail_address]'
                 , '$_POST[shop_phone]'
                 , '$_POST[shop_zip_code]'
                 , '$_POST[shop_zip_address]'
                 , '$_POST[shop_detail_address]'
                 , '$_POST[office_memo]'
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
            echo("<script>location.replace('office_manager_list.php');</script>"); 
        }

    } else if ($_POST["db_access_flag"] == "office_edit") {

        $query = "
            UPDATE cqaquilt.cqa_office
               SET member_name = '$_POST[member_name]'
                 , office_name = '$_POST[office_name]'
                 , office_area = '$_POST[office_area]'
                 , mobile = '$_POST[mobile]'
                 , email = '$_POST[email]'
                 , homepage = '$_POST[homepage]'
                 , confirm_flag = '$_POST[confirm_flag]'
                 , phone = '$_POST[phone]'
                 , zip_code = '$_POST[zip_code]'
                 , zip_address = '$_POST[zip_address]'
                 , detail_address = '$_POST[detail_address]'
                 , shop_phone = '$_POST[shop_phone]'
                 , shop_zip_code = '$_POST[shop_zip_code]'
                 , shop_zip_address = '$_POST[shop_zip_address]'
                 , shop_detail_address = '$_POST[shop_detail_address]'
                 , office_memo = '$_POST[office_memo]'
                 , use_flag = 'Y'
                 , modify_id = 'admin'
                 , modify_date = now()
             WHERE use_flag = 'Y'
               and if(sub_office_num != '', CONCAT(office_num, '-', sub_office_num), office_num) = '$_POST[office_id]'
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
            echo("<script>location.replace('office_manager_edit.php?office_id=". $_POST[office_id] ."');</script>"); 
        }

    } else if ($_GET["db_access_flag"] == "office_manager_delete") {

        $query = "
            UPDATE cqa_office
               SET use_flag = 'D'
                 , modify_id = 'admin'
                 , modify_date = now()
             WHERE use_flag = 'Y'
               and if(sub_office_num != '', CONCAT(office_num, '-', sub_office_num), office_num) = '$_GET[office_id]'
        ";
        var_dump($query);

        $result = mysqli_query($connect, $query);

        if ($result === false) {
            echo mysqli_error($connect);
        } else {
            echo("<script>location.replace('office_manager_list.php');</script>"); 
        }

	}

?>