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
                    <h2>회원목록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <strong>회원관리</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight ecommerce">                                    
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>회원목록조회</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <div class="row">
                            <div class="col-sm-3" style="padding-left: 15px; padding-right: 5px">
                                <div class="form-group">
                                    <div class="input-group">                                        
                                        <input type="text" class="form-control input-sm" placeholder="아이디/성명/회원번호">
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
                                            <option value=''>자격선택</option>
                                            <option>준회원 (cqa웹사이트 열람만 가능)</option>
                                            <option>정회원 1년 (30,000원)</option>
                                            <option>정회원 2년 (50,000원)</option>
                                            <option>정회원 3년 (70,000원)</option>
                                            <option>정회원 평생 (300,000원)</option>
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
                                            <option value=''>레벨선택</option>
                                            <option value="9" >레벨9 (준회원)</option>
                                            <option value="8" >레벨8 (상실회원)</option>
                                            <option value="7" >레벨7 (정회원)</option>
                                            <option value="6" >레벨6 (지부장)</option>
                                            <option value="5" >레벨5 (지회장)</option>
                                            <option value="4" >레벨4 </option>
                                            <option value="3" >레벨3 (관리자)</option>
                                            <option value="2" >레벨2 </option>
                                            <option value="1" >레벨1 (최고관리자)</option>
                                        </select>

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
                                            <option value=''>추천인선택</option>
                                            <option value='10'>[LYDIA 30] 장흥숙 (10-00)</option>
                                            <option value='07' >[S퀼트] 송재란 (07-00)</option>
                                            <option value='09' >[그린퀼트] 김경주 (09-00)</option>
                                            <option value='04-01' >[생활의향기] 이현정 (04-01)</option>
                                            <option value='07-07' >[소소공방] 현미경 (07-07)</option>
                                            <option value='08' >[아원퀼트] 최은영 (08-00)</option>
                                            <option value='03-05' >[요술나라 요술 손] 유미숙 (03-05)</option>
                                            <option value='01-04' >[퀼트 수작] 변성혜 (01-04)</option>
                                            <option value='08-03' >[퀼트 조] 조현화 (08-03)</option>
                                            <option value='11-03' >[퀼트&돌] 오승미 (11-03)</option>
                                            <option value='07-04' >[퀼트&미] 김미정 (07-04)</option>
                                            <option value='09-05' >[퀼트나들이] 박정애 (09-05)</option>
                                            <option value='07-06' >[퀼트바람] 이수연 (07-06)</option>
                                            <option value='01' >[퀼트지음] 엄재영/오선희 (01-00)</option>
                                            <option value='03' >[한혜경퀼트] 한혜경 (03-00)</option>
                                            <option value='03-04' >[허니비퀼트] 김정미 (03-04)</option>
                                            <option value="00-00" >추천인 없음 (00-00)</option>
                                        </select>

                                        <span class="input-group-btn">
                                            <a type="button" class="btn btn-sm btn-white"><i class="fa fa-search"></i></a> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <table class="footable table table-stripped" style="margin-bottom: 0px">
                            <thead>
                            <tr>
                                <th width="48" class="text-center">No</th>
                                <th data-hide="phone" class="text-center">아이디</th>
                                <th data-hide="phone" class="text-center">성명</th>
                                <th data-hide="phone" class="text-center">휴대폰</th>
                                <th data-hide="phone" class="text-center">회원번호</th>
                                <th data-hide="phone" class="text-center">추천인</th>
                                <th data-hide="phone" class="text-center">자격상태</th>
                                <th data-hide="phone" class="text-center">최종자격기간</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                <td class="text-center">3</td>
                                <td><a href="member_manager_edit.php">ohriely</a></td>
                                <td>오영란</td>
                                <td>010-7422-3461</td>
                                <td>18--1620</td>
                                <td>변성혜(01-04)</td>
                                <td>유효</td>
                                <td>2018-03-20 ~ 2019-03-19</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="member_manager_edit.php">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>2</td>
                                <td><a href="member_manager_edit.php">moonhwi</a></td>
                                <td>김문휘</td>
                                <td>010-9213-1170</td>
                                <td>18--1623</td>
                                <td>오승미(11-03)</td>
                                <td>유효</td>
                                <td>2018-03-21 ~ 2021-03-20</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="member_manager_edit.php">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td><a href="member_manager_edit.php">smilemomo</a></td>
                                <td>홍진경</td>
                                <td>010-4124-7014</td>
                                <td>17--1602</td>
                                <td>변성혜(01-04)</td>
                                <td>유효</td>
                                <td>2017-11-21 ~ 2018-11-20</td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="member_manager_edit.php">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="#">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="9" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">
                                    
                                    <a type="button" class="btn btn-sm btn-success" href="member_manager_add.php">Add</a>
                                    <a type="button" class="btn btn-sm btn-success">Excel Down</a>

                                    <!-- <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-double-left"></i></button>
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-left"></i></button>
                                        <button class="btn btn-sm btn-white">1</button>
                                        <button class="btn btn-sm btn-white active">2</button>
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
