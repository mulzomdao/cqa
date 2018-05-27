<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    $query = "
        SELECT *
          FROM cqa_education_receive
         where use_flag = 'Y'
           and education_receive_seq = '$_GET[education_receive_seq]'
    ";    
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);

    $query = "
        select education_seq
             , education_name
          From cqa_education_v
         where use_flag = 'Y'
         order by education_seq desc
    ";    
    // var_dump($query);
    $result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html>

<head>    
    <?include "include/admin_head.php";?>    

    <link href="inspinia/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="inspinia/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">    
    
</head>    

<body>
    <div id="wrapper">

        <?include "include/admin_navigation.php"?>

        <div id="page-wrapper" class="gray-bg dashbard-1">

            <?include "include/admin_top.php"?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>교육접수상세</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>교육/접수관리</a>
                        </li>
                        <li>
                            <strong>교육접수관리</strong>
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
                                <h5>교육접수정보</small></h5>
                            </div>
                            <div class="ibox-content" style="padding-bottom: 10px">

                                <fieldset class="form-horizontal">
                                

                                    <form role="form" id="education_receive_edit" action="education_receive_crud.php" method="post">
                                        <input type="hidden" id="db_access_flag" name="db_access_flag" value="education_receive_edit">
                                        <input type="hidden" id="education_receive_seq" name="education_receive_seq" value="<?echo $row[education_receive_seq]?>">

                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 아이디</label>
                                            <div class="col-sm-5">
                                                    <input type="text" class="form-control input-sm" id="member_id" name="member_id" value="<?echo $row[member_id]?>" placeholder="아이디검색" readonly>
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 교육명</label>
                                            <div class="col-sm-5">
                                                <select class="form-control input-sm m-b" id="education_seq" name="education_seq" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                    <?while ($rows = mysqli_fetch_array($result)) {?>
                                                    <option value="<?echo $rows[education_seq]?>"><?echo $rows[education_name]?></option>
                                                    <?}?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 성명</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" id="member_name" name="member_name" value="<?echo $row[member_name]?>" readonly></div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 상태</label>
                                            <div class="col-sm-5">
                                                <select class="form-control input-sm m-b" id="receive_status" name="receive_status" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                    <option value="NO_CHARGE"><?echo $_EDUCATION_RECEIVE_STATUS[NO_CHARGE]?></option>
                                                    <option value="CHARGE"><?echo $_EDUCATION_RECEIVE_STATUS[CHARGE]?></option>
                                                    <option value="NO_PASS"><?echo $_EDUCATION_RECEIVE_STATUS[NO_PASS]?></option>
                                                    <option value="PASS"><?echo $_EDUCATION_RECEIVE_STATUS[PASS]?></option>
                                                </select>                                         
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 0px">     
                                            
                                            <div class="col-sm-6" style="padding: 0px">                            
                                                <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px;"><i class="fa fa-check"></i>  핸드폰</label>
                                                <div class="col-sm-10" style="margin-bottom: 5px;"><input type="text" class="form-control input-sm" id="mobile" name="mobile" value="<?echo $row[mobile]?>" placeholder="'-' 없이 입력하세요"></div>

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
                                            <a type="button" class="btn btn-sm btn-success" id="education_receive_delete">Delete</a>
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
    <!-- SUMMERNOTE -->
    <script src="inspinia/js/plugins/summernote/summernote.min.js"></script>    
    
    <script>

        $(document).ready(function() {

            $('input[type="text"]').keypress(function() {
                if (event.keyCode === 13) {
                    event.preventDefault();
                }
            });

            $("#education_receive_edit").validate({
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
                    }
                }, submitHandler: function (form) {
                    if (confirm("수정 하시겠습니까?")) {
                        form.submit();
                    }     
                }
            });
            
            $("#education_receive_delete").click(function(){
                if (confirm('삭제 하시겠습니까?')) {
                    location.replace('education_receive_crud.php?db_access_flag=education_receive_delete&education_receive_seq=<?echo $row[education_receive_seq]?>');
                }
            });

        });
        
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
