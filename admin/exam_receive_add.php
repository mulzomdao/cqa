<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    if ($_GET[member_id] != "") {
        $query = "
            SELECT member_id
                 , member_no
                 , member_name
                 , member_eng_name
                 , DATE_FORMAT(birthday, '%Y-%m-%d') birthday
                 , DATE_FORMAT(birthday, '%Y') birth_year
                 , DATE_FORMAT(birthday, '%m') birth_month
                 , DATE_FORMAT(birthday, '%d') birth_date
                 , mobile
                 , email
                 , phone
                 , zip_code
                 , zip_address
                 , detail_address
              FROM cqa_member
             where use_flag = 'Y'
               and member_id = '$_GET[member_id]'
        ";    
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_array($result);
    }

    $query = "
        select exam_seq
             , exam_name
          From cqa_exam_v
         where use_flag = 'Y'
         order by exam_seq desc
    ";    
    // var_dump($query);
    $result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html>

<head>    
    <?include "include/admin_head.php";?>    
</head>    

<body>
    <div id="wrapper">

        <?include "include/admin_navigation.php"?>

        <div id="page-wrapper" class="gray-bg dashbard-1">

            <?include "include/admin_top.php"?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>시험접수등록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>자격시험/접수관리</a>
                        </li>
                        <li>
                            <strong>시험접수관리</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>            

            <div class="wrapper wrapper-content animated fadeInRight ecommerce">

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>시험접수정보</small></h5>
                    </div>
                    <div class="ibox-content" style="padding-bottom: 10px">

                        <fieldset class="form-horizontal">

                            <form role="form" id="exam_receive_add" action="exam_receive_crud.php" method="post">
                                <input type="hidden" id="db_access_flag" name="db_access_flag" value="exam_receive_add">

                                <div class="form-group" style="margin-bottom: 5px">
                                    <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 아이디</label>
                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-sm" id="member_id" name="member_id" value="<?echo $_GET[member_id]?>" placeholder="아이디검색">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <a type="button" class="btn btn-sm btn-primary btn-id-search" style="margin-bottom: 0px"><i class="fa fa-search"></i></a> 
                                            </span>
                                        </div>
                                    </div>
                                    <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 자격검정</label>
                                    <div class="col-sm-5">
                                        <select class="form-control input-sm m-b" id="exam_seq" name="exam_seq" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                            <?while ($rows = mysqli_fetch_array($result)) {?>
                                            <option value="<?echo $rows[exam_seq]?>"><?echo $rows[exam_name]?></option>
                                            <?}?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 5px">
                                    <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 성명(한글)</label>
                                    <div class="col-sm-5"><input type="text" class="form-control input-sm" id="member_name" name="member_name" value="<?echo $row[member_name]?>" readonly></div>
                                    <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 성명(영문)</label>
                                    <div class="col-sm-5"><input type="text" class="form-control input-sm" id="member_eng_name" name="member_eng_name" value="<?echo $row[member_eng_name]?>"></div>
                                </div>
                                <div class="form-group" style="margin-bottom: 5px">
                                    <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 응시과목</label>
                                    <div class="col-sm-5">
                                        <select class="form-control input-sm m-b" id="receive_subject" name="receive_subject" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                            <option value="">응시과목선택</option>
                                            <option value="hand_free">핸드면제</option>
                                            <option value="machine_free">머신면제</option>
                                            <option value="hand_quilt">핸드퀼트</option>
                                            <option value="machine_quilt">머신퀼트</option>
                                        </select>              
                                    </div>
                                    <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 응시유형</label>
                                    <div class="col-sm-5">                                            
                                        <label class="radio-inline"><input type="radio" value="exam" id="receive_type" name="receive_type" checked>검정시험</label>
                                        <label class="radio-inline"><input type="radio" value="exam_free" id="receive_type" name="receive_type">시험면제</label>
                                        <label class="radio-inline"><input type="radio" value="trans" id="receive_type" name="receive_type">강사이관</label>  
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 5px">
                                    <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 상태</label>
                                    <div class="col-sm-5">
                                        <select class="form-control input-sm m-b" id="receive_status" name="receive_status" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                            <option value="no_charge">미입금</option>
                                            <option value="charge">입금완료</option>
                                            <option value="no_pass">불합격</option>
                                            <option value="pass">합격</option>
                                        </select>                                         
                                    </div>
                                    <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 핸드폰</label>
                                    <div class="col-sm-5"><input type="text" class="form-control input-sm" id="mobile" name="mobile" value="<?echo $row[mobile]?>" placeholder="'-'없이 입력하세요"></div>
                                </div>
                                <div class="form-group" style="margin-bottom: 5px">
                                    <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">생년월일</label>
                                    <div class="col-sm-5">       
                                        <div class="col-sm-4" style="padding-left: 0px; padding-right: 2px;">                                                
                                            <select class="form-control input-sm m-b" name="birth_year" id="birth_year" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value="">년도</option>
                                            <?
                                                for ($i = 2010; $i >= 1950; $i--) {                                                        
                                                    echo "<option value='" . $i . "'>" . $i . "년</option>";
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4" style="padding-left: 2px; padding-right: 2px;">                                              
                                            <select class="form-control input-sm m-b" name="birth_month" id="birth_month" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value="">월</option>
                                            <?
                                                for ($i = 01; $i <= 12; $i++) {
                                                    $month = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                    echo "<option value='" . $month . "'>" . $i . "월</option>";
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4" style="padding-left: 2px; padding-right: 0px;">                                         
                                            <select class="form-control input-sm m-b" name="birth_date" id="birth_date" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value="">일</option>
                                            <?
                                                for ($i = 01; $i <= 31; $i++) {
                                                    $date = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                    echo "<option value='" . $date . "'>" . $i . "일</option>";
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">사진</label>
                                    <div class="col-sm-5">                                        
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput" style="margin: 0px">
                                            <div class="form-control input-sm" data-trigger="fileinput">
                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                            </div>
                                            <span class="input-group-addon btn-sm btn-default btn-file">
                                                <span class="fileinput-new"><small>Select file</small></span>
                                                <span class="fileinput-exists"><small>Change</small></span>
                                                <input type="file" name="..."/>
                                            </span>
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><small>Remove</small></a>
                                        </div> 
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 0px">     
                                    
                                    <div class="col-sm-6" style="padding: 0px">                            
                                        <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px;">전화</label>
                                        <div class="col-sm-10" style="margin-bottom: 5px;"><input type="text" class="form-control input-sm" id="phone" name="phone" value="<?echo $row[phone]?>" placeholder="'-'없이 입력하세요"></div>

                                        <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px">이메일</label>
                                        <div class="col-sm-10"><input type="text" class="form-control input-sm" id="email" name="email" value="<?echo $row[email]?>"></div>
                                    </div>                                  

                                    <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px; padding-top: 24px;"> 주소</label>
                                    <div class="col-sm-5">
                                        <div class="col-sm-3" style="padding: 0px;">
                                            <div class="input-group">
                                                <input type="text" class="form-control input-sm" id="zip_code" name="zip_code" value="<?echo $row[zip_code]?>" placeholder="우편번호">
                                                <span class="input-group-btn">
                                                    <a type="button" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></a> 
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9" style="padding-left: 4px; padding-right: 0px;">
                                            <input type="text" class="form-control input-sm" id="zip_address" name="zip_address" value="<?echo $row[zip_address]?>">
                                        </div>
                                        <div class="col-sm-12" style="padding: 0px; margin-bottom: 5px">
                                            <input type="text" class="form-control input-sm" id="detail_address" name="detail_address" value="<?echo $row[detail_address]?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-bottom: 5px">
                                    <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">접수메모</label>
                                    <div class="col-sm-11"><textarea class="form-control" rows="4" id="reciev" name=""></textarea></div>
                                </div>

                                <div class="form-group pull-right" style="margin-bottom: 0px; padding-right: 15px">
                                    <button type="submit" class="btn btn-sm btn-success">Add</button>
                                    <a type="button" class="btn btn-sm btn-success" href="javascript:history.go(-1)">Cancel</a>
                                </div>
                            </form>

                        </fieldset>

                    </div>
                </div>
            </div>

            <?include "include/admin_bottom.php"?>

        </div>        
    </div>

    <?include "include/admin_js.php"?>
    <script>

        $(document).ready(function() {

            $('input[type="text"]').keypress(function() {
                if (event.keyCode === 13) {
                    event.preventDefault();
                }
            });

            $("#exam_receive_add").validate({
                rules: {
                    member_id: {
                        required: true,
                        rangelength: [4, 20]
                    }, 
                    member_name: {
                        required: true,
                        rangelength: [2, 20]
                    },
                    member_eng_name: {
                        required: true,
                        rangelength: [8, 40]
                    }, 
                    receive_subject: {
                        required: true
                    }, 
                    email: {
                        email: true
                    }, 
                    mobile: {
                        required: true,                        
                        rangelength: [10, 14]
                    },
                    phone: {
                        rangelength: [10, 14]
                    }
                }, submitHandler: function (form) {
                    if (confirm("등록 하시겠습니까?")) {
                        form.submit();
                    }     
                }
            });

            $("#member_id").keypress(function(e) {
                if (e.keyCode == 13){
                    search_id();
                }    
            });

            $('.btn-id-search').click(function(){
                search_id();
            });

            function search_id() {
                var search_id = $("#member_id").val();
                if (search_id != "") {
                    location.href="exam_receive_add.php?member_id=" + search_id
                }
            }

        });
        
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
