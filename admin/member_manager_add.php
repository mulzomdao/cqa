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
                    <h2>회원등록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <strong>회원관리</strong>
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
                                <h5>회원일반정보</small></h5>
                            </div>
                            <div class="ibox-content" style="padding-bottom: 10px">                    

                                <fieldset class="form-horizontal">

                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">회원번호</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>                                        
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">사진</label>
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
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">추천인</label>
                                        <div class="col-sm-5">
                                            <select class="form-control input-sm m-b" name="account" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value=''>추천인선택</option>
                                                <option value='10'>[LYDIA 30] 장흥숙 (10-00)</option>
                                                <option value='07' >[S퀼트] 송재란 (07-00)</option>
                                                <option value='09' >[그린퀼트] 김경주 (09-00)</option>
                                                <option value='04-01' >[생활의향기] 이현정 (04-01)</option>
                                                <option value='07-07' >[소소공방] 현미경 (07-07)</option>
                                                <option value='08' >[아원퀼트] 최은영 (08-00)</option>
                                                <option value='03-05' >[요술나라 요술 손] 유미숙 (03-05)</option>
                                                <option value='01-04' >[퀼트 수작] 변성혜 (01-04)</option>
                                                <option value='08-03' >[퀼트 조] 조현화 (08-03)</option>
                                                <option value='11-03' >[퀼트&돌] 오승미 (11-03)</option>
                                                <option value='07-04' >[퀼트&미] 김미정 (07-04)</option>
                                                <option value='09-05' >[퀼트나들이] 박정애 (09-05)</option>
                                                <option value='07-06' >[퀼트바람] 이수연 (07-06)</option>
                                                <option value='01' >[퀼트지음] 엄재영/오선희 (01-00)</option>
                                                <option value='03' >[한혜경퀼트] 한혜경 (03-00)</option>
                                                <option value='03-04' >[허니비퀼트] 김정미 (03-04)</option>
                                                <option value="00-00" >추천인 없음 (00-00)</option>
                                            </select>
                                        </div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">최종등록현황</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">시작일</label>
                                        <div class="col-sm-5">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input id="date_added" type="text" class="form-control input-sm" value="">
                                            </div>
                                        </div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">자격선택</label>
                                        <div class="col-sm-5">
                                            <select class="form-control input-sm m-b" name="account" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option>자격선택</option>
                                                <option>준회원 (cqa웹사이트 열람만 가능)</option>
                                                <option>정회원 1년 (30,000원)</option>
                                                <option>정회원 2년 (50,000원)</option>
                                                <option>정회원 3년 (70,000원)</option>
                                                <option>정회원 평생 (300,000원)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">아이디</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">레벨</label>
                                        <div class="col-sm-5">
                                            <select class="form-control input-sm m-b" name="account" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option>레벨선택</option>
                                                <option value="9" >레벨9 (준회원)</option>
                                                <option value="8" >레벨8 (상실회원)</option>
                                                <option value="7" >레벨7 (정회원)</option>
                                                <option value="6" >레벨6 (지부장)</option>
                                                <option value="5" >레벨5 (지회장)</option>
                                                <option value="4" >레벨4 </option>
                                                <option value="3" >레벨3 (관리자)</option>
                                                <option value="2" >레벨2 </option>
                                                <option value="1" >레벨1 (최고관리자)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">비밀번호</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">비밀번호확인</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">한글성명</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">영문성명</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">이메일</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">홈페이지</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" value=""></div>
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
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">회원메모</label>
                                        <div class="col-sm-11"><textarea class="form-control" rows="4"></textarea></div>
                                    </div>

                                    <div class="form-group pull-right" style="margin-bottom: 5px; padding-right: 15px">
                                        <a type="button" class="btn btn-sm btn-success" href="#">Add</a>
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
