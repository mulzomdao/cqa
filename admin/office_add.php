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

                                    <form role="form" id="office_add" action="office_crud.php" method="post">
                                        <input type="hidden" id="db_access_flag" name="db_access_flag" value="office_add">

                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 지회/지부</label>
                                            <div class="col-sm-5">
                                                <div class="col-sm-6" style="padding-left: 0px; padding-right: 2px">
                                                    <input type="text" class="form-control input-sm" name="office_num" id="office_num" value="<?echo $_GET[office_num]?>" placeholder="지회번호">
                                                </div>
                                                <div class="col-sm-6" style="padding-left: 2px; padding-right: 0px">
                                                    <input type="text" class="form-control input-sm" name="sub_office_num" id="sub_office_num" value="" placeholder="지부번호">
                                                </div>                                            
                                            </div>

                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 성명</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" name="member_name" id="member_name" value=""></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 지역</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" name="office_area" id="office_area" value=""></div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 상호명</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" name="office_name" id="office_name" value=""></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 휴대폰</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" placeholder="'-' 없이 입력하세요" name="mobile" id="mobile" value=""></div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">이메일</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" name="email" id="email" value=""></div>
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
                                                        <span class="fileinput-new"><small>Select file</small></span>
                                                        <span class="fileinput-exists"><small>Change</small></span>
                                                        <input type="file" name="..."/>
                                                    </span>
                                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><small>Remove</small></a>
                                                </div> 

                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 승인여부</label>
                                            <div class="col-sm-5">
                                                <label class="radio-inline"><input type="radio" value="Y" name="confirm_flag" id="confirm_flag" checked> 승인 </label> 
                                                <label class="radio-inline"><input type="radio" value="N" name="confirm_flag" id="confirm_flag"> 비승인 </label> 
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">샵전화</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" placeholder="'-' 없이 입력하세요" name="shop_phone" id="shop_phone" value=""></div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">집전화</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" placeholder="'-' 없이 입력하세요" name="phone" id="phone" value=""></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 0px">                             
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px; padding-top: 24px;">샵주소</label>
                                            <div class="col-sm-5">
                                                <div class="col-sm-3" style="padding: 0px; margin-bottom: 5px">
                                                    <div class="input-group"><input type="text" class="form-control input-sm" name="shop_zip_code" id="shop_zip_code" value="" placeholder="우편번호">
                                                        <span class="input-group-btn">
                                                            <a type="button" class="btn btn-sm btn-primary" style="margin-bottom: 0px;"><i class="fa fa-search"></i></a> 
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9" style="padding-left: 4px; padding-right: 0px;">
                                                    <input type="text" class="form-control input-sm" name="shop_zip_address" id="shop_zip_address" value="">
                                                </div>
                                                <div class="col-sm-12" style="padding: 0px; margin-bottom: 5px">
                                                    <input type="text" class="form-control input-sm" name="shop_detail_address" id="shop_detail_address" value="">
                                                </div>
                                            </div>

                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px; padding-top: 24px;">집주소</label>
                                            <div class="col-sm-5">
                                                <div class="col-sm-3" style="padding: 0px; margin-bottom: 5px">
                                                    <div class="input-group"><input type="text" class="form-control input-sm" name="zip_code" id="zip_code" value="" placeholder="우편번호">
                                                        <span class="input-group-btn">
                                                            <a type="button" class="btn btn-sm btn-primary" style="margin-bottom: 0px;"><i class="fa fa-search"></i></a> 
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9" style="padding-left: 4px; padding-right: 0px;">
                                                    <input type="text" class="form-control input-sm" name="zip_address" id="zip_address" value="">
                                                </div>
                                                <div class="col-sm-12" style="padding: 0px; margin-bottom: 5px">
                                                    <input type="text" class="form-control input-sm" name="detail_address" id="detail_address" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">홈페이지</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" name="homepage" id="homepage" value="" placeholder="http://"></div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 등록자</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" name="reg_id" id="reg_id" value="admin" readonly></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">메모</label>
                                            <div class="col-sm-11"><textarea class="form-control" rows="4" name="office_memo" id="office_memo"></textarea></div>
                                        </div>

                                        <div class="form-group pull-right" style="margin-bottom: 5px; padding-right: 15px">
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

    <script>

        $(document).ready(function() {

            $("#office_add").validate({
                rules: {
                    office_num: {
                        required: true,
                        rangelength: [2, 20]
                    },
                    member_name: {
                        required: true,
                        rangelength: [2, 20]
                    }, 
                    office_area: {
                        required: true,
                        rangelength: [2, 20]
                    }, 
                    office_name: {
                        required: true,
                        rangelength: [2, 20]
                    }, 
                    mobile: {
                        required: true,
                        rangelength: [9, 14]
                    }, 
                    email: {
                        email: true
                    }, 
                    shop_phone: {
                        rangelength: [9, 14]
                    }, 
                    phone: {
                        rangelength: [9, 14]
                    }, 
                    homepage: {
                        url: true
                    }

                }, submitHandler: function (form) {
                    if (confirm("등록 하시겠습니까?")) {
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
