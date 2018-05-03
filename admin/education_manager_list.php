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
                            <div class="col-sm-3" style="padding-left: 15px; padding-right: 5px">
                                <div class="form-group">
                                    <div class="input-group"><input type="text" class="form-control input-sm" placeholder="교육명">
                                        <span class="input-group-btn">
                                            <a type="button" class="btn btn-sm btn-white"><i class="fa fa-search"></i></a> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input id="date_added" type="text" class="form-control input-sm" value="" placeholder="시작일">
                                        <span class="input-group-btn">
                                            <a type="button" class="btn btn-sm btn-white"><i class="fa fa-search"></i></a> 
                                        </span>
                                    </div>       
                                </div>
                            </div>
                            <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input id="date_modified" type="text" class="form-control input-sm" value="" placeholder="종료일">
                                        <span class="input-group-btn">
                                            <a type="button" class="btn btn-sm btn-white"><i class="fa fa-search"></i></a> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3" style="padding-left: 5px; padding-right: 15px">
                                <div class="form-group">
                                    <div class="input-group">                                        
                                        <select class="form-control input-sm m-b" name="account" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                            <option value=''>상태선택</option>
                                            <option value="9" >완료</option>
                                            <option value="8" >접수중</option>
                                            <option value="7" >취소</option>
                                        </select>
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
                                <th data-hide="phone" class="text-center">교육명</th>
                                <th data-hide="phone" class="text-center">교육일</th>
                                <th data-hide="phone" class="text-center">상태</th>
                                <th data-hide="phone" class="text-center">응시</th>
                                <th data-hide="phone" class="text-center">미입금</th>
                                <th data-hide="phone" class="text-center">입금</th>
                                <th data-hide="phone" class="text-center">미이수</th>
                                <th data-hide="phone" class="text-center">이수</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                <td>3</td>
                                <td><a href="education_manager_edit.php">2018년 2급 자격검정 면제 및 교육</a></td>
                                <td>2018-03-24 &nbsp; ~ &nbsp; 2018-03-24</td>
                                <td>완료</td>
                                <td>17</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>17</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="education_receive_manager_add.php">Receive</a>
                                        <a type="button" class="btn btn-xs btn-white" href="education_manager_edit.php">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>2</td>
                                <td><a href="education_manager_edit.php">2017 강사자격 및 이관심사 교육</a></td>
                                <td>2017-04-08 &nbsp; ~ &nbsp; 2017-04-09</td>
                                <td>완료</td>
                                <td>14</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>14</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="education_receive_manager_add.php">Receive</a>
                                        <a type="button" class="btn btn-xs btn-white" href="education_manager_edit.php">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td><a href="education_manager_edit.php">2017년 2급 핸드/머신 자격검정 교육</a></td>
                                <td>2016-11-03 &nbsp; ~ &nbsp; 2016-11-03</td>
                                <td>완료</td>
                                <td>15</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>15</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="education_receive_manager_add.php">Receive</a>
                                        <a type="button" class="btn btn-xs btn-white" href="education_manager_edit.php">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="10" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">
                                    
                                    <a type="button" class="btn btn-sm btn-success" href="education_manager_add.php">Add</a>
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
