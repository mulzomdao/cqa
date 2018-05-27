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

</head>    

<body>
    <div id="wrapper">

        <?include "include/admin_navigation.php"?>

        <div id="page-wrapper" class="gray-bg dashbard-1">

            <?include "include/admin_top.php"?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>교육등록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>교육/접수관리</a>
                        </li>
                        <li>
                            <strong>교육관리</strong>
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
                                <h5>교육정보</small></h5>
                            </div>
                            <div class="ibox-content" style="padding-bottom: 10px">

                                <fieldset class="form-horizontal">

                                    <form role="form" id="education_add" action="education_crud.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" id="db_access_flag" name="db_access_flag" value="education_add">

										<div class="form-group" style="margin-bottom: 5px">
											<label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 교육명</label>
											<div class="col-sm-5"><input type="text" class="form-control input-sm" id="education_name" name="education_name" value="" placeholder=""/></div>
											<label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 교육장소</label>
											<div class="col-sm-5"><input type="text" class="form-control input-sm" id="education_area" name="education_area" value="" placeholder=""/></div>
										</div>
										<div class="form-group" style="margin-bottom: 5px">
											<label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 교육일</label>
											<div class="col-sm-5">
												<div class="input-group date">
                                                    <span class="input-group-btn" style="vertical-align: top">
                                                        <button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
                                                    </span>
													<input type="text" class="form-control input-sm" id="education_date" name="education_date" value="">
												</div>                                                
											</div>
											<label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 접수기간</label>
											<div class="col-sm-5">
												<div class="col-sm-6" style="padding: 0px; padding-right: 2px">
													<div class="input-group date">
														<span class="input-group-btn" style="vertical-align: top">
															<button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
														</span>
														<input type="text" class="form-control input-sm" id="receive_start_date" name="receive_start_date" value="" placeholder="접수시작일">
													</div>                                                
												</div>
												<div class="col-sm-6" style="padding: 0px; padding-left: 2px">
													<div class="input-group date">
														<span class="input-group-btn" style="vertical-align: top">
															<button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
														</span>
														<input type="text" class="form-control input-sm" id="receive_end_date" name="receive_end_date" value="" placeholder="접수종료일">
													</div>                                                
												</div>
											</div>
										</div>

										<div class="form-group" style="margin-bottom: 5px">
											<label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">교육안내</label>
											<div class="col-sm-11">
                                                <textarea id="education_content" name="education_content" runat="server" class="summernote" clientIDMode="static"></textarea>
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

    <script>

        $(document).ready(function() {

            $('.summernote').summernote({
                height: 200,
                lang: 'ko-KR',
                // callbacks: {
                //     onImageUpload: function(files, editor, welEditable) {
                //         console.log('image upload:', files);
                //         sendFile(files[0], editor, welEditable);
                //     },
                // }
            });

            $('#education_date, #receive_start_date, #receive_end_date').datepicker({
                format: "yyyy-mm-dd",
                language: "kr",
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: false,
                autoclose: true
            });

            $("#education_add").validate({
                rules: {
                    education_name: {
                        required: true,
                        rangelength: [4, 40]
                    },
                    education_date: {
                        required: true
                    },
                    receive_start_date: {
                        required: true
                    },
                    receive_end_date: {
                        required: true
                    },
                    education_area: {
                        required: true,
                        rangelength: [2, 40]
                    }
                }, submitHandler: function (form) {
                    if (confirm("등록 하시겠습니까?")) {
                        var education_content = $('textarea[name="education_content"]').html($('#education_content').code());
                        form.submit();
                    }     
                }
            });
        });

    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
