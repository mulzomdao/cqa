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
                    <h2>시험접수목록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>자격시험/접수관리</a>
                        </li>
                        <li class="active">
                            <strong>시험접수관리</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight ecommerce">                                    
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>시험접수목록조회</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <div class="row">
                            <div class="col-sm-3" style="padding-left: 15px; padding-right: 5px">
                                <div class="form-group">
                                    <div class="input-group">
                                        <select class="form-control input-sm m-b" name="account" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                            <option value="">응시시험</option>
                                            <option value='36' >2018년 2급 자격검정 면제및 시험</option>
                                            <option value='34' >2017 강사자격 및 이관심사</option>
                                            <option value='33' >2017년 2급 핸드, 머신 자격검정 시험</option>
                                            <option value='32' >2016 CQA강사자격 및 이관심사</option>
                                            <option value='31' >2016 2급 핸드, 머신 자격시험</option>
                                            <option value='30' >2015 강사자격및 이관심사</option>
                                            <option value='29' >2015 2급 핸드 머신 시험</option>
                                            <option value='28' >2014 강사자격  및 이관심사</option>
                                            <option value='27' >2014 핸드 머신 2급시험</option>
                                            <option value='26' >2013 청원군 2급자격시험</option>
                                            <option value='20' >2013 2급자격시험 태국</option>
                                            <option value='19' >2013 강사자격심사 및 이관심사</option>
                                            <option value='18' >2013 2급자격시험</option>
                                            <option value='17' >2012 강사자격증</option>
                                            <option value='16' >2012 2급 자격 시험</option>
                                            <option value='15' >2011 강사자격증</option>
                                            <option value='14' >2011 2급 자격시헙</option>
                                            <option value='13' >2010 강사자격증</option>
                                            <option value='12' >2010 2급시험</option>
                                            <option value='11' >2009,CQA 강사자격 및 이관심사 안내</option>
                                            <option value='7' >2009, 2급 자격시험</option>
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
                                        <select class="form-control input-sm m-b" name="account" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                            <option value="">응시유형</option>
                                            <option value="일반">일반응시</option>
                                            <option value="심사">면제심사</option>
                                            <option value="이관">이관심사</option>
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
                                        <select class="form-control input-sm m-b" name="account" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                            <option value="">상태</option>
                                            <option value="0">미입금</option>
                                            <option value="5">입금완료</option>
                                            <option value="10">불합격</option>
                                            <option value="20">합격</option>
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
                                        <input type="text" class="form-control input-sm" placeholder="수험번호 / 수험장소 / 수험과목">
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
                                <th data-hide="phone" class="text-center">수험번호</th>
                                <th data-hide="phone" class="text-center">응시시험</th>
                                <th data-hide="phone" class="text-center">응시유형</th>
                                <th data-hide="phone" class="text-center">시험일시</th>
                                <th data-hide="phone" class="text-center">성명</th>
                                <th data-hide="phone" class="text-center">연락처</th>
                                <th data-hide="phone" class="text-center">수험장소</th>
                                <th data-hide="phone" class="text-center">수험과목</th>
                                <th data-hide="phone" class="text-center">상태</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                <td>3</td>
                                <td><a href="exam_receive_manager_edit.php">181326</a></td>
                                <td class="text-left">2018년 2급 자격검정 면제및 시험</td>
                                <td>일반</td>
                                <td>2018-03-24</td>
                                <td>김미애</td>
                                <td>010-4752-0491</td>
                                <td>서울</td>
                                <td>핸드퀼트</td>
                                <td>합격</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="exam_receive_manager_edit.php">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>2</td>
                                <td><a href="exam_receive_manager_edit.php">181324</a></td>
                                <td class="text-left">2018년 2급 자격검정 면제및 시험</td>
                                <td>일반</td>
                                <td>2018-03-24</td>
                                <td>유수연</td>
                                <td>010-3639-4859</td>
                                <td>서울</td>
                                <td>핸드퀼트</td>
                                <td>합격</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="exam_receive_manager_edit.php">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td><a href="exam_receive_manager_edit.php">181326</a></td>
                                <td class="text-left">2018년 2급 자격검정 면제및 시험</td>
                                <td>일반</td>
                                <td>2018-03-24</td>
                                <td>박미림</td>
                                <td>010-6375-0210</td>
                                <td>서울</td>
                                <td>핸드퀼트</td>
                                <td>합격</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="exam_receive_manager_edit.php">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="11" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">
                                    
                                    <a type="button" class="btn btn-sm btn-success" href="exam_receive_manager_add.php">Add</a>
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
