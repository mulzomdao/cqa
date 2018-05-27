<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    if ($_GET[no_name_subject] != "") {
        $filter .= "and (a.education_receive_no like '%$_GET[no_name_subject]%' or a.member_name like '%$_GET[no_name_subject]%' or a.receive_subject like '%$_GET[no_name_subject]%')";
    }
    if ($_GET[education_status] != "") {
        $filter .= "and a.education_seq = '$_GET[education_seq]'";
    }
    if ($_GET[education_status] != "") {
        $filter .= "and a.receive_type = '$_GET[receive_type]'";
    }
    if ($_GET[education_status] != "") {
        $filter .= "and a.receive_status = '$_GET[receive_status]'";
    }

    $query = "
        select count(*) total 
          from cqa_education_receive a
         where use_flag = 'Y' $filter
    ";
	$result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    $total = $row['total'];

    $query = " 
        SELECT a.education_receive_seq
		     , a.education_seq
		     , a.member_id
             , a.member_name
		     , a.mobile
		     , a.email
		     , a.receive_status
		     , a.use_flag
		     , a.reg_id
		     , a.reg_date
		     , a.modify_id
		     , date_format(a.reg_date, '%Y-%m-%d %H:%i:%s' ) AS reg_date
		     , a.modify_id AS modify_id
		     , date_format(a.modify_date, '%Y-%m-%d %H:%i:%s' ) AS modify_date
		     , b.education_name
		     , b.education_area
             , b.education_date
		  FROM cqa_education_receive a
		     , cqa_education_v b
		 where a.education_seq = b.education_seq
           and a.use_flag = 'Y' $filter
         order by a.education_receive_seq desc
    ";    
    // var_dump($query);
    $result = mysqli_query($connect, $query);

    $query = "
        select education_seq
             , education_name
          From cqa_education_v
         where use_flag = 'Y'
         order by education_seq desc
    ";    
    // var_dump($query);
    $education_result = mysqli_query($connect, $query);
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
                    <h2>교육접수목록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>교육/접수관리</a>
                        </li>
                        <li class="active">
                            <strong>교육접수관리</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight ecommerce">                                    
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>교육접수목록조회</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <div class="row">
                            

                            <form role="form" id="education_receive_list" action="education_receive_list.php" method="get">
                                <div class="col-sm-3" style="padding-left: 15px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-sm" id="no_name_subject" name="no_name_subject" value="<?echo $_GET[no_name_subject]?>" placeholder="수험번호 / 수험자명 / 검정과목">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            
                                            <select class="form-control input-sm m-b" id="education_seq" name="education_seq" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value="">응시시험</option>
                                                <?while ($rows = mysqli_fetch_array($education_result)) {?>
                                                <option value="<?echo $rows[education_seq]?>" <?if ($rows[education_seq] == $_GET[education_seq]) {echo "selected";}?>><?echo $rows[education_name]?></option>
                                                <?}?>
                                            </select>
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-control input-sm m-b" id="receive_type" name="receive_type" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value="">응시유형</option>
                                                <option value="EXAM" <?if ($_GET[receive_type] == "EXAM") {echo "selected";}?>><?echo $_receive_type[EXAM]?></option>
                                                <option value="education_FREE" <?if ($_GET[receive_type] == "education_FREE") {echo "selected";}?>><?echo $_receive_type[education_FREE]?></option>
                                                <option value="TRANS" <?if ($_GET[receive_type] == "TRANS") {echo "selected";}?>><?echo $_receive_type[TRANS]?></option>
                                            </select>
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>       
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-control input-sm m-b" id="receive_status" name="receive_status" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value="">상태</option>
                                                <option value="NO_CHARGE" <?if ($_GET[receive_status] == "NO_CHARGE") {echo "selected";}?>><?echo $_education_RECEIVE_STATUS[NO_CHARGE]?></option>
                                                <option value="CHARGE" <?if ($_GET[receive_status] == "CHARGE") {echo "selected";}?>><?echo $_education_RECEIVE_STATUS[CHARGE]?></option>
                                                <option value="NO_PASS" <?if ($_GET[receive_status] == "NO_PASS") {echo "selected";}?>><?echo $_education_RECEIVE_STATUS[NO_PASS]?></option>
                                                <option value="PASS" <?if ($_GET[receive_status] == "PASS") {echo "selected";}?>><?echo $_education_RECEIVE_STATUS[PASS]?></option>
                                            </select>
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <table class="footable table table-stripped" data-page-size="20" style="margin-bottom: 0px">
                            <thead>
                            <tr>
                                <th width="48" class="text-center">No</th>
                                <th data-hide="phone" class="text-center">교육</th>
                                <th data-hide="phone" class="text-center">교육일시</th>
                                <th data-hide="phone" class="text-center">성명</th>
                                <th data-hide="phone" class="text-center">연락처</th>
                                <th data-hide="phone" class="text-center">교육장소</th>
                                <th data-hide="phone" class="text-center">상태</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
<?
    while ($rows = mysqli_fetch_array($result)) {
?>
                            <tr class="text-center">
                                <td><?echo $total?></td>
                                <td><a href="education_receive_edit.php?education_receive_seq=<?echo $rows[education_receive_seq]?>"><?echo $rows[education_name]?></a></td>
                                <td><?echo $rows[education_date]?></td>
                                <td><?echo $rows[member_name]?></td>
                                <td><?echo $rows[mobile]?></td>
                                <td><?echo $rows[education_area]?></td>
                                <td><?echo $_EDUCATION_RECEIVE_STATUS[$rows[receive_status]]?></td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="education_receive_edit.php?education_receive_seq=<?echo $rows[education_receive_seq]?>">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="javascript:education_receive_delete(<?echo $rows[education_receive_seq]?>)">Delete</a>
                                    </div>
                                </td>
                            </tr>
<?
        $total--;
    }
?>                  
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="4" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">
                                    <a type="button" class="btn btn-sm btn-success" href="education_receive_add.php">Add</a>
                                    <!--<a type="button" class="btn btn-sm btn-success">Excel Down</a>-->
                                </td>
                                <td colspan="7" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <?include "include/admin_bottom.php"?>

        </div>        
    </div>

    <?include "include/admin_js.php"?>

    <script>
        $(document).ready(function() {

            $('.footable').footable();

            $("#education_receive_list").validate({
                rules: {
                    no_name_subject: {
                        minlength: 2,
                        maxlength: 20
                    }
                }, submitHandler: function (form) {
                    form.submit();
                }
            });

        });

        function education_receive_delete(education_receive_seq) {
            if (confirm("삭제하시겠습니까?")) {
                location.href="education_receive_crud.php?db_access_flag=education_receive_delete&education_receive_seq=" + education_receive_seq;
            }
        }
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
