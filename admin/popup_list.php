<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    if ($_GET[popup_title] != "") {
        $filter .= "and popup_title like '%$_GET[popup_title]%'";
    }
    if ($_GET[popup_start_date] != "") {
        $filter .= "and popup_start_date >= '$_GET[popup_start_date]'";
    }
    if ($_GET[popup_end_date] != "") {
        $filter .= "and popup_end_date <= '$_GET[popup_end_date]'"; 
    }
    if ($_GET[reg_id] != "") {
        $filter .= "and reg_id = '$_GET[reg_id]'";
    }

    $query = "
        select count(*) total 
          from cqa_popup
         where use_flag = 'Y' $filter
    ";
	$result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    $total = $row['total'];

    $query = "
        SELECT popup_seq 
             , date_format(popup_start_date, '%Y-%m-%d') popup_start_date 
             , date_format(popup_end_date, '%Y-%m-%d') popup_end_date 
             , popup_title 
             , popup_content 
             , use_flag 
             , reg_id 
             , reg_date 
             , modify_id 
             , modify_date 
          FROM cqa_popup
         where use_flag = 'Y' $filter
         order by popup_seq desc
    ";    
    // var_dump($query);
    $result = mysqli_query($connect, $query);
        
    if ($result === false) {            
        var_dump($query);
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
                    <h2>팝업목록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>사이트관리</a>
                        </li>
                        <li class="active">
                            <strong>팝업관리</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight ecommerce">                                    
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>팝업목록조회</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <div class="row">
                            
                            <form role="form" id="popup_list" action="popup_list.php" method="get">
                                <div class="col-sm-3" style="padding-left: 15px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group"><input type="text" class="form-control input-sm" name="popup_title" id="popup_title" value="<?echo $_GET[popup_title]?>" placeholder="제목">
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
                                            <input type="text" class="form-control input-sm" name="popup_start_date" id="popup_start_date" value="<?echo $_GET[popup_start_date]?>" placeholder="시작일">
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
                                            <input type="text" class="form-control input-sm" name="popup_end_date" id="popup_end_date" value="<?echo $_GET[popup_end_date]?>" placeholder="종료일">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 15px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group"><input type="text" class="form-control input-sm" name="reg_id" id="reg_id" value="<?echo $_GET[reg_id]?>" placeholder="등록자">
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
                                <th data-hide="phone" class="text-center">제목</th>
                                <th data-hide="phone" class="text-center">시작일</th>
                                <th data-hide="phone" class="text-center">종료일</th>
                                <th data-hide="phone" class="text-center">등록자</th>
                                <th data-hide="phone" class="text-center">등록일</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
<?
    while ($rows = mysqli_fetch_array($result)) {
?>

                            <tr class="text-center">
                                <td><?echo $total?></td>
                                <td class="text-left"><a href="popup_edit.php?popup_seq=<?echo $rows[popup_seq]?>"><?echo $rows[popup_title]?></a></td>
                                <td><?echo $rows[popup_start_date]?></td>
                                <td><?echo $rows[popup_end_date]?></td>
                                <td><?echo $rows[reg_id]?></td>
                                <td><?echo $rows[reg_date]?></td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="#">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="popup_edit.php?popup_seq=<?echo $rows[popup_seq]?>">Edit</a>
                                        <a type="button" class="btn btn-xs btn-white" href="javascript:popup_delete('<?echo $rows[popup_seq]?>')">Delete</a>
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
                                <td colspan="2" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">                                    
                                    <a type="button" class="btn btn-sm btn-success" href="popup_add.php">Add</a>
                                </td>                 
                                <td colspan="5" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">
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

            $('#popup_start_date, #popup_end_date').datepicker({
                format: "yyyy-mm-dd",
                language: "kr",
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: false,
                autoclose: true
            });

            $("#popup_list").validate({
                rules: {
                    popup_title: {
                        minlength: 2,
                        maxlength: 20
                    },
                    reg_id: {
                        minlength: 2,
                        maxlength: 20
                    }
                }, submitHandler: function (form) {
                    form.submit();
                }
            });

        });

        function popup_delete(popup_seq) {
            if (confirm("삭제하시겠습니까?")) {
                location.href="popup_crud.php?db_access_flag=popup_delete&popup_seq="+popup_seq;
            }
        }
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
