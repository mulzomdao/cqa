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
                    <h2>교재상세</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <strong>교재관리</strong>
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
                                <h5>교재정보</small></h5>
                            </div>
                            <div class="ibox-content" style="padding-bottom: 10px">

                                <fieldset class="form-horizontal">
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 품목</label>
                                        <div class="col-sm-5">
                                            <select class="form-control input-sm m-b" name="account" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value='36'>교재</option>
                                                <option value='34' selected>템플릿</option>
                                            </select>
                                        </div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 품명</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value="10 템플릿이용 곡선피싱"></div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">                                        
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 상품이미지</label>
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
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">구성/크기</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
                                    </div>

                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 소비자가 / 회원가</label>
                                        <div class="col-sm-5">
                                            
                                            <div class="col-sm-6" style="padding-left: 0px; padding-right: 2px;">
                                                <input type="text" class="form-control input-sm" value="15,000">
                                            </div>
                                            <div class="col-sm-6" style="padding-left: 2px; padding-right: 0px;">
                                                <input type="text" class="form-control input-sm" value="10,500">
                                            </div>
                                        </div>

                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">재고수량</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value="0"></div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">요약설명</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 상태</label>
                                        <div class="col-sm-5">
                                            <label class="radio-inline"><input type="radio" value="option1" id="inlineCheckbox1" checked=""> 판매중 </label>
                                            <label class="radio-inline"><input type="radio" value="option1" id="inlineCheckbox1"> 일시판매중지 </label>
                                            <label class="radio-inline"><input type="radio" value="option1" id="inlineCheckbox1"> 판매중지 </label>  
                                            <label class="radio-inline"><input type="radio" value="option1" id="inlineCheckbox1"> 판매예정 </label>  
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 교재설명</label>
                                        <div class="col-sm-11">
                                            <div class="summernote"></div>                                            
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">관리메모</label>
                                        <div class="col-sm-11"><textarea class="form-control" rows="3"></textarea></div>
                                    </div>
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
