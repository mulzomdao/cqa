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
                            <div class="col-sm-3" style="padding-left: 15px; padding-right: 5px">
                                <div class="form-group">
                                    <div class="input-group"><input type="text" class="form-control input-sm" placeholder="게시판ID">
                                        <span class="input-group-btn">
                                            <a type="button" class="btn btn-sm btn-white"><i class="fa fa-search"></i></a> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                <div class="form-group">                        
                                    <div class="input-group">
                                    <input type="text" class="form-control input-sm" placeholder="게시판명">
                                        <span class="input-group-btn">
                                            <a type="button" class="btn btn-sm btn-white"><i class="fa fa-search"></i></a> 
                                        </span>
                                    </div>       
                                </div>
                            </div>
                            <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-sm" placeholder="관리자">
                                        <span class="input-group-btn">
                                            <a type="button" class="btn btn-sm btn-white"><i class="fa fa-search"></i></a> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3" style="padding-left: 5px; padding-right: 12px">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-sm" placeholder="등록자">
                                        <span class="input-group-btn">
                                            <a type="button" class="btn btn-sm btn-white"><i class="fa fa-search"></i></a> 
                                        </span>
                                    </div>
                                </div>
                            </div>
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
                            <tr class="text-center">
                                <td>3</td>
                                <td><a href="board_manager_edit.php">free</a></td>
                                <td>자유게시판</td>
                                <td>admin</td>
                                <td>admin</td>
                                <td>2018-03-06</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="board_manager_edit.php">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>2</td>
                                <td><a href="board_manager_edit.php">notice</a></td>
                                <td>공지사항</td>
                                <td>admin</td>
                                <td>admin</td>
                                <td>2018-03-06</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="board_manager_edit.php">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td><a href="board_manager_edit.php">news</a></td>
                                <td>뉴스</td>
                                <td>admin</td>
                                <td>admin</td>
                                <td>2018-03-06</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="board_manager_edit.php">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
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

            $('.footable').footable();

            $('#date_added').datepicker({
                format: "yyyy-mm-dd",
                language: "kr",
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#date_modified').datepicker({
                format: "yyyy-mm-dd",
                language: "kr",
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
