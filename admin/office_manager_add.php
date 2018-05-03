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
                    <h2>지회/지부등록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <strong>지회/지부관리</strong>
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
                                <h5>지회/지부정보</small></h5>
                            </div>
                            <div class="ibox-content" style="padding-bottom: 10px">
                                <fieldset class="form-horizontal">

                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">지회/지부번호</label>
                                        <div class="col-sm-5">
                                            <div class="col-sm-6" style="padding-left: 0px; padding-right: 2px">
                                                <input type="text" class="form-control input-sm" value="">
                                            </div>
                                            <div class="col-sm-6" style="padding-left: 2px; padding-right: 0px">
                                                <input type="text" class="form-control input-sm" value="">
                                            </div>                                            
                                        </div>

                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">성명</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">지역</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">상호명</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">휴대폰</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">이메일</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">배너</label>
                                        <div class="col-sm-5">
                                        
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput" style="margin: 0px">
                                                <div class="form-control input-sm" data-trigger="fileinput">
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                <span class="fileinput-filename"></span>
                                                </div>
                                                <span class="input-group-addon btn-sm btn-default btn-file">
                                                    <span class="fileinput-new">Select file</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="..."/>
                                                </span>
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div> 

                                        </div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">승인여부</label>
                                        <div class="col-sm-5">
                                            <label class="radio-inline"><input type="radio" value="option1" id="inlineCheckbox1" checked> 승인 </label> 
                                            <label class="radio-inline"><input type="radio" value="option1" id="inlineCheckbox1"> 비승인 </label> 
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">샵전화</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">집전화</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 0px">                             
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px; padding-top: 24px;">샵주소</label>
                                        <div class="col-sm-5">
                                            <div class="col-sm-3" style="padding: 0px; margin-bottom: 5px">
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

                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px; padding-top: 24px;">집주소</label>
                                        <div class="col-sm-5">
                                            <div class="col-sm-3" style="padding: 0px; margin-bottom: 5px">
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
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">홈페이지</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">등록자</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value="" readonly></div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">메모</label>
                                        <div class="col-sm-11"><textarea class="form-control" rows="4"></textarea></div>
                                    </div>

                                    <div class="form-group pull-right" style="margin-bottom: 5px; padding-right: 15px">
                                        <a type="button" class="btn btn-sm btn-success" href="#">Delete</a>
                                        <a type="button" class="btn btn-sm btn-success" href="#">Cancel</a>
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
                height: 200
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
