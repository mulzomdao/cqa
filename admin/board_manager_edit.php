<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    $query = "
        select board_id
             , board_name
             , manager_id
             , board_explain
             , use_flag
             , reg_id
             , a.reg_date 
          from cqa_board_manager a
         where use_flag = 'Y' 
           and board_id = '$_GET[board_id]'
    ";    
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
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

            <?include "includeadmin_/top.php"?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>게시판상세</h2>
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
                <div class="row">
                    <div class="col-lg-12">

                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>게시판정보</small></h5>
                            </div>
                            <div class="ibox-content" style="padding-bottom: 10px">

                                <fieldset class="form-horizontal">
                                    <form role="form" id="board_manager_edit" action="board_manager_crud.php" method="post">
                                        <input type="hidden" id="db_access_flag" name="db_access_flag" value="board_manager_edit">
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 게시판ID</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" id="board_id" name="board_id" value="<?echo $row[board_id]?>" readonly></div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 관리자ID</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" id="manager_id" name="manager_id" value="<?echo $row[manager_id]?>"></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 게시판명</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" id="board_name" name="board_name" value="<?echo $row[board_name]?>"></div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 등록정보</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" id="reg_id" name="reg_id" value="<?echo $row[reg_id]?> / <?echo $row[reg_date]?> " readonly></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">게시판설명</label>
                                            <div class="col-sm-11"><textarea class="form-control" rows="10" id="board_explain" name="board_explain"><?echo $row[board_explain]?></textarea></div>
                                        </div>
                                        <div class="form-group pull-right" style="margin-bottom: 5px; padding-right: 15px">
                                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                                            <button type="button" class="btn btn-sm btn-success" id="board_manager_delete">Delete</button>
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

            $("#board_manager_edit").validate({
                rules: {
                    board_id: {
                        required: true,
                        minlength: 2,
                        maxlength: 20
                    },
                    manager_id: {
                        required: true,
                        minlength: 2,
                        maxlength: 20
                    },
                    board_name: {
                        required: true,
                        minlength: 2,
                        maxlength: 20
                    }
                }, submitHandler: function (form) {
                    if (confirm("수정 하시겠습니까?")) {
                        form.submit();
                    }   
                }
            });
            
            $("#board_manager_delete").click(function(){
                if (confirm('삭제 하시겠습니까?')) {
                    location.replace('board_manager_crud.php?db_access_flag=board_manager_delete&board_id=<?echo $row[board_id]?>');
                }
            });
        });
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
