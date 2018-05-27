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
                    <h2>팝업등록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>사이트관리</a>
                        </li>
                        <li>
                            <strong>팝업관리</strong>
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
                                <h5>팝업정보</small></h5>
                            </div>
                            <div class="ibox-content" style="padding-bottom: 10px">
                                <fieldset class="form-horizontal">

                                    <form role="form" id="popup_add" action="popup_crud.php" method="post">
                                        <input type="hidden" id="db_access_flag" name="db_access_flag" value="popup_add">
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 제목</label>
                                            <div class="col-sm-11"><input type="text" class="form-control input-sm" id="popup_title" name="popup_title" placeholder=""/></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 시작일</label>
                                            <div class="col-sm-5">
                                                <div class="input-group date">
                                                    <span class="input-group-btn" style="vertical-align: top">
                                                        <button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                    <input type="text" class="form-control input-sm" id="popup_start_date" name="popup_start_date" placeholder=""/>
                                                </div>                                                
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 종료일</label>
                                            <div class="col-sm-5">
                                                <div class="input-group date">
                                                    <span class="input-group-btn" style="vertical-align: top">
                                                        <button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                    <input type="text" class="form-control input-sm" id="popup_end_date" name="popup_end_date" placeholder=""/>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 내용</label>
                                            <div class="col-sm-11">
                                                <textarea id="popup_content" name="popup_content" runat="server" class="summernote" clientIDMode="static"></textarea> 
                                            </div>
                                        </div>
                                    </form>

                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">첨부파일</label>
                                        <div class="col-sm-11">
                                        
                                            <form action="#" class="dropzone" id="dropzoneForm">
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group pull-right" style="margin-bottom: 0px; padding-right: 15px">
                                        <button type="button" class="btn btn-sm btn-success" id="popup_add_submit">Add</button>
                                        <a type="button" class="btn btn-sm btn-success" href="javascript:history.go(-1)">Cancel</a>
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

            $('#popup_start_date, #popup_end_date').datepicker({
                format: "yyyy-mm-dd",
                language: "kr",
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: false,
                autoclose: true
            });

            $("#popup_add").validate({
                rules: {
                    popup_start_date: {
                        required: true
                    }, 
                    popup_end_date: {
                        required: true
                    },
                    popup_title: {
                        required: true,
                        rangelength: [4, 40]
                    }
                }, submitHandler: function (form) {
                    if (confirm("등록 하시겠습니까?")) {
                        form.submit();
                    }     
                }
            });

            $("#popup_add_submit").click(function(){
                $("#popup_add").submit();
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
