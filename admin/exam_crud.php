<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

	if ($_POST["db_access_flag"] == "exam_add") {

        $query = "
            insert into cqa_exam (exam_name, machine_exam_date, machine_receive_start_date, machine_receive_end_date
                 , hand_exam_date, hand_receive_start_date, hand_receive_end_date, pass_announce_date, exam_area
                 , exam_subject, exam_content, use_flag, reg_id, reg_date, modify_id, modify_date)
            select '$_POST[exam_name]'
                 , '$_POST[machine_exam_date]'
                 , '$_POST[machine_receive_start_date]'
                 , '$_POST[machine_receive_end_date]'
                 , '$_POST[hand_exam_date]'
                 , '$_POST[hand_receive_start_date]'
                 , '$_POST[hand_receive_end_date]'
                 , '$_POST[pass_announce_date]'
                 , '$_POST[exam_area]'
                 , '$_POST[exam_subject]'
                 , '$_POST[exam_content]'
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
            echo("<script>location.replace('exam_list.php');</script>"); 
        }

    } else if ($_POST["db_access_flag"] == "exam_edit") {

        $query = "
            UPDATE cqa_exam
               SET exam_name = '$_POST[exam_name]'
                 , machine_exam_date = '$_POST[machine_exam_date]'
                 , machine_receive_start_date = '$_POST[machine_receive_start_date]'
                 , machine_receive_end_date = '$_POST[machine_receive_end_date]'
                 , hand_exam_date = '$_POST[hand_exam_date]'
                 , hand_receive_start_date = '$_POST[hand_receive_start_date]'
                 , hand_receive_end_date = '$_POST[hand_receive_end_date]'
                 , pass_announce_date = '$_POST[pass_announce_date]'
                 , exam_area = '$_POST[exam_area]'
                 , exam_subject = '$_POST[exam_subject]'
                 , exam_content = '$_POST[exam_content]'
                 , use_flag = 'Y'
                 , modify_id = 'admin'
                 , modify_date = now()
             WHERE use_flag = 'Y'
               and exam_seq = '$_POST[exam_seq]'
        ";  

        $result = mysqli_query($connect, $query);

        if ($result === false) {            
            var_dump($query);
            echo mysqli_error($connect);
            // echo("<script>history.go(-1);</script>"); 
        } else {
            echo("<script>location.replace('exam_edit.php?exam_seq=". $_POST[exam_seq] ."');</script>"); 
        }

    } else if ($_GET["db_access_flag"] == "exam_delete") {

        $query = "
            UPDATE cqa_exam
               SET use_flag = 'D'
                 , modify_id = 'admin'
                 , modify_date = now()
             WHERE use_flag = 'Y'
               and exam_seq = '$_GET[exam_seq]'
        ";

        $result = mysqli_query($connect, $query);

        if ($result === false) {
            echo mysqli_error($connect);
        } else {
            echo("<script>location.replace('exam_list.php');</script>"); 
        }

	}

?>