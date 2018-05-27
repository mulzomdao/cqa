<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

	if ($_POST["db_access_flag"] == "education_add") {
	
        $query = "
            insert into cqa_education (education_type, education_date, receive_start_date, receive_end_date, education_area
			     , education_name, education_content, use_flag, reg_id, reg_date, modify_id, modify_date)
            select '$_POST[education_type]'
				 , '$_POST[education_date]'
				 , '$_POST[receive_start_date]'
				 , '$_POST[receive_end_date]'
				 , '$_POST[education_area]'
				 , '$_POST[education_name]'
				 , '$_POST[education_content]'
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
            echo("<script>location.replace('education_list.php');</script>"); 
        }

    } else if ($_POST["db_access_flag"] == "education_edit") {

        



        $query = "
            UPDATE cqa_education
               SET education_type = '$_POST[education_type]'
                 , education_date = '$_POST[education_date]'
                 , receive_start_date = '$_POST[receive_start_date]'
                 , receive_end_date = '$_POST[receive_end_date]'
                 , education_area = '$_POST[education_area]'
                 , education_name = '$_POST[education_name]'
                 , education_content = '$_POST[education_content]'
                 , use_flag = 'Y'
                 , modify_id = 'admin'
                 , modify_date = now()
             WHERE use_flag = 'Y'
               and education_seq = '$_POST[education_seq]'
        ";  

        $result = mysqli_query($connect, $query);

        if ($result === false) {            
            var_dump($query);
            echo mysqli_error($connect);
            // echo("<script>history.go(-1);</script>"); 
        } else {
            echo("<script>location.replace('education_edit.php?education_seq=". $_POST[education_seq] ."');</script>"); 
        }

    } else if ($_GET["db_access_flag"] == "education_delete") {

        $query = "
            UPDATE cqa_education
               SET use_flag = 'D'
                 , modify_id = 'admin'
                 , modify_date = now()
             WHERE use_flag = 'Y'
               and education_seq = '$_GET[education_seq]'
        ";

        $result = mysqli_query($connect, $query);

        if ($result === false) {
            echo mysqli_error($connect);
        } else {
            echo("<script>location.replace('education_list.php');</script>"); 
        }

	}

?>