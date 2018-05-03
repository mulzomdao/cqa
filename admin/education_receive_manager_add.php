<!--
*
*  INSPINIA - Responsive Admin Theme
*  version 2.7.1
*
-->

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
                    <h2>교육접수등록</h2>
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
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">교육</label>
                                        <div class="col-sm-5">
                                            <select class="form-control input-sm m-b" name="account" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value='36' >2018년 2급 자격검정 면제및 교육</option>
                                                <option value='34' >2017 강사자격 및 이관심사</option>
                                                <option value='33' >2017년 2급 핸드, 머신 자격검정 교육</option>
                                            </select>
                                        </div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">아이디</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" placeholder=""></div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">성명</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" placeholder=""></div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">이메일</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" placeholder=""></div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 0px">                                             
                                        <div class="col-sm-6" style="padding: 0px">                            
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px;">전화</label>
                                            <div class="col-sm-10" style="margin-bottom: 5px;"><input type="text" class="form-control input-sm" value=""></div>

                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px">핸드폰</label>
                                            <div class="col-sm-10"><input type="text" class="form-control input-sm" value=""></div>
                                        </div>                                  

                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px; padding-top: 24px;">주소</label>
                                        <div class="col-sm-5">
                                            <div class="col-sm-3" style="padding: 0px;">
                                                <div class="input-group"><input type="text" class="form-control input-sm" value="">
                                                    <span class="input-group-btn">
                                                        <a type="button" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></a> 
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9" style="padding-left: 4px; padding-right: 0px;">
                                                <input type="text" class="form-control input-sm" value="">
                                            </div>
                                            <div class="col-sm-12" style="padding: 0px; margin-bottom: 5px">
                                                <input type="text" class="form-control input-sm" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">교육장</label>
                                        <div class="col-sm-5">
                                            <select class="form-control input-sm m-b" name="account" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value="0">서울 양재동 한국퀼트센터</option>
                                            </select>                   
                                        </div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">상태</label>
                                        <div class="col-sm-5">
                                            <select class="form-control input-sm m-b" name="account" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value="0">미입금</option>
                                                <option value="5">입금완료</option>
                                                <option value="10">미이수</option>
                                                <option value="20">이수</option>
                                            </select>                                         
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">접수메모</label>
                                        <div class="col-sm-11"><textarea class="form-control" rows="4"></textarea></div>
                                    </div>

                                    <div class="form-group pull-right" style="margin-bottom: 0px; padding-right: 15px">
                                        <a type="button" class="btn btn-sm btn-success" href="board_manager_add.php">Add</a>
                                        <a type="button" class="btn btn-sm btn-success" href="board_manager_add.php">Cancel</a>
                                    </div>

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
    <!-- DROPZONE -->
    <script src="inspinia/js/plugins/dropzone/dropzone.js"></script>

    <script>

        $(document).ready(function() {

            $('.summernote').summernote({
                height: 300
            });

            $('#date_added').datepicker({
                format: "yyyy-mm-dd",
                language: "kr",
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#date_added_01').datepicker({
                format: "yyyy-mm-dd",
                language: "kr",
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#date_modified').datepicker({
                format: "yyyy-mm-dd",
                language: "kr",
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
        });
        
        Dropzone.options.dropzoneForm = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            dictDefaultMessage: "<strong>Drop files here or click to upload. </strong></br> (This is just a demo dropzone. Selected files are not actually uploaded.)",
        };
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
