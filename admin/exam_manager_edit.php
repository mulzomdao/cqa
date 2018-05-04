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
                    <h2>시험상세</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>자격시험/접수관리</a>
                        </li>
                        <li>
                            <strong>시험관리</strong>
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
                                <h5>시험정보</small></h5>
                            </div>
                            <div class="ibox-content" style="padding-bottom: 10px">

                                <fieldset class="form-horizontal">
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 시험명</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value="2018년 2급 자격검정 면제및 시험"></div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 합격자발표</label>
                                        <div class="col-sm-5">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input id="date_added" type="text" class="form-control input-sm" value="2018-04-07">
                                            </div>         
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><small>핸드퀼트 </small>시험일</label>
                                        <div class="col-sm-5">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input id="date_modified" type="text" class="form-control input-sm" value="2018-03-24">
                                            </div>                                                
                                        </div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><small>머신퀼트 </small>시험일</label>
                                        <div class="col-sm-5">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input id="date_modified" type="text" class="form-control input-sm" value="2018-03-25">
                                            </div>                                                
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><small>핸드퀼트 </small>접수기간</label>
                                        <div class="col-sm-5">
                                            <div class="col-sm-6" style="padding: 0px; padding-right: 2px">
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input id="date_added" type="text" class="form-control input-sm" value="2018-03-01">
                                                </div>                                                
                                            </div>
                                            <div class="col-sm-6" style="padding: 0px; padding-left: 2px">
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input id="date_added" type="text" class="form-control input-sm" value="2018-03-23">
                                                </div>                                                
                                            </div>
                                        </div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><small>머신퀼트 </small>접수기간</label>
                                        <div class="col-sm-5">
                                            <div class="col-sm-6" style="padding: 0px; padding-right: 2px">
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input id="date_added" type="text" class="form-control input-sm" value="2018-03-01">
                                                </div>                                                
                                            </div>
                                            <div class="col-sm-6" style="padding: 0px; padding-left: 2px">
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input id="date_added" type="text" class="form-control input-sm" value="2018-03-23">
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 고사장</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value="서울 양재동 한국퀼트센터"></div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 응시과목</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value="핸드면제/ 머신면제/핸드퀼트/머신퀼트"></div>
                                    </div>

                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 상태</label>
                                        <div class="col-sm-5">                                                                
                                            <select class="form-control input-sm m-b" name="account" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value=''>상태선택</option>
                                                <option value="9" selected >완료</option>
                                                <option value="8" >접수중</option>
                                                <option value="7" >취소</option>
                                            </select>                                        
                                        </div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 등록정보</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value="admn / 2017-01-12 11:22:33" readonly></div>
                                    </div>

                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 시험안내</label>
                                        <div class="col-sm-11">
                                            <div class="summernote"></div>                                            
                                        </div>
                                    </div>

                                    <!-- <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">첨부파일</label>
                                        <div class="col-sm-11">
                                        
                                            <form action="#" class="dropzone" id="dropzoneForm">
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple />
                                                </div>
                                            </form>
                                        </div>
                                    </div> -->

                                    <div class="form-group pull-right" style="margin-bottom: 0px; padding-right: 15px">
                                        <a type="button" class="btn btn-sm btn-success" href="board_manager_add.php">Save</a>
                                        <a type="button" class="btn btn-sm btn-success" href="board_manager_add.php">Delete</a>
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
