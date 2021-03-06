<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";
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
                    <h2>시험등록</h2>
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

                                    <form role="form" id="exam_add" action="exam_crud.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" id="db_access_flag" name="db_access_flag" value="exam_add">

                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 시험명</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" name="exam_name" id="exam_name" value="" placeholder=""/></div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 합격자발표</label>
                                            <div class="col-sm-5">
                                                <div class="input-group date">
                                                    <span class="input-group-btn" style="vertical-align: top">
                                                        <button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                    <input type="text" class="form-control input-sm" name="pass_announce_date" id="pass_announce_date" value="">
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><small>핸드퀼트 </small>시험일</label>
                                            <div class="col-sm-5">
                                                <div class="input-group date">
                                                    <span class="input-group-btn" style="vertical-align: top">
                                                        <button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                    <input type="text" class="form-control input-sm" name="hand_exam_date" id="hand_exam_date" value="" placeholder=""/>
                                                </div>                                                
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><small>머신퀼트 </small>시험일</label>
                                            <div class="col-sm-5">
                                                <div class="input-group date">
                                                    <span class="input-group-btn" style="vertical-align: top">
                                                        <button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                    <input type="text" class="form-control input-sm" name="machine_exam_date" id="machine_exam_date" value="" placeholder=""/>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><small>핸드퀼트 </small>접수기간</label>
                                            <div class="col-sm-5">
                                                <div class="col-sm-6" style="padding: 0px; padding-right: 2px">
                                                    <div class="input-group date">
                                                        <span class="input-group-btn" style="vertical-align: top">
                                                            <button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
                                                        </span>
                                                        <input type="text" class="form-control input-sm" name="hand_receive_start_date" id="hand_receive_start_date" value="" placeholder="핸드퀼트 접수시작일">
                                                    </div>                                                
                                                </div>
                                                <div class="col-sm-6" style="padding: 0px; padding-left: 2px">
                                                    <div class="input-group date">
                                                        <span class="input-group-btn" style="vertical-align: top">
                                                            <button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
                                                        </span>
                                                        <input type="text" class="form-control input-sm" name="hand_receive_end_date" id="hand_receive_end_date" value="" placeholder="핸드퀼트 접수종료일">
                                                    </div>                                                
                                                </div>
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><small>머신퀼트 </small>접수기간</label>
                                            <div class="col-sm-5">
                                                <div class="col-sm-6" style="padding: 0px; padding-right: 2px">
                                                    <div class="input-group date">
                                                        <span class="input-group-btn" style="vertical-align: top">
                                                            <button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
                                                        </span>
                                                        <input type="text" class="form-control input-sm" name="machine_receive_start_date" id="machine_receive_start_date" value="" placeholder="머신퀼트 접수시작일">
                                                    </div>                                                
                                                </div>
                                                <div class="col-sm-6" style="padding: 0px; padding-left: 2px">
                                                    <div class="input-group date">
                                                        <span class="input-group-btn" style="vertical-align: top">
                                                            <button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
                                                        </span>
                                                        <input type="text" class="form-control input-sm" name="machine_receive_end_date" id="machine_receive_end_date" value="" placeholder="머신퀼트 접수종료일">
                                                    </div>                                                
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 고사장</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" name="exam_area" id="exam_area" value="" placeholder=""/></div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 응시과목</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" name="exam_subject" id="exam_subject" value="" placeholder="예) 핸드면제/머신면제/핸드퀼트/머신퀼트"/></div>
                                        </div>

                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">시험안내</label>
                                            <div class="col-sm-11">
                                                <textarea id="exam_content" name="exam_content" runat="server" class="summernote" clientIDMode="static"></textarea>
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
    
    <!-- SUMMERNOTE -->
    <script src="inspinia/js/plugins/summernote/summernote.min.js"></script>    
    <!-- DROPZONE -->
    <script src="inspinia/js/plugins/dropzone/dropzone.js"></script>

    <script>

        $(document).ready(function() {

            $('.summernote').summernote({
                height: 300,
                lang: 'ko-KR',
                // callbacks: {
                //     onImageUpload: function(files, editor, welEditable) {
                //         console.log('image upload:', files);
                //         sendFile(files[0], editor, welEditable);
                //     },
                // }
            });

            $('#pass_announce_date, #machine_exam_date, #machine_receive_start_date, #machine_receive_end_date, #hand_exam_date, #hand_receive_start_date, #hand_receive_end_date').datepicker({
                format: "yyyy-mm-dd",
                language: "kr",
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: false,
                autoclose: true
            });

            $("#exam_add").validate({
                rules: {
                    exam_name: {
                        required: true,
                        rangelength: [4, 40]
                    },
                    pass_announce_date: {
                        required: true
                    },
                    exam_area: {
                        required: true,
                        rangelength: [2, 40]
                    },
                    exam_subject: {
                        required: true,
                        rangelength: [2, 40]
                    }
                }, submitHandler: function (form) {
                    if (confirm("등록 하시겠습니까?")) {
                        var exam_content = $('textarea[name="exam_content"]').html($('#exam_content').code());
                        form.submit();
                    }     
                }
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
