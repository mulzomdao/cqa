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
                                    <form role="form" id="member_add" action="member_crud.php" method="post">
                                        <input type="hidden" id="db_access_flag" name="db_access_flag" value="member_add">

                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 추천인</label>
                                            <div class="col-sm-5">
                                                <select class="form-control input-sm m-b" name="recommend_id" id="recommend_id" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                    <option value=''>추천인선택</option>
                                                    <option value='10'>[LYDIA 30] 장흥숙 (10-00)</option>
                                                    <option value='07'>[S퀼트] 송재란 (07-00)</option>
                                                    <option value='09'>[그린퀼트] 김경주 (09-00)</option>
                                                    <option value='04-01'>[생활의향기] 이현정 (04-01)</option>
                                                    <option value='07-07'>[소소공방] 현미경 (07-07)</option>
                                                    <option value='08'>[아원퀼트] 최은영 (08-00)</option>
                                                    <option value='03-05'>[요술나라 요술 손] 유미숙 (03-05)</option>
                                                    <option value='01-04'>[퀼트 수작] 변성혜 (01-04)</option>
                                                    <option value='08-03'>[퀼트 조] 조현화 (08-03)</option>
                                                    <option value='11-03'>[퀼트&돌] 오승미 (11-03)</option>
                                                    <option value='07-04'>[퀼트&미] 김미정 (07-04)</option>
                                                    <option value='09-05'>[퀼트나들이] 박정애 (09-05)</option>
                                                    <option value='07-06'>[퀼트바람] 이수연 (07-06)</option>
                                                    <option value='01'>[퀼트지음] 엄재영/오선희 (01-00)</option>
                                                    <option value='03'>[한혜경퀼트] 한혜경 (03-00)</option>
                                                    <option value='03-04'>[허니비퀼트] 김정미 (03-04)</option>
                                                    <option value='00-00'>추천인 없음 (00-00)</option>
                                                </select>
                                            </div>                           
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">사진</label>
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
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"> 시작일</label>
                                            <div class="col-sm-5">
                                                <div class="input-group date">                                                    
                                                    <span class="input-group-btn" style="vertical-align: top">
                                                        <button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                    <input id="right_start_date" name="right_start_date" type="text" class="form-control input-sm" value="<?echo $_date?>" readonly style="background: white">
                                                </div>
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 자격선택</label>
                                            <div class="col-sm-5">
                                                <select class="form-control input-sm m-b" name="member_right" id="member_right" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                    <option value="0">준회원 (cqa웹사이트 열람만 가능)</option>
                                                    <option value="1">정회원 1년 (30,000원)</option>
                                                    <option value="2">정회원 2년 (50,000원)</option>
                                                    <option value="3">정회원 3년 (70,000원)</option>
                                                    <option value="100">정회원 평생 (300,000원)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 0px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 아이디</label>
                                            <div class="col-sm-5">
                                                <div class="input-group">
                                                    <input type="text" class="form-control input-sm" name="member_id" id="member_id" value="">
                                                    <span class="input-group-btn" style="vertical-align: top">
                                                        <a type="button" class="btn btn-sm btn-primary">중복확인</i></a> 
                                                    </span>
                                                </div>
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 레벨</label>
                                            <div class="col-sm-5">
                                                <select class="form-control input-sm m-b" name="member_level" id="member_level" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                    <option value="9">레벨9 (준회원)</option>
                                                    <option value="8">레벨8 (상실회원)</option>
                                                    <option value="7">레벨7 (정회원)</option>
                                                    <option value="6">레벨6 (지부장)</option>
                                                    <option value="5">레벨5 (지회장)</option>
                                                    <option value="4">레벨4 </option>
                                                    <option value="3">레벨3 (관리자)</option>
                                                    <option value="2">레벨2 </option>
                                                    <option value="1">레벨1 (최고관리자)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 비밀번호</label>
                                            <div class="col-sm-5"><input type="password" class="form-control input-sm" name="member_password" id="member_password" value=""></div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 비밀번호확인</label>
                                            <div class="col-sm-5"><input type="password" class="form-control input-sm" name="member_password_confirm" id="member_password_confirm" value=""></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 한글성명</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" name="member_name" id="member_name" value=""></div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">영문성명</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" name="member_eng_name" id="member_eng_name" value=""></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">생년월일</label>
                                            <div class="col-sm-5">       
                                                <div class="col-sm-4" style="padding-left: 0px; padding-right: 2px;">                                                
                                                    <select class="form-control input-sm m-b" name="birth_year" id="birth_year" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                        <option value="">년도</option>
                                                    <?
                                                        for ($i = 2010; $i >= 1950; $i--) {                                                        
                                                            echo "<option value='" . $i . "'>" . $i . "년</option>";
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4" style="padding-left: 2px; padding-right: 2px;">                                              
                                                    <select class="form-control input-sm m-b" name="birth_month" id="birth_month" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                        <option value="">월</option>
                                                    <?
                                                        for ($i = 01; $i <= 12; $i++) {
                                                            $month = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                            echo "<option value='" . $month . "'>" . $i . "월</option>";
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4" style="padding-left: 2px; padding-right: 0px;">                                         
                                                    <select class="form-control input-sm m-b" name="birth_date" id="birth_date" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                        <option value="">일</option>
                                                    <?
                                                        for ($i = 01; $i <= 31; $i++) {
                                                            $date = str_pad($i, 2, "0", STR_PAD_LEFT);
                                                            echo "<option value='" . $date . "'>" . $i . "일</option>";
                                                        }
                                                    ?>
                                                    </select>
                                                </div>                                        
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 핸드폰</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control input-sm" placeholder="'-'없이 입력하세요" name="mobile" id="mobile">
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">전화</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control input-sm" placeholder="'-'없이 입력하세요" name="phone" id="phone">
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">이메일</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" name="email" id="email" value=""></div>
                                        </div>

                                        <div class="form-group" style="margin-bottom: 0px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">우편번호</label>
                                            <div class="col-sm-5">
                                                <div class="col-sm-3" style="padding: 0px;">
                                                    <div class="input-group"><input type="text" class="form-control input-sm" name="zip_code" id="zip_code" value="" placeholder="우편번호">
                                                        <span class="input-group-btn">
                                                            <a type="button" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></a> 
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9" style="padding-left: 4px; padding-right: 0px;">
                                                    <input type="text" class="form-control input-sm" value="" name="zip_address" id="zip_address">
                                                </div>
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">상세주소</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" value="" name="detail_address" id="detail_address"></div>
                                        </div>

                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">회원메모</label>
                                            <div class="col-sm-11"><textarea class="form-control" rows="4" name="member_memo" id="member_memo"></textarea></div>
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

            $('#right_start_date').datepicker({
                format: "yyyy-mm-dd",
                language: "kr",
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: false,
                autoclose: true
            });

            $("#member_add").validate({
                rules: {
                    recommend_id: {
                        required: true
                    }, 
                    member_id: {
                        required: true,
                        rangelength: [4, 20]
                    }, 
                    member_password: {
                        required: true,
                        rangelength: [4, 20]
                    }, 
                    member_password_confirm: {
                        required: true,
                        rangelength: [4, 20],
                        equalTo: '#member_password'
                    }, 
                    member_name: {
                        required: true,
                        rangelength: [2, 20]
                    },
                    member_eng_name: {
                        rangelength: [8, 40]
                    }, 
                    email: {
                        email: true
                    }, 
                    mobile: {
                        required: true,                        
                        rangelength: [9, 14]
                    },
                    phone: {
                        rangelength: [9, 14]
                    }
                }, submitHandler: function (form) {
                    if (confirm("등록 하시겠습니까?")) {
                        form.submit();
                    }     
                }
            });

        });
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
