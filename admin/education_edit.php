<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    $query = "
        select case when date_format(now(), '%Y-%m-%d') < receive_start_date then 'RECEIVE_WAIT'
                    when receive_start_date <= date_format(now(), '%Y-%m-%d') and date_format(now(), '%Y-%m-%d') <= receive_end_date then 'RECEIVING'
                    when receive_end_date < date_format(now(), '%Y-%m-%d') and date_format(now(), '%Y-%m-%d') <= education_date then 'RECEIVE_END'
                    when education_date < date_format(now(), '%Y-%m-%d') then 'EDUCATION_END'
                end education_status
              , education_seq
              , education_type
              , education_date
              , receive_start_date
              , receive_end_date
              , education_area
              , education_name
              , education_content
              , use_flag
              , reg_id
              , reg_date
              , modify_id
              , modify_date
           from cqa_education_v
          where use_flag = 'Y'
          and education_seq = '$_GET[education_seq]'
    ";    

    $result = mysqli_query($connect, $query);
    if ($result === false) {            
        var_dump($query);
        echo mysqli_error($connect);
    }

    $row = mysqli_fetch_array($result);
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
                    <h2>교육상세</h2>
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

                                    <form role="form" id="education_edit" action="education_crud.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" id="db_access_flag" name="db_access_flag" value="education_edit">
                                        <input type="hidden" id="education_seq" name="education_seq" value="<?echo $_GET[education_seq]?>">

										<div class="form-group" style="margin-bottom: 5px">
											<label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 교육명</label>
											<div class="col-sm-5"><input type="text" class="form-control input-sm" id="education_name" name="education_name" value="<?echo $row[education_name]?>" placeholder=""/></div>
											<label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 교육장소</label>
											<div class="col-sm-5"><input type="text" class="form-control input-sm" id="education_area" name="education_area" value="<?echo $row[education_area]?>" placeholder=""/></div>
										</div>
										<div class="form-group" style="margin-bottom: 5px">
											<label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 교육일</label>
											<div class="col-sm-5">
												<div class="input-group date">
                                                    <span class="input-group-btn" style="vertical-align: top">
                                                        <button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
                                                    </span>
													<input type="text" class="form-control input-sm" id="education_date" name="education_date" value="<?echo $row[education_date]?>">
												</div>                                                
											</div>
											<label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 접수기간</label>
											<div class="col-sm-5">
												<div class="col-sm-6" style="padding: 0px; padding-right: 2px">
													<div class="input-group date">
														<span class="input-group-btn" style="vertical-align: top">
															<button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
														</span>
														<input type="text" class="form-control input-sm" id="receive_start_date" name="receive_start_date" value="<?echo $row[receive_start_date]?>" placeholder="접수시작일">
													</div>                                                
												</div>
												<div class="col-sm-6" style="padding: 0px; padding-left: 2px">
													<div class="input-group date">
														<span class="input-group-btn" style="vertical-align: top">
															<button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
														</span>
														<input type="text" class="form-control input-sm" id="receive_end_date" name="receive_end_date" value="<?echo $row[receive_end_date]?>" placeholder="접수종료일">
													</div>                                                
												</div>
											</div>
										</div>

                                        <!-- <div class="form-group" style="margin-bottom: 5px">
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
                                        </div> -->

										<div class="form-group" style="margin-bottom: 5px">
											<label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">교육안내</label>
											<div class="col-sm-11">
                                                <textarea id="education_content" name="education_content" runat="server" class="summernote" clientIDMode="static"><?echo $row[education_content]?></textarea>
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
                                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                                            <a type="button" class="btn btn-sm btn-success" id="education_delete">Delete</a>
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

            $("#education_edit").validate({
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
                    if (confirm("수정 하시겠습니까?")) {
                        var education_content = $('textarea[name="education_content"]').html($('#education_content').code());
                        form.submit();
                    }     
                }
            });
            
            $("#education_delete").click(function(){
                if (confirm('삭제 하시겠습니까?')) {
                    location.replace('education_crud.php?db_access_flag=education_delete&education_seq=<?echo $row[education_seq]?>');
                }
            });
        });
        
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
