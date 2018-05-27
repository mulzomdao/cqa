<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    if ($_GET[exam_name] != "") {
        $filter .= "and exam_name like '%$_GET[exam_name]%'";
    }
    if ($_GET[exam_start_date] != "" && $_GET[exam_end_date] != "") {
        $filter .= "and exam_date >= '$_GET[exam_start_date]' and exam_date <= '$_GET[exam_end_date]'";
    } elseif ($_GET[exam_start_date] != "") {
        $filter .= "and exam_date >= '$_GET[exam_start_date]'";
    } elseif ($_GET[exam_end_date] != "") {
        $filter .= "and exam_date <= '$_GET[exam_end_date]'";
    }
    if ($_GET[exam_status] != "") {
        $filter .= "and exam_status = '$_GET[exam_status]'";
    }

    $query = "
        select count(*) total 
          from cqa_exam
         where use_flag = 'Y' $filter
    ";
	$result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    $total = $row['total'];

    $query = "
        select a.* 
          from (SELECT case when date_format(now(), '%Y-%m-%d') < receive_start_date then 'RECEIVE_WAIT'
                            when receive_start_date <= date_format(now(), '%Y-%m-%d') and date_format(now(), '%Y-%m-%d') <= receive_end_date then 'RECEIVING'
                            when receive_end_date < date_format(now(), '%Y-%m-%d') and date_format(now(), '%Y-%m-%d') <= exam_date then 'RECEIVE_END'
                            when exam_date < date_format(now(), '%Y-%m-%d') then 'EXAM_END'
                        end exam_status
                     , case when machine_exam_date is not null && hand_exam_date is not null then concat('[핸드] ', hand_exam_date, ' &nbsp;/&nbsp; [머신] ', machine_exam_date) 
                            when hand_exam_date is not null then concat('[핸드] ', hand_exam_date)
                            when machine_exam_date is not null then concat('[머신] ', machine_exam_date)
                        end exam_date_info
                     , a.exam_seq
                     , a.exam_name
                     , a.exam_date
                     , a.receive_start_date
                     , a.receive_end_date
                     , a.machine_exam_date
                     , a.machine_receive_start_date
                     , a.machine_receive_end_date
                     , a.hand_exam_date
                     , a.hand_receive_start_date
                     , a.hand_receive_end_date
                     , a.pass_announce_date
                     , a.exam_area
                     , a.exam_subject
                     , a.exam_content
                     , a.use_flag
                     , a.reg_id
                     , a.reg_date
                     , a.modify_id
                     , a.modify_date
                     , if (b.receive_count is null, 0, b.receive_count) receive_count 
                     , if (b.no_charge_count is null, 0, b.no_charge_count) no_charge_count 
                     , if (b.charge_count is null, 0, b.charge_count) charge_count 
                     , if (b.no_pass_count is null, 0, b.no_pass_count) no_pass_count 
                     , if (b.pass_count is null, 0, b.pass_count) pass_count
                  FROM cqa_exam_v a left outer join cqa_exam_receive_sum_v b on a.exam_seq = b.exam_seq) a 
         where a.use_flag = 'Y' $filter
         order by exam_seq desc
    ";    
    // var_dump($query);
    $result = mysqli_query($connect, $query);
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
                    <h2>시험목록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>자격시험/접수관리</a>
                        </li>
                        <li class="active">
                            <strong>시험관리</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight ecommerce">                                    
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>시험목록조회</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <div class="row">
                            
                            <form role="form" id="exam_list" action="exam_list.php" method="get">
                                <div class="col-sm-3" style="padding-left: 15px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group"><input type="text" class="form-control input-sm" name="exam_name" id="exam_name" value="<?echo $_GET[exam_name]?>" placeholder="시험명">
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
                                            <input type="text" class="form-control input-sm" name="exam_start_date" id="exam_start_date" value="<?echo $_GET[exam_start_date]?>" placeholder="시작일">
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
                                            <input type="text" class="form-control input-sm" name="exam_end_date" id="exam_end_date" value="<?echo $_GET[exam_end_date]?>" placeholder="종료일">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 15px">
                                    <div class="form-group">
                                        <div class="input-group">                                        
                                            <select class="form-control input-sm m-b" name="exam_status" id="exam_status" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value=''>상태선택</option>
                                                <?array_combo($_exam_status, $_GET[exam_status])?>
                                            </select>
                                            <span class="input-group-btn" style="vertical-align: top">
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
                                <th data-hide="phone" class="text-center">시험명</th>
                                <th data-hide="phone" class="text-center">시험일</th>
                                <th data-hide="phone" class="text-center">상태</th>
                                <th data-hide="phone" class="text-center">응시</th>
                                <th data-hide="phone" class="text-center">미입금</th>
                                <th data-hide="phone" class="text-center">입금</th>
                                <th data-hide="phone" class="text-center">불합격</th>
                                <th data-hide="phone" class="text-center">합격</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
<?
    while ($rows = mysqli_fetch_array($result)) {
?>
                            <tr class="text-center">
                                <td><?echo $total?></td>
                                <td><a href="exam_edit.php?exam_seq=<?echo $rows[exam_seq]?>"><?echo $rows[exam_name]?></a></td>
                                <td><?echo $rows[exam_date_info]?></td>
                                <td>
                                    <?if ($rows[exam_status] == 'RECEIVING') {?>
                                    <a href="exam_receive_add.php?exam_seq=<?echo $rows[exam_seq]?>"><?echo $_exam_status[$rows[exam_status]]?></a>
                                    <?} else {?>
                                    <?echo $_exam_status[$rows[exam_status]]?>
                                    <?}?>
                                </td>
                                <td><?echo $rows[receive_count]?></td>
                                <td><?echo $rows[no_charge_count]?></td>
                                <td><?echo $rows[charge_count]?></td>
                                <td><?echo $rows[no_pass_count]?></td>
                                <td><?echo $rows[pass_count]?></td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <?if ($rows[exam_status] == 'RECEIVING') {?>
                                        <a type="button" class="btn btn-xs btn-danger" href="exam_receive_add.php?exam_seq=<?echo $rows[exam_seq]?>">Receive</a>
                                        <?}?>
                                        <a type="button" class="btn btn-xs btn-white" href="exam_edit.php?exam_seq=<?echo $rows[exam_seq]?>">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="javascript:exam_delete('<?echo $rows[exam_seq]?>')">Delete</a>
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
                                <td colspan="3" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">
                                    <a type="button" class="btn btn-sm btn-success" href="exam_add.php">Add</a>
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

            $('#exam_start_date, #exam_end_date').datepicker({
                format: "yyyy-mm-dd",
                language: "kr",
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: false,
                autoclose: true
            });

            $("#exam_list").validate({
                rules: {
                    exam_name: {
                        minlength: 2,
                        maxlength: 20
                    }
                }, submitHandler: function (form) {
                    form.submit();
                }
            });

        });

        function exam_delete(exam_seq) {
            if (confirm("삭제하시겠습니까?")) {
                location.href="exam_crud.php?db_access_flag=exam_delete&exam_seq="+exam_seq;
            }
        }
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
