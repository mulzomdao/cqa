<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    if ($_GET[no_name_subject] != "") {
        $filter .= "and (a.exam_receive_no like '%$_GET[no_name_subject]%' or a.member_name like '%$_GET[no_name_subject]%' or a.receive_subject like '%$_GET[no_name_subject]%')";
    }
    if ($_GET[exam_seq] != "") {
        $filter .= "and a.exam_seq = '$_GET[exam_seq]'";
    }
    if ($_GET[receive_type] != "") {
        $filter .= "and a.receive_type = '$_GET[receive_type]'";
    }
    if ($_GET[receive_status] != "") {
        $filter .= "and a.receive_status = '$_GET[receive_status]'";
    }

    $query = "
        select count(*) total 
          from cqa_exam_receive_v a
         where 1 = 1
           and a.use_flag = 'Y' $filter
    ";
	$result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    $total = $row['total'];

    $query = " 
        SELECT a.exam_receive_seq
             , a.exam_receive_no
             , a.exam_seq
             , a.member_id
             , a.receive_subject
             , a.receive_type
             , a.receive_status
             , a.member_name
             , a.mobile
             , b.exam_name
             , b.exam_date
          FROM cqa_exam_receive_v a
             , cqa_exam_v b
         where a.exam_seq = b.exam_seq
           and a.use_flag = 'Y' $filter
         order by a.exam_receive_seq desc
    ";    
    // var_dump($query);
    $result = mysqli_query($connect, $query);

    $query = "
        select exam_seq
             , exam_name
          From cqa_exam_v
         where use_flag = 'Y'
         order by exam_seq desc
    ";    
    // var_dump($query);
    $exam_result = mysqli_query($connect, $query);
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
                    <h2>시험접수목록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>자격시험/접수관리</a>
                        </li>
                        <li class="active">
                            <strong>시험접수관리</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight ecommerce">                                    
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>시험접수목록조회</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <div class="row">

                            <form role="form" id="exam_receive_list" action="exam_receive_list.php" method="get">
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
                                            
                                            <select class="form-control input-sm m-b" id="exam_seq" name="exam_seq" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value="">자격검정</option>
                                                <?while ($rows = mysqli_fetch_array($exam_result)) {?>
                                                <option value="<?echo $rows[exam_seq]?>" <?if ($rows[exam_seq] == $_GET[exam_seq]) {echo "selected";}?>><?echo $rows[exam_name]?></option>
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
                                                <?array_combo($_receive_type, $_GET[receive_type])?>       
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
                                                <?array_combo($_exam_receive_status, $_GET[receive_status])?>       
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
                                <th data-hide="phone" class="text-center">수험번호</th>
                                <th data-hide="phone" class="text-center">성명</th>
                                <th data-hide="phone" class="text-center">응시시험</th>
                                <th data-hide="phone" class="text-center">응시유형</th>
                                <th data-hide="phone" class="text-center">검정일시</th>
                                <th data-hide="phone" class="text-center">연락처</th>
                                <th data-hide="phone" class="text-center">검정과목</th>
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
                                <td><a href="exam_receive_edit.php?exam_receive_seq=<?echo $rows[exam_receive_seq]?>"><?echo $rows[exam_receive_no]?></a></td>
                                <td><?echo $rows[member_name]?></td>
                                <td><?echo $rows[exam_name]?></td>
                                <td><?echo $_receive_type[$rows[receive_type]]?></td>
                                <td><?echo $rows[exam_date]?></td>
                                <td><?echo phone_number($rows[mobile])?></td>
                                <td><?echo $rows[receive_subject]?></td>
                                <td><?echo $_exam_receive_status[$rows[receive_status]]?></td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="exam_receive_edit.php?exam_receive_seq=<?echo $rows[exam_receive_seq]?>">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="javascript:exam_receive_delete(<?echo $rows[exam_receive_seq]?>)">Delete</a>
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
                                    <a type="button" class="btn btn-sm btn-success" href="exam_receive_add.php">Add</a>
                                    <!-- <a type="button" class="btn btn-sm btn-success">Excel Down</a> -->
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

            $("#exam_receive_list").validate({
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

        function exam_receive_delete(exam_receive_seq) {
            if (confirm("삭제하시겠습니까?")) {
                location.href="exam_receive_crud.php?db_access_flag=exam_receive_delete&exam_receive_seq=" + exam_receive_seq;
            }
        }
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
