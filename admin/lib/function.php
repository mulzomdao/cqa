<?
function token_combo($string, $token, $select_code){

    $temp = explode($token, $string);

    for ($i = 0; $i < count($temp); $i++) {
        if ($temp[$i] == $select_code) {
            echo "<option value='$temp[$i]' selected>$temp[$i]</option>";
        } else {
            echo "<option value='$temp[$i]'>$temp[$i]</option>";
        }
    }
}

function array_combo($array, $code){
    foreach($array as $key => $value) {
        if ($key == $code) {
            echo '<option value=\'' . $key. '\' selected>' . $value. '</option>';
        } else {
            echo '<option value=\'' . $key. '\'>' . $value. '</option>';
        }
    }
}

function array_radio($name, $array, $code){
    foreach($array as $key => $value) {
        if ($key == $code) {
            echo '<label class="radio-inline"><input type="radio" id="' . $name . '" name="' . $name . '" value="' . $key . '" checked>' . $value . '</label>';
        } else {
            echo '<label class="radio-inline"><input type="radio" id="' . $name . '" name="' . $name . '" value="' . $key . '">' . $value . '</label>';
        }
    }
}

function number_combo($start, $end, $pad ,$code){

    if ($start < $end) {
        for ($i = $start; $i <= $end; $i++) {
            $pad_number = str_pad($i, $pad, "0", STR_PAD_LEFT);
            if ($pad_number == $code) {
                echo "<option value='$pad_number' selected>$i</option>";
            } else {
                echo "<option value='$pad_number'>$i</option>";
            }
        }        
    } else {
        for ($i = $start; $i >= $end; $i--) {
            $pad_number = str_pad($i, $pad, "0", STR_PAD_LEFT);
            if ($pad_number == $code) {
                echo "<option value='$pad_number' selected>$i</option>";
            } else {
                echo "<option value='$pad_number'>$i</option>";
            }
        }        
    }
}

function phone_number($phone) {
    return preg_replace("/(0(?:2|[0-9]{2}))([0-9]+)([0-9]{4}$)/", "\\1-\\2-\\3", $phone);
}

function mk_dir() {
    
    $mk_dir = "upload/".date("Ym")."/";
    
    if (!is_dir($mk_dir)) {
        mkdir($mk_dir, 0777);
    }
    if (is_dir($mk_dir)) { 
        chmod($mk_dir, 0777); 
        return $mk_dir;
    } else {
        return "FALSE";
    }
}

//파일 업로드 체크
function file_upload_Check($file, $dir, $file_upload_size, $file_upload_extention) {
        
    $file_name = $file[name];
    $file_size = $file[size];

    if ($file_size > $file_upload_size) {
        return "OVER_SIZE";
    }

    if (isset($file_name)) {
        $file_name_explode = explode('.', $file_name);
        $file_extension = strtolower(array_pop($file_name_explode));
    }
    if (empty($file_extension)) {
        return "NO_EXTENSION";
    }

    $upload_file_extention_arr = explode("|", $file_upload_extention);
    $file_extention_check = 0;
    for ($i = 0; $i < sizeof($upload_file_extention_arr); $i++) {
        if ($upload_file_extention_arr[$i] == $file_extension) {
            $file_extention_check++;
            break;
        }
    }
    if ($file_extention_check == 0) {
        return "NOT_EXTENSION";
    }

    $new_file_name = str_replace(".".$file_extension, '', $file_name)."_".date("Ymd")._.date("His");
    $new_file_name = $new_file_name.".".$file_extension;
    
    $move_path = $dir.$new_file_name;

    if (is_uploaded_file($file[tmp_name])) {
        move_uploaded_file($file[tmp_name], $move_path);
        return $new_file_name;
    } else {
        return "ERROR";
    }
}

?>