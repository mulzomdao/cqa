<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";
    //var_dump($_POST);

	if($_POST["db_access_flag"] == "board_manager_add"){

        $query = "
            insert into cqa_board_manager (board_id, board_name, manager_id, board_explain, use_flag, reg_id, reg_date, modify_id, modify_date)
            select '$_POST[board_id]'
                 , '$_POST[board_name]'
                 , '$_POST[manager_id]'
                 , '$_POST[board_explain]'
                 , 'Y'
                 , '$_POST[reg_id]'
                 , now()
                 , '$_POST[reg_id]'
                 , now() 
              from dual
                ON DUPLICATE KEY 
            UPDATE board_name = '$_POST[board_name]'
                 , manager_id = '$_POST[manager_id]'
                 , board_explain = '$_POST[board_explain]'
                 , use_flag = 'Y'
                 , modify_id = 'admin'
                 , modify_date = now()
        ";
        
        $result = mysqli_query($connect, $query);
        if ($result === false) {
            echo mysqli_error($connect);
        }

        echo("<script>location.replace('board_manager_list.php');</script>"); 
    }
    
	if ($_POST["db_access_flag"] == "board_manager_edit") {

        $query = "
            UPDATE cqa_board_manager
               SET board_name = '$_POST[board_name]'
                 , manager_id = '$_POST[manager_id]'
                 , board_explain = '$_POST[board_explain]'
                 , use_flag = 'Y'
                 , modify_id = 'admin'
                 , modify_date = now()
             WHERE use_flag = 'Y'
               and board_id = '$_POST[board_id]'
        ";

        $result = mysqli_query($connect, $query);
        if ($result === false) {
            echo mysqli_error($connect);
        }

        echo("<script>location.set replace('board_manager_edit.php?board_id=". $_POST[board_id] ."');</script>"); 
	}
	if ($_POST["db_access_flag"] == "board_manager_delete") {

        $query = "
            UPDATE cqa_board_manager
               SET use_flag = 'D'
                 , modify_id = 'admin'
                 , modify_date = now()
             WHERE use_flag = 'Y'
               and board_id = '$_POST[board_id]'
        ";

        $result = mysqli_query($connect, $query);
        if ($result === false) {
            echo mysqli_error($connect);
        }

        echo("<script>location.replace('board_manager_list.php');</script>"); 
	}

?>