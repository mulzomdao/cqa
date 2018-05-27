<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    $query = "
        SELECT exam_receive_seq
             , exam_receive_no
             , exam_seq
             , member_id
             , receive_subject
             , receive_type
             , receive_status
             , member_name
             , member_eng_name
             , birthday
             , DATE_FORMAT(birthday, '%Y') birth_year
             , DATE_FORMAT(birthday, '%m') birth_month
             , DATE_FORMAT(birthday, '%d') birth_date
             , email
             , mobile
             , phone
             , zip_code
             , zip_address
             , detail_address
             , receive_memo
             , use_flag
             , reg_id
             , reg_date
             , modify_id
             , modify_date
          FROM cqa_exam_receive_v
         where use_flag = 'Y'
           and exam_receive_seq = '$_GET[exam_receive_seq]'
    ";    
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);

    $query = "
        select exam_seq
             , exam_name
             , exam_subject
          From cqa_exam_v
         where use_flag = 'Y'
           and exam_seq = $row[exam_seq]
         order by exam_seq desc
    ";    
    // var_dump($query);
    $result = mysqli_query($connect, $query);
    $exam_row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>    
    <?include "include/admin_head.php";?>    

    <link href="inspinia/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="inspinia/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">    
    
    <link href="inspinia/css/animate.css" rel="stylesheet">
    <link href="inspinia/css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="inspinia/css/plugins/dropzone/dropzone.css" rel="stylesheet">
</head>    

<body>
    <div id="wrapper">

        <?include "include/admin_navigation.php"?>

        <div id="page-wrapper" class="gray-bg dashbard-1">

            <?include "include/admin_top.php"?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>시험접수상세</h2>
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
                <div class="row">
                    <div class="col-lg-12">

                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>시험접수정보</small></h5>
                            </div>
                            <div class="ibox-content" style="padding-bottom: 10px">

                                <fieldset class="form-horizontal">
                                    <form role="form" id="exam_receive_edit" action="exam_receive_crud.php" method="post">
                                        <input type="hidden" id="db_access_flag" name="db_access_flag" value="exam_receive_edit">
                                        <input type="hidden" id="exam_receive_seq" name="exam_receive_seq" value="<?echo $_GET[exam_receive_seq]?>">

                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 수험번호 / 아이디</label>
                                            <div class="col-sm-5">
                                                
                                                <div class="col-sm-6" style="padding-left: 0px; padding-right: 2px;">
                                                    <input type="text" class="form-control input-sm" name="exam_receive_no" id="exam_receive_no" value="<?echo $row[exam_receive_no]?>" readonly>
                                                </div>
                                                <div class="col-sm-6" style="padding-left: 3px; padding-right: 0px;">
                                                    <input type="text" class="form-control input-sm" name="member_id" id="member_id" value="<?echo $row[member_id]?>" placeholder="" readonly>
                                                </div>
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 자격검정</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control input-sm" id="exam_name" name="exam_name" value="<?echo $exam_row[exam_name]?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 성명(한글)</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control input-sm" id="member_name" name="member_name" value="<?echo $row[member_name]?>" readonly>
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 성명(영문)</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" id="member_eng_name" name="member_eng_name" value="<?echo $row[member_eng_name]?>"></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 응시과목</label>
                                            <div class="col-sm-5">
                                                <select class="form-control input-sm m-b" id="receive_subject" name="receive_subject" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                    <option value="">응시과목선택</option>
                                                    <?token_combo($exam_row[exam_subject], '/', $row[receive_subject])?>
                                                </select>              
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 응시유형</label>
                                            <div class="col-sm-5">                                                
                                                <?array_radio('receive_type', $_receive_type, $row[receive_type])?>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 상태</label>
                                            <div class="col-sm-5">
                                                <select class="form-control input-sm m-b" id="receive_status" name="receive_status" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                    <?array_combo($_exam_receive_status, $row[receive_status])?>
                                                </select>                                         
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 핸드폰</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" id="mobile" name="mobile" value="<?echo $row[mobile]?>" placeholder="'-' 없이 입력하세요"></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">생년월일</label>
                                            <div class="col-sm-5">       
                                            <div class="col-sm-4" style="padding-left: 0px; padding-right: 2px;">                                                
                                                    <select class="form-control input-sm m-b" name="birth_year" id="birth_year" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                        <option value="">년도</option>
                                                        <?number_combo(2010, 1950, 0, $row[birth_year])?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4" style="padding-left: 2px; padding-right: 2px;">                                              
                                                    <select class="form-control input-sm m-b" name="birth_month" id="birth_month" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                        <option value="">월</option>
                                                        <?number_combo(1, 12, 2, $row[birth_month])?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4" style="padding-left: 2px; padding-right: 0px;">                                         
                                                    <select class="form-control input-sm m-b" name="birth_date" id="birth_date" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                        <option value="">일</option>
                                                        <?number_combo(1, 31, 2, $row[birth_date])?>
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
                                                <div class="col-sm-10" style="margin-bottom: 5px;"><input type="text" class="form-control input-sm" id="phone" name="phone" value="<?echo $row[phone]?>" placeholder="'-' 없이 입력하세요"></div>

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
                                            <div class="col-sm-11"><textarea class="form-control" rows="4" id="receive_memo" name="receive_memo"><?echo $row[receive_memo]?></textarea></div>
                                        </div>

                                        <div class="form-group pull-right" style="margin-bottom: 0px; padding-right: 15px">
                                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                                            <a type="button" class="btn btn-sm btn-success" id="exam_receive_delete">Delete</a>
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

            $("#exam_receive_edit").validate({
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
                        rangelength: [9, 14]
                    }
                }, submitHandler: function (form) {
                    if (confirm("수정 하시겠습니까?")) {
                        form.submit();
                    }     
                }
            });
            
            $("#exam_receive_delete").click(function(){
                if (confirm('삭제 하시겠습니까?')) {
                    location.replace('exam_receive_crud.php?db_access_flag=exam_receive_delete&exam_receive_seq=<?echo $row[exam_receive_seq]?>');
                }
            });

        });
        
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
