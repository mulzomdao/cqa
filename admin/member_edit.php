<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    $query = "
        SELECT member_id
             , member_no
             , office_id
             , member_name
             , member_eng_name
             , member_password
             , member_level
             , member_right
             , case when member_right != 0 THEN DATE_FORMAT(a.right_start_date, '%Y-%m-%d')
               end right_start_date
             , case when member_right != 0 THEN DATE_FORMAT(a.right_end_date, '%Y-%m-%d')
               end right_end_date
             , CASE when member_right = 0 THEN 'TEMP' 
                    WHEN right_start_date < NOW() and now() <= right_end_date then 'ACTIVE'
                    else 'END'
               end right_flag
             , DATE_FORMAT(a.birthday, '%Y-%m-%d') birthday
             , DATE_FORMAT(a.birthday, '%Y') birth_year
             , DATE_FORMAT(a.birthday, '%m') birth_month
             , DATE_FORMAT(a.birthday, '%d') birth_date
             , sex
             , mobile
             , email
             , homepage
             , phone
             , zip_code
             , zip_address
             , detail_address
             , member_memo
             , use_flag
             , reg_id
             , DATE_FORMAT(a.reg_date, '%Y-%m-%d') reg_date
             , modify_id
             , DATE_FORMAT(a.modify_date, '%Y-%m-%d') modify_date
          FROM cqa_member a
         where use_flag = 'Y'
           and member_id = '$_GET[member_id]'
    ";    
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);

    $query = "
        select office_id
             , office_info
          From cqa_office_id_v
    ";    
    // var_dump($query);
    $office_id_result = mysqli_query($connect, $query);
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
                    <h2>회원상세</h2>
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
                    <div class="col-lg-6">

                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>회원일반정보</small></h5>
                            </div>
                            <div class="ibox-content" style="padding-bottom: 10px">  
                                <fieldset class="form-horizontal">
                                    <form role="form" id="member_edit" action="member_crud.php" method="post">
                                        <input type="hidden" id="db_access_flag" name="db_access_flag" value="member_edit">

                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 회원번호</label>
                                            <div class="col-sm-10"><input type="text" class="form-control input-sm" id="member_no" name="member_no" value="<?echo $row[member_no]?>" readonly></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 추천인</label>
                                            <div class="col-sm-10">
                                                <select class="form-control input-sm m-b" name="office_id" id="office_id" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                    <option value=''>추천인선택</option>
                                                    <?while ($rows = mysqli_fetch_array($office_id_result)) {?>
                                                    <option value="<?echo $rows[office_id]?>" <?if ($row[office_id] == $rows[office_id]) {echo "selected";}?>><?echo $rows[office_info]?></option>
                                                    <?}?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px">최종등록현황</label>
                                            <div class="col-sm-10"><input type="text" class="form-control input-sm" value="<?echo $row[right_start_date]?> ~ <?echo $row[right_end_date]?>" readonly></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 시작일</label>
                                            <div class="col-sm-10">
                                                <div class="input-group date">
                                                    <span class="input-group-btn" style="vertical-align: top">
                                                        <button type="button" class="btn btn-sm btn-white" style="border-right-width: 0px; margin-bottom: 0px"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                    <input id="right_start_date" name="right_start_date" type="text" class="form-control input-sm" value="<?echo $row[right_start_date]?>" readonly style="background: white">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 자격선택</label>
                                            <div class="col-sm-10">
                                                <select class="form-control input-sm m-b" name="member_right" id="member_right" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                    <?array_combo($_member_right, $row[member_right])?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 아이디</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control input-sm" name="member_id" id="member_id" value="<?echo $row[member_id]?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 레벨</label>
                                            <div class="col-sm-10">
                                                <select class="form-control input-sm m-b" name="member_level" id="member_level" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                    <option value=''>레벨선택</option>     
                                                    <?array_combo($_member_level, $row[member_level])?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 비밀번호</label>
                                            <div class="col-sm-10"><input type="password" class="form-control input-sm" name="member_password" id="member_password" value="<?echo $row[member_password]?>"></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 비밀번호확인</label>
                                            <div class="col-sm-10"><input type="password" class="form-control input-sm" name="member_password_confirm" id="member_password_confirm" value="<?echo $row[member_password]?>"></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 한글성명</label>
                                            <div class="col-sm-10"><input type="text" class="form-control input-sm" name="member_name" id="member_name" value="<?echo $row[member_name]?>"></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px">영문성명</label>
                                            <div class="col-sm-10"><input type="text" class="form-control input-sm" name="member_eng_name" id="member_eng_name" value="<?echo $row[member_eng_name]?>"></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px">생년월일 / 성별</label>
                                            <div class="col-sm-10">                                                     
                                                <div class="col-sm-3" style="padding-left: 0px; padding-right: 2px;">                                                
                                                    <select class="form-control input-sm m-b" name="birth_year" id="birth_year" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                        <option value="">년도</option>
                                                        <?number_combo(2010, 1950, 0, $row[birth_year])?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3" style="padding-left: 2px; padding-right: 2px;">                                              
                                                    <select class="form-control input-sm m-b" name="birth_month" id="birth_month" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                        <option value="">월</option>
                                                        <?number_combo(1, 12, 2, $row[birth_month])?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3" style="padding-left: 2px; padding-right: 2px;">                                         
                                                    <select class="form-control input-sm m-b" name="birth_date" id="birth_date" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                        <option value="">일</option>
                                                        <?number_combo(1, 31, 2, $row[birth_date])?>
                                                    </select>
                                                </div>     
                                                <div class="col-sm-3" style="padding-left: 2px; padding-right: 0px;">                                         
                                                    <select class="form-control input-sm m-b" name="sex" id="sex" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                        <option value="">성별</option>
                                                        <?array_combo($_sex, $row[sex])?>
                                                    </select>
                                                </div>     
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 핸드폰</label>
                                            <div class="col-sm-10"><input type="text" class="form-control input-sm" name="phone" id="phone" value="<?echo $row[phone]?>"></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px">전화</label>
                                            <div class="col-sm-10"><input type="text" class="form-control input-sm" name="mobile" id="mobile" value="<?echo $row[mobile]?>"></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px">이메일</label>
                                            <div class="col-sm-10"><input type="text" class="form-control input-sm" name="email" id="email" value="<?echo $row[email]?>"></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px">홈페이지</label>
                                            <div class="col-sm-10"><input type="text" class="form-control input-sm" name="homepage" id="homepage" value="<?echo $row[homepage]?>"></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 0px">
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px; padding-top: 24px;">주소</label>
                                            <div class="col-sm-10">
                                                <div class="col-sm-3" style="padding: 0px;">
                                                    <div class="input-group"><input type="text" class="form-control input-sm" name="zip_code" id="zip_code" placeholder="우편번호" value="<?echo $row[zip_code]?>">
                                                        <span class="input-group-btn">
                                                            <a type="button" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></a> 
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9" style="padding-left: 4px; padding-right: 0px;">
                                                    <input type="text" class="form-control input-sm" name="zip_address" id="zip_address" value="<?echo $row[zip_address]?>">
                                                </div>
                                                <div class="col-sm-12" style="padding: 0px; margin-bottom: 5px">
                                                    <input type="text" class="form-control input-sm" name="detail_address" id="detail_address" value="<?echo $row[detail_address]?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">                                        
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px">사진</label>
                                            <div class="col-sm-10">
                                            
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
                                            <label class="col-sm-2 control-label" style="padding-left: 0px; padding-right: 0px">회원메모</label>
                                            <div class="col-sm-10"><textarea class="form-control" name="member_memo" id="member_memo" rows="4"><?echo $row[member_memo]?></textarea></div>
                                        </div>

                                        <div class="form-group pull-right" style="margin-bottom: 5px; padding-right: 15px">
                                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                                            <a type="button" class="btn btn-sm btn-success" id="member_delete">Delete</a>
                                            <a type="button" class="btn btn-sm btn-success" href="javascript:history.go(-1)">Cancel</a>
                                        </div>
                                    </form>
                                </fieldset>

                            </div>
                        </div>
                    </div>  

                    <div class="col-lg-6">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>협회자격정보</h5>
                            </div>
                            <div class="ibox-content" style="padding: 15px">                                
                                <table class="footable table table-stripped" data-page-size="20" style="margin-bottom: 0px">
                                    <thead>
                                    <tr>
                                        <th data-hide="phone">자격상태</th>
                                        <th data-hide="phone" class="text-center">자격기간</th>
                                        <th data-hide="phone" class="text-center">시작일</th>
                                        <th data-hide="phone" class="text-center">종료일</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="footable-even">
                                        <td>유효</td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">2017-08-28</td>
                                        <td class="text-center">2018-08-27</td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a type="button" class="btn btn-xs btn-white" href="board_manager_edit.php">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>시험응시정보</h5>
                            </div>
                            <div class="ibox-content" style="padding: 15px">                                
                                <table class="footable table table-stripped toggle-arrow-tiny" style="margin-bottom: 0px; border: 1px">
                                    <thead>
                                    <tr>
                                        <th data-hide="phone">시험명</th>
                                        <th data-hide="phone" class="text-center">결과</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2018년 2급 자격검정 면제및 시험</td>
                                        <td class="text-center">합격</td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a type="button" class="btn btn-xs btn-white" href="board_manager_edit.php">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>교육정보</h5>
                            </div>
                            <div class="ibox-content" style="padding: 15px">                                
                                <table class="table" style="margin-bottom: 0px">
                                    <thead>
                                    <tr>
                                        <th data-hide="phone">교재명</th>
                                        <th data-hide="phone" class="text-center">금액</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>10 템플릿이용 곡선피싱</td>
                                        <td class="text-center">12,000</td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a type="button" class="btn btn-xs btn-white" href="board_manager_edit.php">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="7" style="padding-right: 0px; padding-left: 0px">
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
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

            $("#member_edit").validate({
                rules: {
                    office_id: {
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
                    homepage: {
                        url: true
                    }, 
                    mobile: {
                        required: true,
                        rangelength: [9, 14]
                    }, 
                    phone: {
                        rangelength: [9, 14]
                    }
                }, submitHandler: function (form) {
                    if (confirm("수정 하시겠습니까?")) {
                        form.submit();
                    }     
                }
            });
            
            $("#member_delete").click(function(){
                if (confirm('삭제 하시겠습니까?')) {
                    location.replace('member_crud.php?db_access_flag=member_delete&member_id=<?echo $row[member_id]?>');
                }
            });

        });
        
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
