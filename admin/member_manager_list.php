<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    if ($_GET[id_name_no] != "") {
        $filter .= "and (member_id like '%$_GET[id_name_no]%' or member_name like '%$_GET[id_name_no]%' or member_no like '%$_GET[id_name_no]%') ";
    }
    if ($_GET[member_right] != "") {
        $filter .= "and member_right = '$_GET[member_right]'";
    }
    if ($_GET[member_level] != "") {
        $filter .= "and member_level = '$_GET[member_level]'";
    }
    if ($_GET[recommend_id] != "") {
        $filter .= "and recommend_id = '$_GET[recommend_id]'";
    }

    $query = "
        select count(*) total 
          from cqa_member
         where use_flag = 'Y' $filter
    ";
	$result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    $total = $row['total'];

    $query = "
        SELECT member_id
             , member_no
             , recommend_id
             , member_name
             , member_eng_name
             , member_password
             , member_level
             , member_right
             , case when member_right != 0 THEN DATE_FORMAT(a.right_start_date, '%Y-%m-%d')
               end right_start_date
             , case when member_right != 0 THEN DATE_FORMAT(a.right_end_date, '%Y-%m-%d')
               end right_end_date
             , CASE when member_right = 0 THEN 'TEMP' 
                    WHEN right_start_date < NOW() and now() <= right_end_date then 'ACTIVE'
                    else 'END'
               end right_flag
             , DATE_FORMAT(a.birthday, '%Y-%m-%d') birthday
             , sex
             , mobile
             , email
             , phone
             , zip_code
             , zip_address
             , detail_address
             , member_memo
             , use_flag
             , reg_id
             , DATE_FORMAT(a.reg_date, '%Y-%m-%d') reg_date
             , modify_id
             , DATE_FORMAT(a.modify_date, '%Y-%m-%d') modify_date
          FROM cqa_member a
         where use_flag = 'Y' $filter
         order by reg_date desc
    ";    
    // var_dump($query);
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
                            
                            <form role="form" id="member_manager_list" action="member_manager_list.php" method="get">
                                <div class="col-sm-3" style="padding-left: 15px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">                                        
                                            <input type="text" class="form-control input-sm btn-submit" name="id_name_no" id="id_name_no" value="<?echo $_GET[id_name_no]?>" placeholder="아이디/성명/회원번호">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button> 
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                    <div class="form-group">                        
                                        <div class="input-group">
                                            <select class="form-control input-sm m-b btn-submit" name="member_right" id="member_right" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value=''>자격선택</option>
                                                <option value="0" <?if ($_GET[member_right] == "0") {echo "selected";}?>>준회원 (cqa웹사이트 열람만 가능)</option>
                                                <option value="1" <?if ($_GET[member_right] == "1") {echo "selected";}?>>정회원 1년 (30,000원)</option>
                                                <option value="2" <?if ($_GET[member_right] == "2") {echo "selected";}?>>정회원 2년 (50,000원)</option>
                                                <option value="3" <?if ($_GET[member_right] == "3") {echo "selected";}?>>정회원 3년 (70,000원)</option>
                                                <option value="100" <?if ($_GET[member_right] == "100") {echo "selected";}?>>정회원 평생 (300,000원)</option>
                                            </select>

                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button> 
                                            </span>
                                        </div>       
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            
                                            <select class="form-control input-sm m-b btn-submit" name="member_level" id="member_level" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value=''>레벨선택</option>                                                
                                                <option value="9" <?if ($_GET[member_level] == "9") {echo "selected";}?>>레벨9 (준회원)</option>
                                                <option value="8" <?if ($_GET[member_level] == "8") {echo "selected";}?>>레벨8 (상실회원)</option>
                                                <option value="7" <?if ($_GET[member_level] == "7") {echo "selected";}?>>레벨7 (정회원)</option>
                                                <option value="6" <?if ($_GET[member_level] == "6") {echo "selected";}?>>레벨6 (지부장)</option>
                                                <option value="5" <?if ($_GET[member_level] == "5") {echo "selected";}?>>레벨5 (지회장)</option>
                                                <option value="4" <?if ($_GET[member_level] == "4") {echo "selected";}?>>레벨4 </option>
                                                <option value="3" <?if ($_GET[member_level] == "3") {echo "selected";}?>>레벨3 (관리자)</option>
                                                <option value="2" <?if ($_GET[member_level] == "2") {echo "selected";}?>>레벨2 </option>
                                                <option value="1" <?if ($_GET[member_level] == "1") {echo "selected";}?>>레벨1 (최고관리자)</option>
                                            </select>

                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button> 
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 15px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-control input-sm m-b btn-submit" name="recommend_id" id="recommend_id" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value=''>추천인선택</option>
                                                <option value='10' <?if ($_GET[recommend_id] == "10") {echo "selected";}?>>[LYDIA 30] 장흥숙 (10-00)</option>
                                                <option value='07' <?if ($_GET[recommend_id] == "07") {echo "selected";}?>>[S퀼트] 송재란 (07-00)</option>
                                                <option value='09' <?if ($_GET[recommend_id] == "09") {echo "selected";}?>>[그린퀼트] 김경주 (09-00)</option>
                                                <option value='04-01' <?if ($_GET[recommend_id] == "04-10") {echo "selected";}?>>[생활의향기] 이현정 (04-01)</option>
                                                <option value='07-07' <?if ($_GET[recommend_id] == "07-07") {echo "selected";}?>>[소소공방] 현미경 (07-07)</option>
                                                <option value='08' <?if ($_GET[recommend_id] == "08") {echo "selected";}?>>[아원퀼트] 최은영 (08-00)</option>
                                                <option value='03-05' <?if ($_GET[recommend_id] == "03-05") {echo "selected";}?>>[요술나라 요술 손] 유미숙 (03-05)</option>
                                                <option value='01-04' <?if ($_GET[recommend_id] == "01-04") {echo "selected";}?>>[퀼트 수작] 변성혜 (01-04)</option>
                                                <option value='08-03' <?if ($_GET[recommend_id] == "08-03") {echo "selected";}?>>[퀼트 조] 조현화 (08-03)</option>
                                                <option value='11-03' <?if ($_GET[recommend_id] == "11-03") {echo "selected";}?>>[퀼트&돌] 오승미 (11-03)</option>
                                                <option value='07-04' <?if ($_GET[recommend_id] == "07-04") {echo "selected";}?>>[퀼트&미] 김미정 (07-04)</option>
                                                <option value='09-05' <?if ($_GET[recommend_id] == "09-05") {echo "selected";}?>>[퀼트나들이] 박정애 (09-05)</option>
                                                <option value='07-06' <?if ($_GET[recommend_id] == "07-06") {echo "selected";}?>>[퀼트바람] 이수연 (07-06)</option>
                                                <option value='01' <?if ($_GET[recommend_id] == "01") {echo "selected";}?>>[퀼트지음] 엄재영/오선희 (01-00)</option>
                                                <option value='03' <?if ($_GET[recommend_id] == "03") {echo "selected";}?>>[한혜경퀼트] 한혜경 (03-00)</option>
                                                <option value='03-04' <?if ($_GET[recommend_id] == "03-04") {echo "selected";}?>>[허니비퀼트] 김정미 (03-04)</option>
                                                <option value="00-00" <?if ($_GET[recommend_id] == "00-00") {echo "selected";}?>>추천인 없음 (00-00)</option>
                                            </select>

                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button> 
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>

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
                                <th data-hide="phone" class="text-center">등록일</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>

