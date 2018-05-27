<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    $query = "
        select office_id
             , office_info
          From cqa_office_id_v
    ";    
    // var_dump($query);
    $office_id_result = mysqli_query($connect, $query);
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
                    <h2>회원등록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <strong>회원관리</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight ecommerce">

                <div class="row">
                    <div class="col-lg-12">

                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>회원일반정보</small></h5>
                            </div>
                            <div class="ibox-content" style="padding-bottom: 10px">                    

                                <fieldset class="form-horizontal">
                                    <form role="form" id="member_add" action="member_crud.php" method="post">
                                        <input type="hidden" id="db_access_flag" name="db_access_flag" value="member_add">

                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 추천인</label>
                                            <div class="col-sm-5">
                                                <select class="form-control input-sm m-b" name="office_id" id="office_id" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                    <option value=''>추천인선택</option>
                                                    <?while ($rows = mysqli_fetch_array($office_id_result)) {?>
                                                    <option value="<?echo $rows[office_id]?>" <?if ($_GET[office_id] == $rows[office_id]) {echo "selected";}?>><?echo $rows[office_info]?></option>
                                                    <?}?>
                                                </select>
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
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"> 시작일</label>
                                            <div class="col-sm-5">
                                                <div class="input-group date">                                                    
                                                    <span class="input-group-btn" style="vertical-align: top">
                                                        <button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                    <input id="right_start_date" name="right_start_date" type="text" class="form-control input-sm" value="<?echo $_date?>" readonly style="background: white">
                                                </div>
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 자격선택</label>
                                            <div class="col-sm-5">
                                                <select class="form-control input-sm m-b" name="member_right" id="member_right" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                    <?array_combo($_member_right, '')?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 0px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 아이디</label>
                                            <div class="col-sm-5">
                                                <div class="input-group">
                                                    <input type="text" class="form-control input-sm" name="member_id" id="member_id" value="">
                                                    <span class="input-group-btn" style="vertical-align: top">
                                                        <a type="button" class="btn btn-sm btn-primary">중복확인</i></a> 
                                                    </span>
                                                </div>
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 레벨</label>
                                            <div class="col-sm-5">
                                                <select class="form-control input-sm m-b" name="member_level" id="member_level" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                    <?array_combo($_member_level, '')?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 비밀번호</label>
                                            <div class="col-sm-5"><input type="password" class="form-control input-sm" name="member_password" id="member_password" value=""></div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 비밀번호확인</label>
                                            <div class="col-sm-5"><input type="password" class="form-control input-sm" name="member_password_confirm" id="member_password_confirm" value=""></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 한글성명</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" name="member_name" id="member_name" value=""></div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">영문성명</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" name="member_eng_name" id="member_eng_name" value=""></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 핸드폰</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control input-sm" placeholder="'-' 없이 입력하세요" name="mobile" id="mobile">
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">생년월일 / 성별</label>
                                            <div class="col-sm-5">       
                                                <div class="col-sm-3" style="padding-left: 0px; padding-right: 2px;">                                                
                                                    <select class="form-control input-sm m-b" name="birth_year" id="birth_year" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                        <option value="">년도</option>
                                                        <?number_combo(2010, 1950, 0, '')?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3" style="padding-left: 2px; padding-right: 2px;">                                              
                                                    <select class="form-control input-sm m-b" name="birth_month" id="birth_month" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                        <option value="">월</option>
                                                        <?number_combo(1, 12, 2, '')?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3" style="padding-left: 2px; padding-right: 2px;">                                         
                                                    <select class="form-control input-sm m-b" name="birth_date" id="birth_date" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                        <option value="">일</option>
                                                        <?number_combo(1, 31, 2, '')?>
                                                    </select>
                                                </div>                                        
                                                <div class="col-sm-3" style="padding-left: 2px; padding-right: 0px;">                                         
                                                    <select class="form-control input-sm m-b" name="sex" id="sex" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                        <option value="">성별</option>
                                                        <?array_combo($_sex, '')?>
                                                    </select>
                                                </div>                                        
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">전화</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control input-sm" placeholder="'-' 없이 입력하세요" name="phone" id="phone">
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">이메일</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" name="email" id="email" value=""></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 0px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">우편번호</label>
                                            <div class="col-sm-5">
                                                <div class="col-sm-3" style="padding: 0px;">
                                                    <div class="input-group"><input type="text" class="form-control input-sm" name="zip_code" id="zip_code" value="" placeholder="우편번호">
                                                        <span class="input-group-btn">
                                                            <a type="button" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></a> 
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9" style="padding-left: 4px; padding-right: 0px;">
                                                    <input type="text" class="form-control input-sm" value="" name="zip_address" id="zip_address">
                                                </div>
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">상세주소</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" value="" name="detail_address" id="detail_address"></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">회원메모</label>
                                            <div class="col-sm-11"><textarea class="form-control" rows="4" name="member_memo" id="member_memo"></textarea></div>
                                        </div>

                                        <div class="form-group pull-right" style="margin-bottom: 5px; padding-right: 15px">
                                            <button type="submit" class="btn btn-sm btn-success">Add</button>
                                            <a type="button" class="btn btn-sm btn-success" href="javascript:history.go(-1)">Cancel</a>
                                        </div>
                                    </form>
                                </fieldset>

                            </div>
                        </div>

                    </div>
                    
                </div>
            </div>

            <?include "include/admin_bottom.php"?>

        </div>        
    </div>

    <?include "include/admin_js.php"?>

    <script>
        $(document).ready(function() {

            $('#right_start_date').datepicker({
                format: "yyyy-mm-dd",
                language: "kr",
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: false,
                autoclose: true
            });

            $("#member_add").validate({
                rules: {
                    office_id: {
                        required: true
                    }, 
                    member_id: {
                        required: true,
                        rangelength: [4, 20]
                    }, 
                    member_password: {
                        required: true,
                        rangelength: [4, 20]
                    }, 
                    member_password_confirm: {
                        required: true,
                        rangelength: [4, 20],
                        equalTo: '#member_password'
                    }, 
                    member_name: {
                        required: true,
                        rangelength: [2, 20]
                    },
                    member_eng_name: {
                        rangelength: [8, 40]
                    }, 
                    email: {
                        email: true
                    }, 
                    mobile: {
                        required: true,                        
                        rangelength: [9, 14]
                    },
                    phone: {
                        rangelength: [9, 14]
                    }
                }, submitHandler: function (form) {
                    if (confirm("등록 하시겠습니까?")) {
                        form.submit();
                    }     
                }
            });

        });
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
