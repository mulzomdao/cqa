<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    if ($_GET[education_name] != "") {
        $filter .= "and education_name like '%$_GET[education_name]%'";
    }
    if ($_GET[education_start_date] != "" && $_GET[education_end_date] != "") {
        $filter .= "and education_date >= '$_GET[education_start_date]' and education_date <= '$_GET[education_end_date]'";
    } elseif ($_GET[education_start_date] != "") {
        $filter .= "and education_date >= '$_GET[education_start_date]'";
    } elseif ($_GET[education_end_date] != "") {
        $filter .= "and education_date <= '$_GET[education_end_date]'";
    }
    if ($_GET[education_status] != "") {
        $filter .= "and education_status = '$_GET[education_status]'";
    }

    $query = "
        select count(*) total 
          from cqa_education
         where use_flag = 'Y' $filter
    ";
	$result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    $total = $row['total'];

    $query = "
        select a.*
          from (select case when date_format(now(), '%Y-%m-%d') < receive_start_date then 'RECEIVE_WAIT'
                            when receive_start_date <= date_format(now(), '%Y-%m-%d') and date_format(now(), '%Y-%m-%d') <= receive_end_date then 'RECEIVING'
                            when receive_end_date < date_format(now(), '%Y-%m-%d') and date_format(now(), '%Y-%m-%d') <= education_date then 'RECEIVE_END'
                            when education_date < date_format(now(), '%Y-%m-%d') then 'EDUCATION_END'
                       end education_status
                     , a.education_seq
                     , education_type
                     , education_date
                     , receive_start_date
                     , receive_end_date
                     , education_area
                     , education_name
                     , use_flag
                     , reg_id
                     , reg_date
                     , modify_id
                     , modify_date
                     , if (b.receive_count is null, 0, b.receive_count) receive_count 
                     , if (b.no_charge_count is null, 0, b.no_charge_count) no_charge_count 
                     , if (b.charge_count is null, 0, b.charge_count) charge_count 
                     , if (b.no_pass_count is null, 0, b.no_pass_count) no_pass_count 
                     , if (b.pass_count is null, 0, b.pass_count) pass_count
                  from cqa_education_v a left outer join cqa_education_receive_sum_v b on a.education_seq = b.education_seq
                 where a.use_flag = 'Y') a
         where 1 = 1 $filter
         order by education_seq desc
    ";    
    // var_dump($query);
    $result = mysqli_query($connect, $query);

    if ($result === false) {            
        var_dump($query);
        echo mysqli_error($connect);
    }
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
                    <h2>교육목록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>교육/접수관리</a>
                        </li>
                        <li class="active">
                            <strong>교육관리</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight ecommerce">                                    
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>교육목록조회</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <div class="row">
                            
                            <form role="form" id="education_list" action="education_list.php" method="get">
                                <div class="col-sm-3" style="padding-left: 15px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-sm" id="education_name" name="education_name" value="<?echo $_GET[education_name]?>" placeholder="교육명">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" class="form-control input-sm"  id="education_start_date" name="education_start_date" value="<?echo $_GET[education_start_date]?>" placeholder="시작일">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>       
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" class="form-control input-sm"  id="education_end_date" name="education_end_date" value="<?echo $_GET[education_end_date]?>" placeholder="종료일">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 15px">
                                    <div class="form-group">
                                        <div class="input-group">                                        
                                            <select class="form-control input-sm m-b" id="education_status" name="education_status" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value=''>상태선택</option>    
                                                <?array_combo($_education_status, $_GET[education_status])?>                                        
                                            </select>
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </from>

                        </div>
                        
                        <table class="footable table table-stripped" data-page-size="20" style="margin-bottom: 0px">
                            <thead>
                            <tr>
                                <th width="48" class="text-center">No</th>
                                <th data-hide="phone" class="text-center">교육명</th>
                                <th data-hide="phone" class="text-center">교육일</th>
                                <th data-hide="phone" class="text-center">교육접수일</th>
                                <th data-hide="phone" class="text-center">상태</th>
                                <th data-hide="phone" class="text-center">접수</th>
                                <th data-hide="phone" class="text-center">미입금</th>
                                <th data-hide="phone" class="text-center">입금</th>
                                <th data-hide="phone" class="text-center">미수료</th>
                                <th data-hide="phone" class="text-center">수료</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
<?
    while ($rows = mysqli_fetch_array($result)) {
?>
                            <tr class="text-center">
                                <td><?echo $total?></td>
                                <td><a href="education_edit.php?education_seq=<?echo $rows[education_seq]?>"><?echo $rows[education_name]?></a></td>
                                <td><?echo $rows[education_date]?></td>
                                <td><?echo $rows[receive_start_date]?> &nbsp; ~ &nbsp; <?echo $rows[receive_end_date]?></td>
                                <td>
                                    <?if ($rows[education_status] == 'RECEIVING') {?>
                                    <a href="education_receive_add.php?education_seq=<?echo $rows[education_seq]?>"><?echo $_education_status[$rows[education_status]]?></a>
                                    <?} else {?>
                                    <?echo $_education_status[$rows[education_status]]?>
                                    <?}?>
                                </td>
                                <td><?echo $rows[receive_count]?></td>
                                <td><?echo $rows[no_charge_count]?></td>
                                <td><?echo $rows[charge_count]?></td>
                                <td><?echo $rows[no_pass_count]?></td>
                                <td><?echo $rows[pass_count]?></td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <?if ($rows[education_status] == 'RECEIVING') {?>
                                        <a type="button" class="btn btn-xs btn-danger" href="education_receive_add.php?education_seq=<?echo $rows[education_seq]?>">Receive</a>
                                        <?}?>
                                        <a type="button" class="btn btn-xs btn-white" href="education_edit.php?education_seq=<?echo $rows[education_seq]?>">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="javascript:education_delete(<?echo $rows[education_seq]?>)">Delete</a>
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
                                    <a type="button" class="btn btn-sm btn-success" href="education_add.php">Add</a>
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

            $('#education_start_date, #education_end_date').datepicker({
                format: "yyyy-mm-dd",
                language: "kr",
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: false,
                autoclose: true
            });

            $("#education_list").validate({
                rules: {
                    education_name: {
                        minlength: 2,
                        maxlength: 20
                    }
                }, submitHandler: function (form) {
                    form.submit();
                }
            });

        });

        function education_delete(education_seq) {
            if (confirm("삭제하시겠습니까?")) {
                location.href="education_crud.php?db_access_flag=education_delete&education_seq=" + education_seq;
            }
        }
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
