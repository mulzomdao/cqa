<!--
*
*  INSPINIA - Responsive Admin Theme
*  version 2.7.1
*
-->

<!DOCTYPE html>
<html>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:30:33 GMT -->
<head>    
    <?include "include/admin_head.php";?>    
</head>    

<body>
    <div id="wrapper">

        <?include "include/admin_navigation.php"?>

        <div id="page-wrapper" class="gray-bg">
            <?include "include/admin_top.php"?>
            
            <div class="row wrapper border-bottom white-bg page-heading" style="padding-bottom: 10px">
                <div class="col-lg-12">
                    <h2>Home</h2>
                </div>
            </div>

            <div class="row" style="margin-top: 10px; margin-bottom: 10px">
                <div class="col-lg-3">
                    <div class="widget style1">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> 최근한달 가입자 </span>
                                <h2 class="font-bold">4,232</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 navy-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-file-text-o fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> 최근한달 시험접수 </span>
                                <h2 class="font-bold">26</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 lazur-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-pencil-square-o fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> 최근한달 교육접수 </span>
                                <h2 class="font-bold">260</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget style1 yellow-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-keyboard-o fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> 최근한달 게시글 </span>
                                <h2 class="font-bold">12</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox-content">
                        <h2>팝업</h2>
                        <small>This is example of task list</small>
                        <ul class="todo-list m-t">
                            <li>
                                <input type="checkbox" value="" name="" class="i-checks"/>
                                <span class="m-l-xs">Buy a milk</span>
                                <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 mins</small>
                            </li>
                            <li>
                                <input type="checkbox" value="" name="" class="i-checks" checked/>
                                <span class="m-l-xs">Go to shop and find some products.</span>
                                <small class="label label-info"><i class="fa fa-clock-o"></i> 3 mins</small>
                            </li>
                            <li>
                                <input type="checkbox" value="" name="" class="i-checks" />
                                <span class="m-l-xs">Send documents to Mike</span>
                                <small class="label label-warning"><i class="fa fa-clock-o"></i> 2 mins</small>
                            </li>
                            <li>
                                <input type="checkbox" value="" name="" class="i-checks"/>
                                <span class="m-l-xs">Go to the doctor dr Smith</span>
                                <small class="label label-danger"><i class="fa fa-clock-o"></i> 42 mins</small>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h2>공지사항</h2>
                            <small>This is example of small version of todo list</small>
                            <ul class="todo-list m-t small-list">
                                <li>
                                    <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>
                                    <span class="m-l-xs todo-completed">Buy a milk</span>

                                </li>
                                <li>
                                    <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>
                                    <span class="m-l-xs  todo-completed">Go to shop and find some products.</span>

                                </li>
                                <li>
                                    <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                    <span class="m-l-xs">Send documents to Mike</span>
                                    <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 mins</small>
                                </li>
                                <li>
                                    <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                    <span class="m-l-xs">Go to the doctor dr Smith</span>
                                </li>
                                <li>
                                    <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>
                                    <span class="m-l-xs">Plan vacation</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h2>뉴스</h2>
                            <div class="ibox-tools">
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="panel-body" style="padding: 0px">
                                <div class="panel-group" id="accordion" style="margin-bottom: 0px">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Collapsible Group Item #1</a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Collapsible Group Item #2</a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Collapsible Group Item #3</a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h2>자유게시판</h2>
                            <div class="ibox-tools">
                            </div>
                        </div>                        
                        <div class="ibox-content">
                            <div class="panel-body" style="padding: 0px">
                                <div class="panel-group" id="accordion1" style="margin-bottom: 0px">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">Collapsible Group Item #1</a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne1" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo2">Collapsible Group Item #2</a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree3">Collapsible Group Item #3</a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree3" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?include "include/admin_bottom.php"?>
        </div>        
    </div>

    <?include "include/admin_js.php";?>

    <script>
        $(document).ready(function() {
            // $('#side-menu').find('li').addClass('active');
        });
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
