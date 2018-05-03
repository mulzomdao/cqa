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
</head>    

<body>
    <div id="wrapper">

        <?include "include/admin_navigation.php"?>

        <div id="page-wrapper" class="gray-bg dashbard-1">

            <?include "include/admin_top.php"?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>게시판등록</h2>
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
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">게시판ID</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" placeholder=""></div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">관리자</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" placeholder=""></div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">게시판명</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" placeholder=""></div>
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">등록자</label>
                                        <div class="col-sm-5"><input type="text" class="form-control input-sm" placeholder=""></div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">게시판정보</label>
                                        <div class="col-sm-11"><textarea class="form-control" rows="10"></textarea></div>
                                    </div>

                                    <div class="form-group pull-right" style="margin-bottom: 5px; padding-right: 15px">
                                        <a type="button" class="btn btn-sm btn-success" href="board_manager_add.php">Add</a>
                                        <a type="button" class="btn btn-sm btn-success" href="board_manager_add.php">Cancel</a>
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

    <script>
        $(document).ready(function() {

            $('.summernote').summernote();

            $('.input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
        });
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
