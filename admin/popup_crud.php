<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

	if ($_POST["db_access_flag"] == "popup_add") {

        $query = "
            INSERT INTO cqa_popup(popup_start_date, popup_end_date, popup_title, popup_content, use_flag, reg_id, reg_date, modify_id, modify_date)
            SELECT '$_POST[popup_start_date]'
                 , '$_POST[popup_end_date]'
                 , '$_POST[popup_title]'
                 , '$_POST[popup_content]'
                 , 'Y' use_flag
                 , 'admin' reg_id
                 , now() reg_date
                 , 'admin' modify_id
                 , now() modify_date
              FROM dual
        ";
                
        $result = mysqli_query($connect, $query);

        if ($result === false) {            
            c($query);
            echo mysqli_error($connect);
            // echo("<script>history.go(-1);</script>"); 
        } else {
            echo("<script>location.replace('popup_list.php');</script>"); 
        }

    } else if ($_POST["db_access_flag"] == "popup_edit") {

        $query = "
            UPDATE cqa_popup
               SET popup_start_date = '$_POST[popup_start_date]'
                 , popup_end_date = '$_POST[popup_end_date]'
                 , popup_title = '$_POST[popup_title]'
                 , popup_content = '$_POST[popup_content]'
                 , use_flag = 'Y'
                 , modify_id = 'admin'
                 , modify_date = now()
             WHERE use_flag = 'Y'
               and popup_seq = $_POST[popup_seq]
        ";
        
        $result = mysqli_query($connect, $query);

        if ($result === false) {            
            var_dump($query);
            echo mysqli_error($connect);
            // echo("<script>history.go(-1);</script>"); 
        } else {
            echo("<script>location.replace('popup_edit.php?popup_seq=". $_POST[popup_seq] ."');</script>"); 
        }

    } else if ($_GET["db_access_flag"] == "popup_delete") {

        $query = "
            UPDATE cqa_popup
               SET use_flag = 'D'
                 , modify_id = 'admin'
                 , modify_date = now()
             WHERE use_flag = 'Y'
               and popup_seq = $_GET[popup_seq]
        ";

        $result = mysqli_query($connect, $query);

        if ($result === false) {     
            var_dump($query);
            echo mysqli_error($connect);
        } else {
            echo("<script>location.replace('popup_list.php');</script>"); 
        }

	}

?>