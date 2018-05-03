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
                    <h2>교재목록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <strong>교재관리</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight ecommerce">                                    
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>교재목록조회</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <div class="row">
                            <div class="col-sm-3" style="padding-left: 15px; padding-right: 5px">
                                <div class="form-group">
                                    <div class="input-group">
                                        <select class="form-control input-sm m-b" name="account" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                            <option value="">품목</option>
                                            <option value='36' >템플릿</option>
                                            <option value='34' >교재</option>
                                        </select>
                                        <span class="input-group-btn">
                                            <a type="button" class="btn btn-sm btn-white"><i class="fa fa-search"></i></a> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-sm" placeholder="품명">
                                        <span class="input-group-btn">
                                            <a type="button" class="btn btn-sm btn-white"><i class="fa fa-search"></i></a> 
                                        </span>
                                    </div>       
                                </div>
                            </div>
                            <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                <div class="form-group">
                                    <div class="input-group">
                                        <select class="form-control input-sm m-b" name="account" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                            <option value="">상태</option>
                                            <option value="0">판매중</option>
                                            <option value="5">일시판매중지</option>
                                            <option value="10">판매중지</option>
                                            <option value="20">판매예정</option>
                                        </select>
                                        <span class="input-group-btn">
                                            <a type="button" class="btn btn-sm btn-white"><i class="fa fa-search"></i></a> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-sm" placeholder="요약설명">
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
                                <th width="48" class="text-center">No</th>
                                <th data-hide="phone" class="text-center">품목</th>
                                <th data-hide="phone" class="text-center">품명</th>
                                <th data-hide="phone" class="text-center">가격</th>
                                <th data-hide="phone" class="text-center">상태</th>
                                <th data-hide="phone" class="text-center">재고</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                <td>3</td>
                                <td>템플릿</td>
                                <td><a href="book_manager_edit.php">11 피클디쉬(소)</a></td>
                                <td>[소비자가] 25,000 &nbsp; / &nbsp; [회원가] 17,500</td>
                                <td>판매중</td>
                                <td>0</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="book_manager_edit.php">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>2</td>
                                <td>템플릿</td>
                                <td><a href="book_manager_edit.php">11 피클디쉬(대)</a></td>
                                <td>[소비자가] 30,000 &nbsp; / &nbsp; [회원가] 21,000</td>
                                <td>판매중</td>
                                <td>0</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="book_manager_edit.php">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td>템플릿</td>
                                <td><a href="book_manager_edit.php">10 템플릿이용 곡선피싱</a></td>
                                <td>[소비자가] 15,000 &nbsp; / &nbsp; [회원가] 15,400</td>
                                <td>판매중</td>
                                <td>0</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="book_manager_edit.php">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="7" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">
                                    
                                    <a type="button" class="btn btn-sm btn-success" href="book_manager_add.php">Add</a>
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
