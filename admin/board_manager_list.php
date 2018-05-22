<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    if ($_GET[board_id] != "") {
        $filter .= "and board_id like '%$_GET[board_id]%'";
    }
    if ($_GET[board_name] != "") {
        $filter .= "and board_name like '%$_GET[board_name]%'";
    }
    if ($_GET[manager_id] != "") {
        $filter .= "and manager_id like '%$_GET[manager_id]%'";
    }
    if ($_GET[reg_id] != "") {
        $filter .= "and reg_id like '%$_GET[reg_id]%'";
    }

    $query = "
        select count(*) total 
          from cqa_board_manager
         where use_flag = 'Y' $filter
    ";
	$result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    $total = $row['total'];

    $query = "
        select board_id
             , board_name
             , manager_id
             , board_explain
             , use_flag
             , reg_id
             , date_format(a.reg_date, '%Y-%m-%d') reg_date 
          from cqa_board_manager a
         where use_flag = 'Y' $filter
         order by reg_date desc
    ";    
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
                    <h2>게시판목록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>사이트관리</a>
                        </li>
                        <li>
                            <strong>게시판관리</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight ecommerce">                                    
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>게시판목록조회</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <div class="row">
                            
			                <form role="form" id="board_manager_list" action="board_manager_list.php" method="get">
                                <div class="col-sm-3" style="padding-left: 15px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-sm" placeholder="게시판ID" id="board_id" name="board_id" value="<?echo $_GET[board_id]?>">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white"><i class="fa fa-search"></i></button> 
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                    <div class="form-group">                        
                                        <div class="input-group">
                                        <input type="text" class="form-control input-sm" placeholder="게시판명" id="board_name" name="board_name" value="<?echo $_GET[board_name]?>">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white"><i class="fa fa-search"></i></button> 
                                            </span>
                                        </div>       
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-sm" placeholder="관리자" id="manager_id" name="manager_id" value="<?echo $_GET[manager_id]?>">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white"><i class="fa fa-search"></i></button> 
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 12px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-sm" placeholder="등록자" id="reg_id" name="reg_id" value="<?echo $_GET[reg_id]?>">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white"><i class="fa fa-search"></i></button> 
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        
                        <table class="footable table table-stripped toggle-arrow-tiny" style="margin-bottom: 0px">
                            <thead>
                            <tr>
                                <th width="55" class="text-center">번호</th>
                                <th data-hide="phone" class="text-center">게시판ID</th>
                                <th class="text-center">게시판명</th>
                                <th data-hide="phone" class="text-center">관리자</th>
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
                                <td><a href="board_manager_edit.php?board_id=<?echo $rows[board_id]?>"><?echo $rows[board_id]?></a></td>
                                <td><?echo $rows[board_name]?></td>
                                <td><?echo $rows[manager_id]?></td>
                                <td><?echo $rows[reg_id]?></td>
                                <td><?echo $rows[reg_date]?></td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="#">BoardView</a>
                                        <a type="button" class="btn btn-xs btn-white" href="board_manager_edit.php?board_id=<?echo $rows[board_id]?>">Edit</a>
                                        <a type="button" class="btn btn-xs btn-white" href="javascript:board_delete('<?echo $rows[board_id]?>')">Delete</a>
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
                                <td colspan="7" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">
                                    
                                    <a type="button" class="btn btn-sm btn-success" href="board_manager_add.php">Add</a>
                                    <a type="button" class="btn btn-sm btn-success">Excel Down</a>

                                    <!-- <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-double-left"></i></button>
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-left"></i></button>
                                        <button class="btn btn-sm btn-white">1</button>
                                        <button class="btn btn-sm btn-white  active">2</button>
                                        <button class="btn btn-sm btn-white">3</button>
                                        <button class="btn btn-sm btn-wh btn-smite">4</button>
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-right"></i> </button>
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-double-right"></i> </button>
                                    </div> -->

                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-double-left"></i></button>
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-left"></i></button>
                                        <button class="btn btn-sm btn-smite">1</button>
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-right"></i> </button>
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-double-right"></i> </button>
                                    </div>
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

            $("#board_manager_list").validate({
                rules: {
                    board_id: {
                        minlength: 2,
                        maxlength: 20
                    }, board_name: {
                        minlength: 2,
                        maxlength: 20
                    }, manager_id: {
                        minlength: 2,
                        maxlength: 20
                    }, reg_id: {
                        minlength: 2,
                        maxlength: 20
                    }
                }, submitHandler: function (form) {
                    form.submit();
                }
            });

            $('.footable').footable();
        });

        function board_delete(board_id) {
            if (confirm("삭제하시겠습니까?")) {
                location.href="board_manager.php?db_access_flag=board_manager_delete&board_id="+board_id;
            }
        }
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