<?
    while ($rows = mysqli_fetch_array($result)) {
?>
                            <tr class="text-center">
                                <td class="text-center"><?echo $total?></td>
                                <td><a href="member_manager_edit.php?member_id=<?echo $rows[member_id]?>"><?echo $rows[member_id]?></a></td>
                                <td><?echo $rows[member_name]?></td>
                                <td><?echo $rows[mobile]?></td>
                                <td><?echo $rows[member_no]?></td>
                                <td><?echo $_recommend_id[$rows[recommend_id]]?></td>
                                <td><?echo $_right_flag[$rows[right_flag]]?></td>
                                <td><?echo $rows[right_start_date]?> ~ <?echo $rows[right_end_date]?></td>
                                <td><?echo $rows[reg_date]?></td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="member_manager_edit.php?member_id=<?echo $rows[member_id]?>">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="javascript:member_delete('<?echo $rows[member_id]?>')">Delete</a>
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
                                <td colspan="10" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">
                                    
                                    <a type="button" class="btn btn-sm btn-success" href="member_manager_add.php">Add</a>
                                    <a type="button" class="btn btn-sm btn-success" onclick="excel_down()">Excel Down</a>

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

            $("#member_manager_list").validate({
                rules: {
                    id_name_no: {
                        minlength: 2,
                        maxlength: 20
                    }
                }, submitHandler: function (form) {
                    form.submit();
                }
            });

            $('.btn-submit').click(function(){
                $("#member_manager_list").attr("action", "member_manager_list.php");
            });

        });

        function excel_down() {
            if (confirm('엑셀다운 받으시겠습니까?')) {
                $("#member_manager_list").attr("action", "member_manager_excel.php");
                $("#member_manager_list").submit();
            }
        }

        function member_delete(member_id) {
            if (confirm("삭제하시겠습니까?")) {
                location.href="member_manager.php?db_access_flag=member_manager_delete&member_id="+member_id;
            }
        }
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
