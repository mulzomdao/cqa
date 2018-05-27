<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

	if ($_POST["db_access_flag"] == "book_add") {
        
        $query = "
            INSERT INTO cqaquilt.cqa_book (book_type, book_name, book_image, book_config, book_supply_com, book_price, stock_count
                 , book_state, book_summary, book_content, book_memo, use_flag, reg_id, reg_date, modify_id, modify_date)
            select '$_POST[book_type]'
                 , '$_POST[book_name]'
                 , '$_POST[book_image]'
                 , '$_POST[book_config]'
                 , '$_POST[book_supply_com]'
                 , replace('$_POST[book_price]', ',', '')
                 , replace('$_POST[stock_count]', ',', '')
                 , '$_POST[book_state]'
                 , '$_POST[book_summary]'
                 , '$_POST[book_content]'
                 , '$_POST[book_memo]'
                 , 'Y' use_flag
                 , 'admin' reg_id
                 , now() reg_date
                 , 'admin' modify_id
                 , now() modify_date
              from dual";
        
        $result = mysqli_query($connect, $query);

        if ($result === false) {                        
            var_dump($query);
            echo mysqli_error($connect);
            exit;
        } else {

            $book_image = $_FILES['book_image'];

            if ($book_image[name] != "") {

                $file_name = $book_image[name];
                $file_size = $book_image[size];
                $file_path = mk_dir();
                $new_file_name = file_upload_Check($book_image, $file_path, $_file_upload_size, $_file_upload_extention);
            
                $query = "
                    INSERT INTO cqa_file (file_path, file_name, new_file_name, file_size, file_down_count, use_flag, reg_id, reg_date, modify_id, modify_date)
                    select '$file_path'
                         , '$file_name'
                         , '$new_file_name'
                         , $file_size
                         , '0'
                         , 'Y' use_flag
                         , 'admin' reg_id
                         , now() reg_date
                         , 'admin' modify_id
                         , now() modify_date
                      from dual";         

                $result = mysqli_query($connect, $query);

                if ($result === false) {            
                    var_dump($query);
                    echo mysqli_error($connect);
                    exit;
                } 

                $query = "
                    INSERT INTO cqa_book_file (book_seq, file_seq, use_flag, reg_id, reg_date, modify_id, modify_date)
                    select (select max(book_seq) from cqa_book)
                         , (select max(file_seq) from cqa_file)
                         , 'Y' use_flag
                         , 'admin' reg_id
                         , now() reg_date
                         , 'admin' modify_id
                         , now() modify_date
                      from dual";               

                $result = mysqli_query($connect, $query);

                if ($result === false) {            
                    var_dump($query);
                    echo mysqli_error($connect);
                    exit;
                } 
            }
            echo("<script>location.replace('book_list.php');</script>"); 
        }

    } else if ($_POST["db_access_flag"] == "book_edit") {
          
        $query = "
            UPDATE cqa_book
               SET book_type = '$_POST[book_type]'
                 , book_name = '$_POST[book_name]'
                 , book_image = '$_POST[book_image]'
                 , book_config = '$_POST[book_config]'
                 , book_supply_com = '$_POST[book_supply_com]'
                 , book_price = replace('$_POST[book_price]', ',', '') 
                 , stock_count = replace('$_POST[stock_count]', ',', '')
                 , book_state = '$_POST[book_state]'
                 , book_summary = '$_POST[book_summary]'
                 , book_content = '$_POST[book_content]'
                 , book_memo = '$_POST[book_memo]'
                 , use_flag = 'Y'
                 , modify_id = 'admin'
                 , modify_date = now()
             WHERE use_flag = 'Y'
               and book_seq = $_POST[book_seq]
        ";

        $result = mysqli_query($connect, $query);

        if ($result === false) {            
            var_dump($query);
            echo mysqli_error($connect);
        } else {

            $book_image = $_FILES['book_image'];

            if ($book_image[name] != "") {

                $file_name = $book_image[name];
                $file_size = $book_image[size];
                $file_path = mk_dir();
                $new_file_name = file_upload_Check($book_image, $file_path, $_file_upload_size, $_file_upload_extention);
            
                $query = "
                    INSERT INTO cqa_file (file_path, file_name, new_file_name, file_size, file_down_count, use_flag, reg_id, reg_date, modify_id, modify_date)
                    select '$file_path'
                         , '$file_name'
                         , '$new_file_name'
                         , $file_size
                         , '0'
                         , 'Y' use_flag
                         , 'admin' reg_id
                         , now() reg_date
                         , 'admin' modify_id
                         , now() modify_date
                      from dual";         

                $result = mysqli_query($connect, $query);

                if ($result === false) {            
                    var_dump($query);
                    echo mysqli_error($connect);
                    exit;
                } 

                $query = "
                    INSERT INTO cqa_book_file (book_seq, file_seq, use_flag, reg_id, reg_date, modify_id, modify_date)
                    select $_POST[book_seq]
                         , (select max(file_seq) from cqa_file)
                         , 'Y' use_flag
                         , 'admin' reg_id
                         , now() reg_date
                         , 'admin' modify_id
                         , now() modify_date
                      from dual";               

                $result = mysqli_query($connect, $query);

                if ($result === false) {            
                    var_dump($query);
                    echo mysqli_error($connect);
                    exit;
                } 
            }

            echo("<script>location.replace('book_edit.php?book_seq=". $_POST[book_seq] ."');</script>"); 
        }

    } else if ($_GET["db_access_flag"] == "book_delete") {

        $query = "
            UPDATE cqa_book
               SET use_flag = 'D'
                 , modify_id = 'admin'
                 , modify_date = now()
             WHERE use_flag = 'Y'
               and book_seq = '$_GET[book_seq]'
        ";

        $result = mysqli_query($connect, $query);

        if ($result === false) {
            echo mysqli_error($connect);
        } else {
            echo("<script>location.replace('book_list.php');</script>"); 
        }

	}

?>